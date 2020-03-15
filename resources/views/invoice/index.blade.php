@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Invoices</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ route('invoices.create') }}">Create a new invoice</a>
    </div>

    <div class="col">
        <form action="{{ route('invoices.import.excel') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif             -->
            <table>
                <div class="row">
                    <div class="col">
                        <input type="file" name="file">
                    </div>
                    <td>
                        <button class="btn btn-success">Import Invoices</button>
                        <!-- <a class="btn btn-primary">Import invoices</a> -->
                    </td>
                </div>
            </table>
            
        </form>
    </div>

    <div class="col">
        <a class="btn btn-primary" href="{{ route('invoiceStates.index') }}">Invoice State</a>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <table class="table table-hover table-sm table-dark">
        <thead>
            <th>Number</th>
            <th>Client</th>
            <th>Created at</th>
            <th>Due Date</th>
            <th>Invoice State</th>
            <th>Payment Type</th>
            <th>Actions</th>
            <th class="text-right"></th>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td><a href="{{ route('invoices.show', $invoice) }}">{{ $invoice->id }}</a></td>
                <td>{{ $invoice->client->name }} {{ $invoice->client->last_name }}</td>
                <td>{{ date('F d, Y', strtotime($invoice->created_at)) }}</td>
                <td>{{ date('F d, Y', strtotime($invoice->due_date)) }}</td>
                <td><a href="/invoices/{{ $invoice->id }}/editState">{{ $invoice->invoiceState->name }}</a></td>
                <td>{{ $invoice->paymentType->name }}</td>
                <td>
                    <a href="{{ route('invoices.edit', $invoice) }}">Edit</a>
                    <a href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3 d-flex justify-content-center">
    {{ $invoices->links() }}
</div>
@endsection