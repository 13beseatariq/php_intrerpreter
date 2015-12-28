<?php

namespace App\Http\Controllers;

use App\test;
use App\user_code;
use Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AllCodesController extends Controller
{
    public function main()
    {
        //if (\Auth::user())
        {
                $codes = user_code::all();
                return view('all_codes', compact('codes'));
        }
        //else
          //  return redirect ('login');
    }
}
