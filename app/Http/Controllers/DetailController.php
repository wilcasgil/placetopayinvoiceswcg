<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Invoice;
use App\Subcategory;

use App\Http\Requests\Detail\StoreRequest;
use App\Http\Requests\Detail\UpdateRequest;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoices = Invoice::all();
        $subcategories = Subcategory::all();

        return response()->view('detail.create', compact('invoices', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $detail = new Detail;
        $detail->quantity = $request->input('quantity');
        $detail->price = $request->input('price');
        $detail->invoice_id = $request->input('invoice_id');
        $detail->subcategory_id = $request->input('subcategory_id');

        $detail->save();

        return redirect()->route('details.create');
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
    public function edit(Detail $detail)
    {
        $invoices = Invoice::all();
        $subcategories = Subcategory::all();

        return response()->view('detail.edit', compact('detail', 'invoices', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Detail $detail)
    {
        $detail->quantity = $request->input('quantity');
        $detail->price = $request->input('price');
        $detail->invoice_id = $request->input('invoice_id');
        $detail->subcategory_id = $request->input('subcategory_id');

        $detail->save();

        return redirect()->route('details.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
