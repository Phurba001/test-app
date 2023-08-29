<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index',[
        'product'=> $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Category::all();
        return view('product.create',[
            'product'=> $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'category'=>'required',
           

        ]);
        Product::create($request->all());
        return redirect()->route('product.index')->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = CategoryProduct::find($id);
        $Product = Product::find($id);
        $cato = Category::find($cat->category_id);
        
      if( !$Product){
        request()->session()->flash('error','unable to locate the todo');
        return to_route('product.index')->withErrors([
            'error'=> 'unable to locate the Product'

        ]);
    }
        return view('product.edit',['product'=>$Product,'cat'=>$cato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
       
        $Product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request)
    {
        $cat = Product::find($request->id);
        $cat->delete();
    return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
