warning: LF will be replaced by CRLF in app/Http/Controllers/AdminGetController.php.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in app/Http/Controllers/AdminPostController.php.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in app/Services.php.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in composer.json.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in composer.lock.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in config/app.php.
The file will have its original line endings in your working directory.
warning: LF will be replaced by CRLF in routes/web.php.
The file will have its original line endings in your working directory.
[1mdiff --git a/app/Http/Controllers/AdminGetController.php b/app/Http/Controllers/AdminGetController.php[m
[1mindex 73a47fb..fce8be3 100644[m
[1m--- a/app/Http/Controllers/AdminGetController.php[m
[1m+++ b/app/Http/Controllers/AdminGetController.php[m
[36m@@ -3,6 +3,8 @@[m
 namespace App\Http\Controllers;[m
 [m
 use App\Client;[m
[32m+[m[32muse App\Queues;[m
[32m+[m[32muse App\Reservations;[m
 use App\Services;[m
 use Illuminate\Http\Request;[m
 [m
[36m@@ -13,6 +15,24 @@[m [mclass AdminGetController extends AdminController[m
         return view('backend.index');[m
     }[m
 [m
[32m+[m[32m    //admins[m
[32m+[m[32m    public function get_admins() {[m
[32m+[m[32m        $services = Services::where(['deleted'=>0])->select()->get();[m
[32m+[m[32m        return view('backend.services')->with(['services'=>$services]);[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function get_add_admin() {[m
[32m+[m[32m        return view('backend.service_add');[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function get_update_admin($id) {[m
[32m+[m[32m        $service = Services::where(['id'=>$id, 'deleted'=>0])->select()->first();[m
[32m+[m[32m        if (count($service) == 0) {[m
[32m+[m[32m            return redirect('/admin');[m
[32m+[m[32m        }[m
[32m+[m[32m        return view('backend.service_update')->with('service', $service);[m
[32m+[m[32m    }[m
[32m+[m
     //clients[m
     public function get_clients() {[m
         $clients = Client::where(['deleted'=>0])->orderBy('id', 'DESC')->select()->get();[m
[36m@@ -28,4 +48,24 @@[m [mclass AdminGetController extends AdminController[m
     public function get_add_service() {[m
         return view('backend.service_add');[m
     }[m
[32m+[m
[32m+[m[32m    public function get_update_service($id) {[m
[32m+[m[32m        $service = Services::where(['id'=>$id, 'deleted'=>0])->select()->first();[m
[32m+[m[32m        if (count($service) == 0) {[m
[32m+[m[32m            return redirect('/admin');[m
[32m+[m[32m        }[m
[32m+[m[32m        return view('backend.service_update')->with('service', $service);[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    //queues[m
[32m+[m[32m    public function get_queues() {[m
[32m+[m[32m        $queues = Queues::leftJoin('clients as c', 'queues.client_id', '=', 'c.id')->leftJoin('services as s', 'queues.service_id', '=', 's.id')->where(['queues.deleted'=>0])->select('queues.id', 'queues.date', 'queues.code', 'queues.queue', 'c.name', 'c.surname', 's.name as service', 'queues.created_at')->get();[m
[32m+[m[32m        return view('backend.queues')->with(['queues'=>$queues]);[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    //reservations[m
[32m+[m[32m    public function get_reservations() {[m
[32m+[m[32m        $reservations = Reservations::leftJoin('clients as c', 'reservations.client_id', '=', 'c.id')->leftJoin('services as s', 'reservations.service_id', '=', 's.id')->where(['reservations.deleted'=>0])->select('reservations.id', 'reservations.date', 'reservations.code', 'reservations.time', 'c.name', 'c.surname', 's.name as service', 'reservations.created_at')->get();[m
[32m+[m[32m        return view('backend.reservations')->with(['reservations'=>$reservations]);[m
[32m+[m[32m    }[m
 }[m
[1mdiff --git a/app/Http/Controllers/AdminPostController.php b/app/Http/Controllers/AdminPostController.php[m
[1mindex 787ddfc..1dc0df3 100644[m
[1m--- a/app/Http/Controllers/AdminPostController.php[m
[1m+++ b/app/Http/Controllers/AdminPostController.php[m
[36m@@ -3,8 +3,11 @@[m
 namespace App\Http\Controllers;[m
 [m
 use App\Client;[m
[32m+[m[32muse App\Queues;[m
[32m+[m[32muse App\Reservations;[m
 use App\Services;[m
 use Illuminate\Http\Request;[m
[32m+[m[32muse Illuminate\Support\Facades\Validator;[m
 [m
 class AdminPostController extends AdminController[m
 {[m
[36m@@ -28,4 +31,64 @@[m [mclass AdminPostController extends AdminController[m
             return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);[m
         }[m
     }[m
[32m+[m
[32m+[m[32m    public function post_add_service(Request $request) {[m
[32m+[m[32m        $validator = Validator::make($request->all(), [[m
[32m+[m[32m            'name' => 'required|max:255',[m
[32m+[m[32m            'address' => 'required|max:255',[m
[32m+[m[32m            'count_limit' => 'required'[m
[32m+[m[32m        ]);[m
[32m+[m[32m        if ($validator->fails()) {[m
[32m+[m[32m            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);[m
[32m+[m[32m        }[m
[32m+[m[32m        try {[m
[32m+[m[32m            $request->merge(['deleted'=>0, 'current_queue'=>0]);[m
[32m+[m
[32m+[m[32m            Services::create($request->all());[m
[32m+[m
[32m+[m[32m            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Xidmət mərkəzi əlavə edildi!']);[m
[32m+[m[32m        } catch (\Exception $e) {[m
[32m+[m[32m            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function post_update_service(Request $request, $id) {[m
[32m+[m[32m        $validator = Validator::make($request->all(), [[m
[32m+[m[32m            'name' => 'required|max:255',[m
[32m+[m[32m            'address' => 'required|max:255',[m
[32m+[m[32m            'count_limit' => 'required'[m
[32m+[m[32m        ]);[m
[32m+[m[32m        if ($validator->fails()) {[m
[32m+[m[32m            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);[m
[32m+[m[32m        }[m
[32m+[m[32m        try {[m
[32m+[m[32m            unset($request['_token']);[m
[32m+[m
[32m+[m[32m            Services::where('id', $id)->update($request->all());[m
[32m+[m
[32m+[m[32m            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Xidmət mərkəzi dəyişdirildi!']);[m
[32m+[m[32m        } catch (\Exception $e) {[m
[32m+[m[32m            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    //queues[m
[32m+[m[32m    public function post_delete_queue(Request $request) {[m
[32m+[m[32m        try {[m
[32m+[m[32m            Queues::where('id', $request->id)->update(['deleted' => 1]);[m
[32m+[m[32m            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Növbə silindi!', 'row_id' => $request->row_id]);[m
[32m+[m[32m        } catch (\Exception $e) {[m
[32m+[m[32m            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);[m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    //reservations[m
[32m+[m[32m    public function post_delete_reservation(Request $reques