@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete invoce state: {{ $invoiceState->name }}</h1>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoiceStates.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('invoiceStates.edit', $invoiceState) }}">Edit</a>
        </div>
    </div>
    <br>

    <div class="table-responsive-lg">
        <h3>Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Id</th>
                <th>Active</th>
                <th>Created at</th>                    
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>
            <tbody>                
                <tr>
                    <td>{{ $invoiceState->id }}</td>
                    <td>{{ $invoiceState->active }}</td>
                    <td>{{ $invoiceState->created_at }}</td>
                    <td>{{ $invoiceState->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    
    <div class="row">
        <div class="col">
            <form action="/invoiceStates/{{ $invoiceState->id }}" method="POST">
                @csrf
                @method('delete')                
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
