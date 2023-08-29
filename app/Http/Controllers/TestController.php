<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::all();
        return view('category.index',[
        'cat'=> $cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create',[
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'

        ]);
        Category::create($request->all());
        return redirect()->route('category.index')->with('success','category created successfully');
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
        $category = Category::find($id);
      if( !$category){
        request()->session()->flash('error','unable to locate the todo');
        return to_route('category.index')->withErrors([
            'error'=> 'unable to locate the c$category'

        ]);
    }
        return view('category.edit',['cat'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
       
        $category->update($request->all());
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request)
    {
        $cat = Category::find($request->id);
        $cat->delete();
    return redirect()->route('category.index')->with('success', 'Product deleted successfully');
    }
}
