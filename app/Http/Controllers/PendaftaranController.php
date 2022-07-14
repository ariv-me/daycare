<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemApp;
use App\Helpers;
use Carbon\Carbon;

use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $app = SistemApp::sistem();
        $menu = SistemApp::OtoritasMenu($app['idu']);
        return view('pendaftaran.baru.index',compact('app','menu'));
    }

}
