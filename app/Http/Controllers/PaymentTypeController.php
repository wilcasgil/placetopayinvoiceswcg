<?php

namespace App\Http\Controllers;

use App\PaymentType;

use App\Http\Requests\PaymentType\StoreRequest;
use App\Http\Requests\PaymentType\UpdateRequest;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentTypes = PaymentType::all();

        return response()->view('paymentType.index', compact('paymentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentTypes = new PaymentType;
        
        return response()->view('paymentType.create', compact('paymentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $paymentType = new PaymentType;
        
        $paymentType->name = $request->input('name');

        $paymentType->save();

        return redirect()->route('paymentTypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentType $paymentType)
    {
        return response()->view('paymentType.show', compact('paymentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentType $paymentType)
    {
        return response()->view('paymentType.edit', compact('paymentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PaymentType $paymentType)
    {
        $paymentType->name = $request->input('name');
        $paymentType->active = $request->input('active');

        $paymentType->save();

        return redirect()->route('paymentTypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentType = PaymentType::findOrFail($id);

        $paymentType->delete();

        return redirect()->route('paymentTypes.index');
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
        $paymentType = PaymentType::findOrFail($id);

        return response()->view('paymentType.confirmDelete', compact('paymentType'));
    }
}
