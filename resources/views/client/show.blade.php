@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Client: {{ $client->name }} {{ $client->last_name }}</h2>
        </div>
    </div>        
    <br>
    <div class="table-responsive-lg">
        <h3>Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Id</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>
            <tbody>                
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->created_at }}</td>
                    <td>{{ $client->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('clients.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('clients.edit', $client) }}">Edit</a>

            <a class="btn btn-secondary" href="/clients/{{ $client->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
