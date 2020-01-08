@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col">
            <h1>Payment Types</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('paymentTypes.create') }}">Create a new payment type</a>
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
                @foreach($paymentTypes as $paymentType)
                    <tr>
                        <td><a href="{{ route('paymentTypes.show', $paymentType) }}">{{ $paymentType->name }}</a></td>
                        <td><a href="{{ route('paymentTypes.edit', $paymentType) }}">Edit</a></td>
                        <td><a href="/paymentTypes/{{ $paymentType->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
