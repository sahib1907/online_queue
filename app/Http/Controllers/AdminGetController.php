<?php

namespace App\Http\Controllers;

use App\Client;
use App\Queues;
use App\Reservations;
use App\Services;
use Illuminate\Http\Request;

class AdminGetController extends AdminController
{
    //index
    public function get_index() {
        return view('backend.index');
    }

    //admins
    public function get_admins() {
        $services = Services::where(['deleted'=>0])->select()->get();
        return view('backend.services')->with(['services'=>$services]);
    }

    public function get_add_admin() {
        return view('backend.service_add');
    }

    public function get_update_admin($id) {
        $service = Services::where(['id'=>$id, 'deleted'=>0])->select()->first();
        if (count($service) == 0) {
            return redirect('/admin');
        }
        return view('backend.service_update')->with('service', $service);
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

    public function get_update_service($id) {
        $service = Services::where(['id'=>$id, 'deleted'=>0])->select()->first();
        if (count($service) == 0) {
            return redirect('/admin');
        }
        return view('backend.service_update')->with('service', $service);
    }

    //queues
    public function get_queues() {
        $queues = Queues::leftJoin('clients as c', 'queues.client_id', '=', 'c.id')->leftJoin('services as s', 'queues.service_id', '=', 's.id')->where(['queues.deleted'=>0])->select('queues.id', 'queues.date', 'queues.code', 'queues.queue', 'c.name', 'c.surname', 's.name as service', 'queues.created_at')->get();
        return view('backend.queues')->with(['queues'=>$queues]);
    }

    //reservations
    public function get_reservations() {
        $reservations = Reservations::leftJoin('clients as c', 'reservations.client_id', '=', 'c.id')->leftJoin('services as s', 'reservations.service_id', '=', 's.id')->where(['reservations.deleted'=>0])->select('reservations.id', 'reservations.date', 'reservations.code', 'reservations.time', 'c.name', 'c.surname', 's.name as service', 'reservations.created_at')->get();
        return view('backend.reservations')->with(['reservations'=>$reservations]);
    }
}
