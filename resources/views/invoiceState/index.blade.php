@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col">
            <h1>Invoice States</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('invoiceStates.create') }}">Create a new invoice state</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-sm table-dark">
                <thead>                
                    <th>Name</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($invoiceStates as $invoiceState)
                    <tr>
                        <td><a href="{{ route('invoiceStates.show', $invoiceState) }}">{{ $invoiceState->name }}</a></td>
                        <td><a href="{{ route('invoiceStates.edit', $invoiceState) }}">Edit</a></td>
                        <td><a href="/invoiceStates/{{ $invoiceState->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
