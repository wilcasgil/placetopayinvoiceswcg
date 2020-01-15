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
                <th>Total Price</th>
                <th>Actions</th>
                <th class="text-right"></th>
            </thead>            
            <tbody>
            @foreach($invoice->details as $detail)
                <tr>
                    <td>{{ $detail->subcategory->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->subtotal }}</td>
                    <td>
                        <a href="{{ route('details.edit', $detail) }}">Edit</a>
                        <a href="/details/{{ $detail->id }}/confirmDelete">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><b>IVA</b></td>
                    <td class="text-right">$ {iva.toFixed(2)}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><b>Sub Total</b></td>
                    <td class="text-right">${subTotal.toFixed(2)}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><b>Total</b></td>
                    <td class="text-right">$ {total.toFixed(2)}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

            <a class="btn btn-primary" href="{{ route('details.create', $detail ?? '') }}">Add</a>
        </div>
    </div>

    <script>
        
    </script>
@endsection
