@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Payment type: {{ $paymentType->name }}</h2>
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
                <th>Invoice state</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>

            <tbody>
            @foreach($paymentType->invoices as $invoice)
                <tr>
                    <td>{{ $invoice->client->name }} {{ $invoice->client->last_name }}</td>
                    <td>{{ date('F d, Y', strtotime($invoice->due_date)) }}</td>
                    <td>{{ date('F d, Y', strtotime($invoice->receipt_date)) }}</td>                    
                    <td>{{ $invoice->invoiceState->name }}</td>
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
            <a class="btn btn-secondary" href="{{ route('paymentTypes.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('paymentTypes.edit', $paymentType) }}">Edit</a>

            <a class="btn btn-secondary" href="/paymentTypes/{{ $paymentType->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
