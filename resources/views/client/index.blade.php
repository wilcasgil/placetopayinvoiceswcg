@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col">
            <h1>Clients</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/clients/create">Create a new client</a>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-sm table-dark">
                <thead>                
                    <th>Name</th>
                    <th>Last name</th>                    
                    <th>Email</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td><a href="/clients/{{ $client->id }}">{{ $client->name }}</a></td>                    
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->country }}</td>
                        <td>{{ $client->status }}</td>
                        <td><a href="/clients/{{ $client->id }}/edit">Edit</a></td>
                        <td><a href="/clients/{{ $client->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>             
@endsection