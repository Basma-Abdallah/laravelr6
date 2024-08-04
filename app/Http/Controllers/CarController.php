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
        $message=[
            'carTitle.string'=>' car Title is string',
            'carTitle.required'=>' car Title is required',
            'description.required'=>' car description is required',
            'description.max'=>' car description max is 100 words',
            'price.decimal'=>' car price in decimel max is 100 words',
            'image.required'=>' car image is required',
            'image.mimes'=>' car image not supported',
             ];

        $data= $request->validate([
        'carTitle'=>'required|string',
         'description'=>'required|string|max:300',
         'price'=>'required|decimal:0,2',
         'image' =>'required|mimes:png,jpg,jpeg'
        

        ] , $message);
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        $data['image']= $file_name;
        $data['published']=isset($request->published);
        $data['image']= $file_name;
        $data['imagePath']= $path;
        
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
      // dd($car);
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
            $car = Car::findOrFail($id);
            $tempImage = $car['image'];

        
    
        $message=[
            'carTitle.string'=>' car Title is required',
            'description.string'=>' car description is string',
            'description.max'=>' car description max is 100 words',
            'price.decimal'=>' car price in decimel max is 100 words',
            'image.required'=>' car image is required',
            'image.mimes'=>' car image not supported',
             ];
            $data= $request->validate([

                    'carTitle'=>'string',
                    'description'=>'string|max:300',
                    'price'=>'decimal:0,2',
                    'image' =>'mimes:png,jpg,jpeg'
    
            ] , $message);

            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file_name = time() . '.' . $image->getClientOriginalExtension();
                $path = 'assets/images';
                $request->image->move($path, $file_name);
                
               
                
        
                // Update the image path in the database
                $car->image = $file_name;
               
            }
            //$car->save();
           $data['published']=isset($request->published);
           $data['image']= $file_name;
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
