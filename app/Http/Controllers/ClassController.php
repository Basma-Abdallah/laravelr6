<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::get();
        return view ('classes' , compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //dd($request);
      $className=$request->className;
      $price=$request->price;
      $capacity=$request->capacity;
      //$is_fulled= $request->fulled;
      $is_fulled= isset($request->fulled);
      $timeFrom= $request->time_from;
      $timeTo= $request->time_to;


    //   $className="test";
    //   $price=22;
    //   $capacity=33;
    //   $is_fulled= true;
    //   $timeFrom= 555;
    //   $timeTo= 5555;
      Classes::create([
             'className' => $className,
             'capacity'=> $capacity,
             'price'=> $price,
             'is_fulled'=> $is_fulled,
             'timeFrom'=> $timeFrom,
             'timeTo'=> $timeTo
      ] );


      return redirect()->route('class.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class=Classes::findOrfail($id);
        return view('class_details' ,compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class=classes::findOrfail($id);
        return view('edit_class' ,compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
      $className=$request->className;
      $price=$request->price;
      $capacity=$request->Capacity;
      //$is_fulled= $request->fulled;
      $is_fulled= isset($request->fulled);
      $timeFrom= $request->time_from;
      $timeTo= $request->time_to;
      $data =([
        'className'=>$className,
        'capacity'=>$capacity,
        'price'=>$price,
        'is_fulled'=>$is_fulled,
        'timeFrom'=>$timeFrom,
        'timeTo'=>$timeTo

 ] );

        Classes::where('id' ,$id)->update($data);
        return redirect()->route('class.index');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
    $id = $request->id;
    Classes::where('id', $id)->delete();
    return redirect('classes');
    }
}
