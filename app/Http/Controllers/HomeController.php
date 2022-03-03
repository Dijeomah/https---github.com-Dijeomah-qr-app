<?php

namespace App\Http\Controllers;

use App\Models\QrLinks;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $qr_codes = QrLinks::where('user_id', $request->user()->id)->get();
        return view('home')->with(compact('qr_codes',$qr_codes));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(Request $request)
    {
        // $qr_codes = QrLinks::where('user_id', $request->user()->id)->get();
        $users = User::get();
        $qr_codes = QrLinks::get();
        // return view('pages.admin-home')->with(compact('qr_codes',$qr_codes))->with(compact('users',$users));
        return view('pages.admin-home',['users'=>$users, 'qr_codes'=>$qr_codes]);
    }
}
