<?php

namespace App\Http\Controllers;

use App\Client;
use App\Queues;
use App\Reservations;
use App\Services;
use App\Settings;
use App\Socials;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPostController extends AdminController
{
    //admins
    public function post_delete_admin(Request $request) {
        try {
            User::where('id', $request->id)->update(['deleted' => 1]);
            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Admin silindi!', 'row_id' => $request->row_id]);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    public function post_add_admin(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'surname' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|max:191|min:6'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun! Və ya email mövcuddur...']);
        }
        try {
            $pass = bcrypt($request->password);
            unset($request['password']);
            $request->merge(['deleted'=>0, 'password'=>$pass]);

            User::create($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Admin əlavə edildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    public function post_update_admin(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'surname' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,id,'.$id
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun! Və ya email mövcuddur...']);
        }
        try {
            unset($request['_token']);

            if (!empty($request->password)) {
                $pass = bcrypt($request->password);
                unset($request['password']);
                $request->merge(['password'=>$pass]);
            }
            else {
                unset($request['password']);
            }

            User::where('id', $id)->update($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Admin dəyişdirildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    //settings
    public function post_settings(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'address' => 'required|max:100',
            'phone' => 'required|max:13',
            'email' => 'required|email|max:50'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);
        }
        try {
            unset($request['_token']);

            Settings::where('id', 1)->update($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Ayarlar dəyişdirildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    //socials
    public function post_delete_social(Request $request) {
        try {
            Socials::where('id', $request->id)->update(['deleted' => 1]);
            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Sosial şəbəkə!', 'row_id' => $request->row_id]);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    public function post_add_social(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'icon' => 'required|max:100',
            'link' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);
        }
        try {
            $request->merge(['deleted'=>0]);

            Socials::create($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Sosial şəbəkə əlavə edildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    public function post_update_social(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'icon' => 'required|max:100',
            'link' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);
        }
        try {
            unset($request['_token']);

            Socials::where('id', $id)->update($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Sosial şəbəkə dəyişdirildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    //clients
    public function post_delete_client(Request $request) {
        try {
            Client::where('id', $request->id)->update(['deleted' => 1]);
            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'İstifadəçi silindi!', 'row_id' => $request->row_id]);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    //services
    public function post_delete_service(Request $request) {
        try {
            Services::where('id', $request->id)->update(['deleted' => 1]);
            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Xidmət mərkəzi silindi!', 'row_id' => $request->row_id]);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    public function post_add_service(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'count_limit' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);
        }
        try {
            $request->merge(['deleted'=>0, 'current_queue'=>0]);

            Services::create($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Xidmət mərkəzi əlavə edildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    public function post_update_service(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'count_limit' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);
        }
        try {
            unset($request['_token']);

            Services::where('id', $id)->update($request->all());

            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Xidmət mərkəzi dəyişdirildi!']);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    //queues
    public function post_delete_queue(Request $request) {
        try {
            Queues::where('id', $request->id)->update(['deleted' => 1]);
            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Növbə silindi!', 'row_id' => $request->row_id]);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }

    //reservations
    public function post_delete_reservation(Request $request) {
        try {
            Reservations::where('id', $request->id)->update(['deleted' => 1]);
            return response(['case' => 'success', 'title' => 'Success!', 'content' => 'Rezerv silindi!', 'row_id' => $request->row_id]);
        } catch (\Exception $e) {
            return response(['case' => 'error', 'title' => 'Error!', 'content' => 'Səhv baş verdi!']);
        }
    }
}
