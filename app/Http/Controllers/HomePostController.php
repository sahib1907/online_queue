<?php

namespace App\Http\Controllers;

use App\Client;
use App\Queues;
use App\Reservations;
use App\Services;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HomePostController extends HomeController
{
    public function post_index(Request $request) {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'serial_number' => 'required|max:8|min:8'
        ]);
        if ($validator->fails()) {
            return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'Bütün xanaları doldurun!']);
        }
        return redirect('/online-queue/'.$request->service_id.'/'.$request->serial_number);
    }

    public function post_queue(Request $request, $service_id, $serial_number) {
        if (isset($request->queue)) {
            $clients = $request['client'];
            unset($request['client']);
            $validator_client = Validator::make($clients, [
                'name' => 'required|max:50',
                'surname' => 'required|max:50',
                'serial_number' => 'required|max:8|min:8',
                'mail' => 'required|max:100|email',
                'phone' => 'required|max:13'
            ]);
            if ($validator_client->fails()) {
                return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'İşarəli xanaları doldurun!']);
            }
            $client = Client::where(['deleted'=>0, 'serial_number'=>$clients['serial_number']])->select('id')->first();
            if (count($client) != 0) {
                $update_client = Client::where(['deleted'=>0, 'id'=>$client['id']])->update($clients);
                $request->merge(['client_id'=>$client['id']]);
            }
            else {
                $clients['deleted'] = 0;
                $add_client = Client::create($clients);
                if ($add_client) {
                    $client = Client::where(['deleted'=>0, 'serial_number'=>$clients['serial_number']])->select('id')->first();
                    $request->merge(['client_id'=>$client['id']]);
                }
                else {
                    return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'İstifadəçi əlavə edilərkən səhv baş verdi...']);
                }
            }
            unset($request['_token']);
            $current_date = date('Y-m-d');

            $current_queue_table = Services::where(['id'=>$service_id, 'deleted'=>0])->select('current_queue')->first();
            $current_queue = $current_queue_table['current_queue'];

            //istifadecinin cari gunde vaxti catmamis novbesi varmi
            $queues_client_control = Queues::where(['deleted'=>0, 'date'=>$current_date, 'service_id'=>$service_id, 'client_id'=>$request->client_id])->where('queue', '>=', $current_queue)->orderBy('id', 'DESC')->select('queue')->first();
            if (count($queues_client_control) > 0) {
                return response(['case' => 'error', 'title' => 'Bağışlayın!', 'content' => 'Sizin bu gün üçün vaxtı keçməmiş növbəniz var. <br> <strong>Növbəniz: '.$queues_client_control['queue'].'</strong>']);
            }

            //cari gunde novbe olub olmamaginin yoxlanilmasi
            $queues = Queues::where(['deleted'=>0, 'date'=>$current_date, 'service_id'=>$service_id])->orderBy('id', 'DESC')->select('queue')->first();
            if (count($queues) != 0) {
                $queue = $queues['queue'] + 1;
            }
            else {
                $queue = 1;
            }

            $code = mt_rand(100000, 999999);
            $barcode = '1_'.$queue.'_'.$code;

            $request->merge(['deleted'=>0, 'date'=>$current_date, 'queue'=>$queue, 'code'=>$code, 'service_id'=>$service_id]);

            $add_queue = Queues::create($request->all());
            if ($add_queue) {
                return response(['case' => 'success', 'title' => 'Uğurlu!', 'content' => 'Əməliyyat uğurla sona çatdı...', 'barcode'=>$barcode, 'current_queue'=>$current_queue, 'last_queue'=>$queue]);
            }
            else {
                return response(['case' => 'error', 'title' => 'Xəta!', 'content' => 'Səhv baş verdi...']);
            }
        }
        else if (isset($request->reservation)) {
            $clients = $request['client'];
            unset($request['client']);
            $validaot_reservation = Validator::make($request->all(), [
                'date' => 'required',
                'time' => 'required'
            ]);
            if ($validaot_reservation->fails()) {
                return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'İşarəli xanaları doldurun!']);
            }
            $validator_client = Validator::make($clients, [
                'name' => 'required|max:50',
                'surname' => 'required|max:50',
                'serial_number' => 'required|max:8|min:8',
                'mail' => 'required|max:100|email',
                'phone' => 'required|max:13'
            ]);
            if ($validator_client->fails()) {
                return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'İşarəli xanaları doldurun!']);
            }
            $client = Client::where(['deleted'=>0, 'serial_number'=>$clients['serial_number']])->select('id')->first();
            if (count($client) != 0) {
                $update_client = Client::where(['deleted'=>0, 'id'=>$client['id']])->update($clients);
                $request->merge(['client_id'=>$client['id']]);
            }
            else {
                $clients['deleted'] = 0;
                $add_client = Client::create($clients);
                if ($add_client) {
                    $client = Client::where(['deleted'=>0, 'serial_number'=>$clients['serial_number']])->select('id')->first();
                    $request->merge(['client_id'=>$client['id']]);
                }
                else {
                    return response(['case' => 'error', 'title' => 'Səhv baş verdi!', 'content' => 'İstifadəçi əlavə edilərkən səhv baş verdi...']);
                }
            }
            unset($request['_token']);
            $current_date = date('Y-m-d');

            $count_limit_services = Services::where(['id'=>$service_id, 'deleted'=>0])->select('count_limit')->first();
            $count_limit = $count_limit_services['count_limit'];

            //istifadecinin secdiyi gunde rezervi varmi
            $reservation_client_control = Reservations::where(['deleted'=>0, 'date'=>$request->date, 'service_id'=>$service_id, 'client_id'=>$request->client_id])->select('id')->get();
            if (count($reservation_client_control) > 0) {
                return response(['case' => 'error', 'title' => 'Bağışlayın!', 'content' => 'Sizin seçdiyiniz gün üçün rezerviniz var...']);
            }

            //secilen saatda bos yer varmi
            $reservation_for_count = Reservations::where(['deleted'=>0, 'service_id'=>$service_id, 'date'=>$request->date, 'time'=>$request->time])->select('id')->get();
            if (count($reservation_for_count) >= $count_limit) {
                return response(['case' => 'error', 'title' => 'Bağışlayın!', 'content' => 'Seçdiyiniz saat üçün bütün rezervlər tutulmuşdur...']);
            }

            $code = mt_rand(100000, 999999);
            $barcode = '2_'.$request->date.'_'.$request->time.'_'.$code;

            $request->merge(['deleted'=>0, 'code'=>$code, 'service_id'=>$service_id]);

            $add_reservation = Reservations::create($request->all());
            if ($add_reservation) {
                return response(['case' => 'success', 'title' => 'Uğurlu!', 'content' => 'Əməliyyat uğurla sona çatdı...', 'barcode'=>$barcode]);
            }
            else {
                return response(['case' => 'error', 'title' => 'Xəta!', 'content' => 'Səhv baş verdi...']);
            }
        }
        else {
            return redirect('/');
        }
    }
}
