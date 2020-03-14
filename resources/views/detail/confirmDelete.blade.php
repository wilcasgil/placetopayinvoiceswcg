@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Delete Item: {{ $detail->id }}</h1>
    </div>
</div>
<br>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>

        <a class="btn btn-secondary" href="{{ route('details.edit', $detail) }}">Edit</a>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <h3>Details</h3>
    <table class="table table-hover table-sm">
        <thead>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Iva</th>
            <th class="text-right"></th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $detail->subcategory->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->price }}</td>
                <td>{{ $detail->subtotal }}</td>
                <td>{{ $detail->iva }}</td>
            </tr>
        </tbody>
    </table>
</div>
<br>

<div class="row">
    <div class="col">
        <form action="/details/{{ $detail->id }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection