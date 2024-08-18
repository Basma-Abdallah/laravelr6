<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests ;
use App\Models\Phone;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Student;
use Illuminate\Support\Facades\DB;



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
        function insert(Request $request){
            
        }
        function index()
    {
        return  view ('fashion-index');
    }
    function about()
    {
        return  view ('about');
    }
    public function test() {
       // dd(Student::find(1));
       //dd(Student::find(3)?->phone->phone_number);
      // dd(Student::find(3),Student::find(1)->phone);

        dd(
            DB::table('students')
            ->join('phones', 'phones.id', '=', 'students.phone_id')
            ->where('students.id', '=', 1)
            ->first()
        );
    }
    function task12()
    {


        return  view ('task12');
    }
    function task12go(Request $request)
    {
        
        return $request->name .'<br>'. $request->email.'<br>'. $request->subject.'<br>'. $request->messege ;
    }
}
