<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Socials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $socials = Socials::where(['deleted'=>0])->select()->get();
        $settings = Settings::where(['deleted'=>0, 'id'=>1])->select()->first();
        return View::share(['socials'=>$socials, 'settings'=>$settings]);
    }

}
