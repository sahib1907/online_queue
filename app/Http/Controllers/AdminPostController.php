<?php

namespace App\Http\Controllers;

use App\Client;
use App\Queues;
use App\Reservations;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPostController extends AdminController
{

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
