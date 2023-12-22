<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validation = $request->validated();
        $validation['image'] = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/products') , $request->image->getClientOriginalName());
        
        Product::create($validation);

        return redirect()->route('products.index')->with(['success'=>"you have successfully created item"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        
        $validation = $request->validated();
        
        if($request->image)
        {
            unlink(public_path('images/products/'.$product->image)); 
            $validation['image'] = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/products') , $request->image->getClientOriginalName());
        }
        
        $product->update($validation);
        
        return redirect()->route('products.index')->with(['success'=>"you have successfully updated item"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink(public_path('images/products/'.$product->image)); 
        $product->delete();

        DB::connection('mysql')->table('products')->insert([
            'id'=>$product->id,
            'title'=>$product->title,
            'description'=>$product->description,
            'image'=>$product->image,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        return back()->with(['success'=>"you have successfully deleted item"]);
    }
}
