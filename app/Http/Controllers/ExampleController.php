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
    function uploadForm(){

        return view ('upload');
    }
    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
        }
        
}
