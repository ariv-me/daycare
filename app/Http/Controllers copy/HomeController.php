<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;

use App\Helpers;
use Carbon\Carbon;
use StdClass;

class HomeController extends Controller
{
   
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $app = SistemApp::sistem();
        $unit = $app['unit_nama'];
        $menu = SistemApp::OtoritasMenu($app['idu']);

        return view('home',compact('app','menu','unit'));  
    }

    public function index_blank()
    {
        $app = SistemApp::sistem();
        $unit = $app['unit_nama'];
        $menu = SistemApp::OtoritasMenu($app['idu']);

        return view('blank',compact('app','menu','unit'));        

    }
}
