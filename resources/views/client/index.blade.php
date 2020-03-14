@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Clients</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ route('clients.create') }}">Create a new client</a>
    </div>
</div>
<br>

<div class="row">
    <div class="col">
        <table class="table table-hover table-sm table-dark">
            <thead>
                <th>Name</th>
                <th>Last name</th>
                <th>Actions</th>
            </thead>

            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td><a href="{{ route('clients.show', $client) }}">{{ $client->name }}</a></td>
                    <td>{{ $client->last_name }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client) }}">Edit</a>
                        <a href="/clients/{{ $client->id }}/confirmDelete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection