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
        //   $className=$request->className;
        //   $price=$request->price;
        //   $capacity=$request->capacity;
        //   //$is_fulled= $request->fulled;
        //   $is_fulled= isset($request->fulled);
        //   $timeFrom= $request->time_from;
        //   $timeTo= $request->time_to;

      $data= $request->validate([
        'className'=>'required|string',
         'capacity'=>'required|numeric|min:2|max:25',
         'price'=>'required|decimal:0,2',
         'timeFrom'=>'required|date_format:H:i',
         'timeTo'=>'required|date_format:H:i'
    
        ]);
        $data['is_fulled']=isset($request->is_fulled);

       //dd($data);
       Classes::create($data);
        return redirect()->route('class.index');
    //   $className="test";
    //   $price=22;
    //   $capacity=33;
    //   $is_fulled= true;
    //   $timeFrom= 555;
    //   $timeTo= 5555;
    //   Classes::create([
    //          'className' => $className,
    //          'capacity'=> $capacity,
    //          'price'=> $price,
    //          'is_fulled'=> $is_fulled,
    //          'timeFrom'=> $timeFrom,
    //          'timeTo'=> $timeTo
    //   ] ); 
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
        //dd($request , $id);
        //dd($request);
        //       $className=$request->className;
        //       $price=$request->price;
        //       $capacity=$request->capacity;
        //       //$is_fulled= $request->fulled;
        //       $is_fulled= isset($request->is_fulled);
        //       $timeFrom= $request->timeFrom;
        //       $timeTo= $request->timeTo;
        //       $data =([
        //         'className'=>$className,
        //         'capacity'=>$capacity,
        //         'price'=>$price,
        //         'is_fulled'=>$is_fulled,
        //         'timeFrom'=>$timeFrom,
        //         'timeTo'=>$timeTo

        //  ] );

        $data= $request->validate([

            'className'=>'string',
             'capacity'=>'numeric|min:2|max:25',
             'price'=>'decimal:0,2',
             'strtotime($class->timeFrom)'=>'date_format:H:i',
             'strtotime($class->timeTo)'=>'date_format:H:i|after:start_time'
        
            ]);
           
            $data['is_fulled']=isset($request->is_fulled);
    
        // dd($data);
          
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

    public function showDeleted()
    {
       $classes= Classes::onlyTrashed()->get();
        return view ('trashedClasses' , compact('classes'));
    }
    public function restore (string $id)
    {
        Classes::where('id' , $id)->restore();
        return redirect()->route('class.showDeleted');
    }
    public function forceDelete (string $id)
    {
        //Car::where('id' , $id)->forceDelete();
        $classes = Classes::onlyTrashed()->find($id);
        $classes->forceDelete();
        return redirect()->route('class.index');
    }
}
