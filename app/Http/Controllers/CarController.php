<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all cars from db 
        //return view all cars , cars
        //this code like select*from cars

        $cars = Car::get();
        return view ('cars' , compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('add_cars');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //vaidation of data

        $data= $request->validate([
        'carTitle'=>'required|string',
         'description'=>'required|string|max:300',
         'price'=>'required|decimal:0,2',

        ]);
        $data['published']=isset($request->published);

        //dd($data);
        Car::create($data);
        return redirect()->route('car.index');
        
        // $carTitle=$request->carTitle;
        // $price=$request->price;
        // $descrition=$request->description;
        // $published= isset($request->published);

        // Car::create([
        //        'carTitle' => $carTitle,
        //        'price'=> $price,
        //        'description'=> $descrition,
        //        'published'=> $published


        // ] );
        
    


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd(Car::find($id)->toSql());
        $car=Car::findOrfail($id);

       //dd( $car->toSql());
        return view('car_details' ,compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $car=Car::findOrfail($id);
      return view('edit_car' ,compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  dd($request , $id);
        // $carTitle=$request->carTitle;
        // $price=$request->price;
        // $descrition=$request->description;
        // $published= isset($request->published);
        // $data = [
        //     'carTitle' => $carTitle,
        //        'price'=> $price,
        //        'description'=> $descrition,
        //        'published'=> $published
        // ];
            $data= $request->validate([

                    'carTitle'=>'string',
                    'description'=>'string|max:300',
                    'price'=>'decimal:0,2',
    
            ]);
           $data['published']=isset($request->published);
            Car::where('id' ,$id)->update($data);
            return redirect()->route('car.index');
        //dd($data);
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id' , $id)->delete();
        return redirect()->route('car.index');
    }
    public function showDeleted()
    {
       $cars= Car::onlyTrashed()->get();
        return view ('trashedCars' , compact('cars'));
    }
    public function restore (string $id)
    {
        Car::where('id' , $id)->restore();
        return redirect()->route('car.showDeleted');
    }
    public function forceDelete (string $id)
    {
        //Car::where('id' , $id)->forceDelete();
        $cars = Car::onlyTrashed()->find($id);
        $cars->forceDelete();
        return redirect()->route('car.index');
    }
    
}
