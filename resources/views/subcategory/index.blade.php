@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col">
            <h1>Products and Services</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/subcategories/create">Create a new product or service</a>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-sm table-dark">
                <thead>                
                    <th>Name</th>
                    <th>Price</th>                    
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td><a href="/subcategories/{{ $subcategory->id }}">{{ $subcategory->name }}</a></td>                    
                        <td>{{ $subcategory->price }}</td>
                        <td>{{ $subcategory->stock }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td><a href="/subcategories/{{ $subcategory->id }}/edit">Edit</a></td>
                        <td><a href="/subcategories/{{ $subcategory->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>             
@endsection