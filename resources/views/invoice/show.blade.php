@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Invoice: {{ $invoice->id }}</h2>
        </div>
    </div>        
    <br>
    
    <div class="table-responsive-lg">
        <h3>Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Due Date</th>
                <th>Receipt Date</th>
                <th>Payment Type</th>
                <th>Client</th>
                <th>Invoice State</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>
            <tbody>                
                <tr>
                    <td>{{ $invoice->due_date }}</td>
                    <td>{{ $invoice->receipt_date }}</td>
                    <td>{{ $invoice->paymentType->name }}</td>
                    <td>{{ $invoice->client->name }}</td>
                    <td>{{ $invoice->invoiceState->name }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('invoices.edit', $invoice) }}">Edit</a>

            <a class="btn btn-secondary" href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
