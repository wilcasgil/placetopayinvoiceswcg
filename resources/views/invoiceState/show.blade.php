@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Invoice state: {{ $invoiceState->name }}</h2>
        </div>
    </div>        
    <br>

    <div class="table-responsive-lg">
        <h3>Invoice Detail</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Client</th>
                <th>Due date</th>
                <th>Receipt date</th>
                <th>Payment Type</th>                
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>

            <tbody>
            @foreach($invoiceState->invoices as $invoice)
                <tr>
                    <td>{{ $invoice->client->name }} {{ $invoice->client->last_name }}</td>
                    <td>{{ $invoice->due_date }}</td>
                    <td>{{ $invoice->receipt_date }}</td>
                    <td>{{ $invoice->paymentType->name }}</td>                    
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoiceStates.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('invoiceStates.edit', $invoiceState) }}">Edit</a>

            <a class="btn btn-secondary" href="/invoiceStates/{{ $invoiceState->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
