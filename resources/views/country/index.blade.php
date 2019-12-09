@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Countries</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/countries/create">Create a new country</a>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-sm table-dark">
                <thead>                
                    <th>Name</th>
                    <th>Created at</th>                    
                    <th>Action</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td><a href="/countries/{{ $country->id }}">{{ $country->name }}</a></td>                    
                        <td>{{ $country->created_at }}</td>                        
                        <td><a href="/countries/{{ $country->id }}/edit">Edit</a></td>
                        <td><a href="/countries/{{ $country->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection