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
        //dd($request);
        $carTitle=$request->carTitle;
        $price=$request->price;
        $descrition=$request->description;
        $published= isset($request->published);

        Car::create([
               'carTitle' => $carTitle,
               'price'=> $price,
               'description'=> $descrition,
               'published'=> $published


        ] );


        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car=car::findOrfail($id);
        return view('car_details' ,compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $car=car::findOrfail($id);
      return view('edit_car' ,compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //  dd($request , $id);
      
      $carTitle=$request->carTitle;
        $price=$request->price;
        $descrition=$request->description;
        $published= isset($request->published);
        $data = [
            'carTitle' => $carTitle,
               'price'=> $price,
               'description'=> $descrition,
               'published'=> $published
        ];

        Car::where('id' ,$id)->update($data);


        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        car::where('id' , $id)->delete();
        return redirect()->route('car.index');
    }
    public function showDeleted()
    {
       $cars= car::onlyTrashed()->get();
        return view ('trashedCars' , compact('cars'));
    }
}
