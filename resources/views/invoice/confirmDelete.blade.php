@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Delete Invoice: {{ $invoice->id }}</h1>
    </div>
</div>
<br>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

        <a class="btn btn-secondary" href="{{ route('invoices.edit', $invoice) }}">Edit</a>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <h3>Details</h3>
    <table class="table table-hover table-sm">
        <thead>
            <th>Due Date</th>
            <th>Payment Type</th>
            <th>Client</th>
            <th>Invoice State</th>
            <th class="text-right"></th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $invoice->due_date }}</td>
                <td>{{ $invoice->paymentType->name }}</td>
                <td>{{ $invoice->client->name }}</td>
                <td>{{ $invoice->invoiceState->name }}</td>
            </tr>
        </tbody>
    </table>
</div>
<br>

<div class="row">
    <div class="col">
        <form action="/invoices/{{ $invoice->id }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection