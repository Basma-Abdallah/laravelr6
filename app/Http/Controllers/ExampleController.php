<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ExampleController extends Controller
{
    function login()
    {
        return  view ('login');
    }
    function logincheck(){
        return  view ('logincheck');
    }

    function cv () {
        return  view ('cv');
    }

    function task3()
    {


        return  view ('task3');
    }
    function task3go(Request $request)
    {
        
        return $request->name .'<br>'. $request->email.'<br>'. $request->subject.'<br>'. $request->messege ;
    }
}
