<?php

namespace App\Http\Controllers;

use App\Client;
use App\Queues;
use App\Services;
use Illuminate\Http\Request;

class HomeGetController extends HomeController
{
    public function get_index(){
        $services = Services::where(['deleted'=>0])->select('id', 'name')->get();
        return view('frontend.index')->with('services', $services);
    }

    public function get_queue($service_id, $serial_number) {
        $current_date = date('Y-m-d');
        $client = Client::where(['serial_number'=>$serial_number, 'deleted'=>0])->select('clients.*')->first();
        $services = Services::where(['id'=>$service_id, 'deleted'=>0])->select('id', 'name')->first();
        $current_queue_list = Services::where(['id'=>$service_id, 'deleted'=>0])->select('current_queue')->first();
        $current_queue = $current_queue_list['current_queue'];
        $queues = Queues::where(['deleted'=>0, 'date'=>$current_date, 'service_id'=>$service_id])->orderBy('id', 'DESC')->select('queue')->first();
        if (count($queues) == 0) {
            $last_queue = 0;
        }
        else {
            $last_queue = $queues['queue'];
        }
        if (count($client) == 0) {
            $client = array(
                'serial_number' => $serial_number,
                'name' => '',
                'surname' => '',
                'mail' => '',
                'phone' => ''
            );
            $disabled = '';
        }
        else {
            $disabled = 'readonly';
        }
        return view('frontend.queue')->with(['current_queue'=>$current_queue, 'last_queue'=>$last_queue, 'current_service_name'=>$services['name'], 'serial_number'=>$serial_number, 'client_arr'=>$client, 'disabled'=>$disabled]);
    }
}
