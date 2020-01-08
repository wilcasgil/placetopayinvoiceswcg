@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Product or Service: {{ $subcategory->name }}</h2>
        </div>
    </div>        
    <br>
    
    <div class="table-responsive-lg">
        <h3>Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Id</th>
                <th>Price</th>                    
                <th>Stock</th>
                <th>Category</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>
            <tbody>                
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->price }}</td>
                    <td>{{ $subcategory->stock }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>{{ $subcategory->created_at }}</td>
                    <td>{{ $subcategory->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('subcategories.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('subcategories.edit', $subcategory) }}">Edit</a>

            <a class="btn btn-secondary" href="/subcategories/{{ $subcategory->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
