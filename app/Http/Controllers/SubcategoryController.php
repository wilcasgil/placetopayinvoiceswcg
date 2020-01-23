<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;

use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::with(['category'])->paginate();

        return response()->view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return response()->view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $subcategory = new Subcategory;
        
        $subcategory->name = $request->input('name');
        $subcategory->price = $request->input('price');
        $subcategory->stock = $request->input('stock');
        $subcategory->category_id = $request->input('category_id');
        
        $subcategory->save();
        
        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return response()->view('subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();

        return response()->view('subcategory.edit', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Subcategory $subcategory)
    {
        $subcategory->name = $request->input('name');
        $subcategory->price = $request->input('price');
        $subcategory->stock = $request->input('stock');
        $subcategory->category_id = $request->input('category_id');
        
        $subcategory->save();

        return redirect()->route('subcategories.index')->withSuccess(__('Subcategory updated successfully!'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success','Subcategory Deleted');
    }

    /**
     * confirmDelete
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function confirmDelete($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        
        return response()->view('subcategory.confirmDelete', compact('subcategory'));
    }
}
