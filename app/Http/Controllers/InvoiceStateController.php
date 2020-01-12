<?php

namespace App\Http\Controllers;

use App\InvoiceState;

use App\Http\Requests\InvoiceState\StoreRequest;
use App\Http\Requests\InvoiceState\UpdateRequest;

class InvoiceStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoiceStates = InvoiceState::all();

        return response()->view('invoiceState.index', compact('invoiceStates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoiceStates = new InvoiceState;
        
        return response()->view('invoiceState.create', compact('invoiceStates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $invoiceState = new InvoiceState;
        $invoiceState->name = $request->input('name');

        $invoiceState->save();

        return redirect()->route('invoiceStates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  InvoiceState $invoiceState
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceState $invoiceState)
    {
        return response()->view('invoiceState.show', compact('invoiceState'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  InvoiceState $invoiceState
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceState $invoiceState)
    {
        return response()->view('invoiceState.edit', compact('invoiceState'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  InvoiceState $invoiceState
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, InvoiceState $invoiceState)
    {
        $invoiceState->name = $request->input('name');
        $invoiceState->active = $request->input('active');

        $invoiceState->save();

        return redirect()->route('invoiceStates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoiceState = InvoiceState::findOrFail($id);

        $invoiceState->delete();

        return redirect()->route('invoiceStates.index');
    }

    public function confirmDelete($id)
    {
        $invoiceState = InvoiceState::findOrFail($id);

        return response()->view('invoiceState.confirmDelete', compact('invoiceState'));
    }
}
