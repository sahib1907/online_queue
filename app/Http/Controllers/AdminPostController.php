<?php

namespace App\Http\Controllers;

use App\Client;
use App\Services;
use Illuminate\Http\Request;

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
}
