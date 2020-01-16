@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Invoice: {{ $invoice->id }}</h2>
        </div>
    </div>        
    <br>
    
    <div class="table-responsive-lg">
        <div class="row">
            <div class="col">
                <h3>Item Details</h3>
            </div>
            <div class="col">
                <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

                <a class="btn btn-primary" href="{{ route('details.create', $detail ?? '') }}">Add</a>
            </div>
        </div>
        <br>
        
        <table class="table table-hover table-sm">
            <thead>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Iva</th>
                <th>Actions</th>
                <th class="text-right"></th>
            </thead>            
            <tbody>
            @foreach($invoice->details as $detail)
                <tr>
                    <td><a href="{{ route('details.show', $detail) }}">{{ $detail->subcategory->name }}</a></td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->subtotal }}</td>
                    <td>{{ $detail->iva }}</td>
                    <td>
                        <a href="{{ route('details.edit', $detail) }}">Edit</a>
                        <a href="/details/{{ $detail->id }}/confirmDelete">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
@endsection
