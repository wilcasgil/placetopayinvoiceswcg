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
    </div>
    <br>

    <div class="table-responsive-lg">
        <table class="table table-hover table-sm table-dark">
            <thead>
                <th>Id</th>
                <th>Action</th>
                <th>Action</th>
                <th class="text-right"></th>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td><a href="{{ route('invoices.show', $invoice) }}">{{ $invoice->id }}</a></td>
                    <td><a href="{{ route('invoices.edit', $invoice) }}">Edit</a></td>
                    <td><a href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-3 d-flex justify-content-center">
        {{ $invoices->links() }}
    </div>
@endsection
