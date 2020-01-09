@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Client: {{ $client->name }} {{ $client->last_name }}</h2>
        </div>
    </div>        
    <br>

    <div class="table-responsive-lg">
        <h3>Invoice Detail</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Due date</th>
                <th>Receipt date</th>
                <th>Payment Type</th>
                <th>Invoice state</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>

            <tbody>
            @foreach($client->invoices as $invoice)
                <tr>
                    <td>{{ $invoice->due_date }}</td>
                    <td>{{ $invoice->receipt_date }}</td>
                    <td>{{ $invoice->paymentType->name }}</td>
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
            <a class="btn btn-secondary" href="{{ route('clients.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('clients.edit', $client) }}">Edit</a>

            <a class="btn btn-secondary" href="/clients/{{ $client->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
