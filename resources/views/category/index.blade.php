@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col">
            <h1>Categories</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('categories.create') }}">Create a new category</a>
        </div>
    </div>
    <br>    
    <div class="table-responsive-lg">
        <table class="table table-hover table-sm table-dark">
            <thead>                
                <th>Name</th>
                <th>Action</th>
                <th>Action</th>
                <th class="text-right"></th>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
                    <td><a href="{{ route('categories.edit', $category) }}">Edit</a></td>
                    <td><a href="/categories/{{ $category->id }}/confirmDelete">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>                 
@endsection
