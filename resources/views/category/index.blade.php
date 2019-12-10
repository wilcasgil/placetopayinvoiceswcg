@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col">
            <h1>Categories</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/categories/create">Create a new category</a>            
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
                @foreach($categories as $category)
                    <tr>
                        <td><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></td>                    
                        <td>{{ $category->created_at }}</td>
                        <td><a href="/categories/{{ $category->id }}/edit">Edit</a></td>
                        <td><a href="/categories/{{ $category->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>             
@endsection