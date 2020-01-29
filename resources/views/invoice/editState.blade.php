@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Edit State of Invoice {{ $invoice->id }}</h1>
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

        <form action="{{ route('invoices.updateState', $invoice) }}" method="POST">
            @csrf
            @method('PATCH')

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