@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h2>Item Name: {{ $detail->subcategory->name }}</h2>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <h3>Details</h3>
    <table class="table table-hover table-sm">
        <thead>
            <th>Item Id</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
            <th>Iva</th>
            <th>Invoice Id</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th class="text-right"></th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->price }}</td>
                <td>{{ $detail->subtotal }}</td>
                <td>{{ $detail->iva }}</td>
                <td>{{ $detail->invoice->id }}</td>
                <td>{{ $detail->created_at }}</td>
                <td>{{ $detail->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
<br>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

        <a class="btn btn-secondary" href="{{ route('details.edit', $detail) }}">Edit</a>

        <a class="btn btn-secondary" href="/details/{{ $detail->id }}/confirmDelete">Delete</a>
    </div>
</div>
@endsection