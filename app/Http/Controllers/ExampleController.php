<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    function task3go()
    {


        return  view ('task3go');
    }
}
