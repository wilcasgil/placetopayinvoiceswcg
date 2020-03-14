@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>New Invoice</h1>
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

        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="client_id">Client</label>
                            <select class="form-control" id="client_id" name="client_id" required autofocus="">
                                <option value="">Please select a client</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="due_date">Due Date:</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" placeholder="Type a due date" value="{{ old('due_date') }}" required>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="payment_type_id">Payment Type</label>
                            <select class="form-control" id="payment_type_id" name="payment_type_id" required>
                                <option value="">Please select a payment type</option>
                                @foreach ($paymentTypes as $paymetType)
                                <option value="{{ $paymetType->id }}">{{ $paymetType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="invoice_state_id">Invoice State</label>
                            <select class="form-control" id="invoice_state_id" name="invoice_state_id" required>
                                <option value="">Please select a invoice state</option>
                                @foreach ($invoiceStates as $invoiceState)
                                <option value="{{ $invoiceState->id }}">{{ $invoiceState->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>

    </div>
</div>
@endsection