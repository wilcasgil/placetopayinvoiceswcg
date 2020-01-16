<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\InvoiceState;
use App\PaymentType;
use App\Subcategory;
use App\Detail;

use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with(['paymentType'])->paginate();

        return response()->view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentTypes = PaymentType::all();
        $clients = Client::all();
        $invoiceStates = InvoiceState::all();
        $subcategories = Subcategory::all();
       
        return response()->view('invoice.create', compact('paymentTypes', 'clients', 'invoiceStates', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $invoice = new Invoice;
        
        $invoice->due_date = $request->input('due_date');
        $invoice->receipt_date = $request->input('receipt_date');
        $invoice->payment_type_id = $request->input('payment_type_id');
        $invoice->client_id = $request->input('client_id');
        $invoice->invoice_state_id = $request->input('invoice_state_id');

        $invoice->save();

        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //$details = Detail::with(['invoice'])->paginate();
        //$details = DB::table('details')->simplePaginate(10);
        return response()->view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $paymentTypes = PaymentType::all();
        $clients = Client::all();
        $invoiceStates = InvoiceState::all();

        return response()->view('invoice.edit', compact('invoice', 'paymentTypes', 'clients', 'invoiceStates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Invoice $invoice)
    {
        $invoice->due_date = $request->input('due_date');
        $invoice->receipt_date = $request->input('receipt_date');
        $invoice->payment_type_id = $request->input('payment_type_id');
        $invoice->client_id = $request->input('client_id');
        $invoice->invoice_state_id = $request->input('invoice_state_id');

        $invoice->save();

        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->delete();

        return redirect()->route('invoices.index');
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
        $invoice = Invoice::findOrFail($id);

        return response()->view('invoice.confirmDelete', compact('invoice'));
    }

    public function updateState(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        // $invoice->due_date = $request->input('due_date');
        // $invoice->receipt_date = $request->input('receipt_date');
        // $invoice->payment_type_id = $request->input('payment_type_id');
        // $invoice->client_id = $request->input('client_id');

        $invoice->where('id',$request[$id])
       ->update(['invoice_state-id'=>$request['invoice_state_id']]);
        //$invoice->invoice_state_id = $request->input('invoice_state_id');

        $invoice->save();

        return redirect()->route('invoices.index');
    }

    public function editState($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoiceStates = InvoiceState::all();

        return response()->view('invoice.editState', compact('invoice', 'invoiceStates'));
    }
}
