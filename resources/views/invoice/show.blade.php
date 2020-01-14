@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Invoice: {{ $invoice->id }}</h2>
        </div>
    </div>        
    <br>
    
    <div class="table-responsive-lg">
        <h3>Item Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th class="text-right"></th>
            </thead>            
            <tbody>
            @foreach($invoice->details as $detail)
                <tr>
                    <td>{{ $detail->subcategory->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

            <a class="btn btn-primary" href="{{ route('details.create', $detail ?? '') }}">Add</a>

            <!-- <a class="btn btn-secondary" href="{{ route('invoices.edit', $invoice) }}">Edit</a>

            <a class="btn btn-secondary" href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a> -->
        </div>
    </div>
@endsection
