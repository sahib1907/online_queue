<?php

namespace App\Http\Controllers;

use App\Queues;
use App\Services;
use Illuminate\Http\Request;

class HomeAjaxController extends HomeController
{
    public function ajax_get_queue(Request $request) {
//        $current_queue_list = Services::where(['id'=>$request->service_id, 'deleted'=>0])->select('current_queue')->first();
//        $current_queue = $current_queue_list['current_queue'];
//        $current_date = date('Y-m-d');
//        $queues = Queues::where(['deleted'=>0, 'date'=>$current_date, 'service_id'=>$request->service_id])->orderBy('id', 'DESC')->select('queue')->first();
//        if (count($queues) == 0) {
//            $last_queue = 0;
//        }
//        else {
//            $last_queue = $queues['queue'];
//        }
//
//        $arr['curret_queue'] = $current_queue;
//        $arr['last_queue'] = $last_queue;
//
//        return 5;
    }
}
