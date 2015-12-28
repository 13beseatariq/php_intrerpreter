<?php

namespace App\Http\Controllers;

use App\test;
use App\user_code;
use Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function main()
    {
        if (\Auth::user()) {
            return view('interpreter_gui');
        }
        else
            return redirect ('login');
    }
    public function formdata()
    {
        if(Request::ajax())
        {
            $type = Request::get('type');
            if ($type=='run_it') {
                $data = Request::get('code');
                $myfile = fopen("code.php", "w+") or die("Unable to open file!");
                fwrite($myfile, '<?php '.$data.' ?>');
                fclose($myfile);
              //  print_r($data);
            }
            elseif ($type==='store_it')
            {
                $code = Request::get('code');
                $pub= Carbon::now();
                $test= new user_code;
                $test->code = $code;
                $test->published_at= $pub;
                $test->save();
                //print_r($code);
            }
        }//ajax if closes here
    }//fordata method closes here

    public function show_all_codes()
    {
        if (\Auth::user()) {
            return view('all_codes');
        }
        else
            return redirect ('login');
    }
    /*public function test()
    {
        $test= new user_code;
        $test->code = "new Code hai ye";
        $test->published_at= Carbon::now();
        $test->save();
        return ("Done!");
    }*/
}