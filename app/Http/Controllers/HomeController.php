<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\user_code;
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
     * @return Response
     */
    public function index()
    {
        if (\Auth::user())
        {
            $role = \Auth::user()->role;
            if  ($role=='user')
                return view('interpreter_gui');
            else {
                $codes = user_code::all();
                return view('all_codes', compact('codes'));
                //return view('all_codes');
            }
        }
        else
            return redirect('/login');
    }
}
