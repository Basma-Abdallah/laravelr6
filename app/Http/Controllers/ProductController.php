<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\Common;


class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    use Common;
    public function index()
    {
        
        $products = Product::orderBy('updated_at', 'desc')->offset(0)->limit(3)->get();
        return view('fashion-index' ,compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //vaidation of data
        $message=[
            'ProductName.string'=>' car Title is string',
            'ProductName.required'=>' car Title is required',
            'description.required'=>' car description is required',
            'description.max'=>' car description max is 100 words',
            'price.decimal'=>' car price in decimel max is 100 words',
            'image.required'=>' car image is required',
            'image.mimes'=>' car image not supported',
             ];

        $data= $request->validate([
        'ProductName'=>'required|string',
         'description'=>'required|string|max:300',
         'price'=>'required|decimal:0,2',
         'image' =>'required|mimes:png,jpg,jpeg'
        ] , $message);
        
        $data['published']=isset($request->published);
        $data['image']= $this->uploadFile($request->image ,'assets/images/product');
        //dd($data);
        Product::create($data);
        return redirect()->route('products.create');
        
    


    }
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
       
        $products = Product::get();
       return view('fashion-index' ,compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::findOrfail($id);
      return view('edit_product' ,compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
       
        
        //dd($request);

    $message=[
        'ProductName.string'=>' car Title is required',
        'description.string'=>' car description is string',
        'description.max'=>' car description max is 100 words',
        'price.decimal'=>' car price in decimel max is 100 words',
        'image.required'=>' car image is required',
        'image.mimes'=>' car image not supported',
         ];
      
         $data= $request->validate([

                'ProductName'=>'string',
                'description'=>'string|max:300',
                'price'=>'decimal:0,2',
                'image' =>'mimes:png,jpg,jpeg',
                                   ] , $message);
       $data['published']=isset($request->published);
       $data['image']= $this->uploadFile($request->image ,'assets/images/product');
     
       Product::where('id' ,$id)->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
