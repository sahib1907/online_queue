<?php

namespace App\Http\Controllers;

use App\Client;
use App\Services;
use Illuminate\Http\Request;

class AdminGetController extends AdminController
{
    //index
    public function get_index() {
        return view('backend.index');
    }

    //clients
    public function get_clients() {
        $clients = Client::where(['deleted'=>0])->orderBy('id', 'DESC')->select()->get();
        return view('backend.clients')->with(['clients'=>$clients]);
    }

    //services
    public function get_services() {
        $services = Services::where(['deleted'=>0])->select()->get();
        return view('backend.services')->with(['services'=>$services]);
    }

    public function get_add_service() {
        return view('backend.service_add');
    }
}
