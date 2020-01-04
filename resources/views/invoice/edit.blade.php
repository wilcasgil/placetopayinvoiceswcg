@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Invoice {{ $invoice->id }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('invoices.update', $invoice) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" placeholder="Type a due date" value="{{ $invoice->due_date }}" required>
                </div>

                <div class="form-group">
                    <label for="receipt_date">Receipt Date:</label>
                    <input type="date" class="form-control" id="receipt_date" name="receipt_date" placeholder="Type a receipt date" value="{{ $invoice->receipt_date }}" required>
                </div>

                <div class="form-group">
                    <label for="payment_type_id">Payment Type</label>
                    <select class="form-control" id="payment_type_id" name="payment_type_id" required>
                        <option value="">Please select a payment type</option>
                            @foreach ($paymentTypes as $paymetType)
                                <option value="{{ $paymetType->id }}">{{ $paymetType->name }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select class="form-control" id="client_id" name="client_id" required>
                        <option value="">Please select a client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="invoice_state_id">Invoice State</label>
                    <select class="form-control" id="invoice_state_id" name="invoice_state_id" required>
                        <option value="">Please select a invoice state</option>
                            @foreach ($invoiceStates as $invoiceState)
                                <option value="{{ $invoiceState->id }}">{{ $invoiceState->name }}</option>
                            @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
