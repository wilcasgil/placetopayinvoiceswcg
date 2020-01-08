@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Category: {{ $category->name }}</h2>
        </div>
    </div>        
    <br>
    <div class="table-responsive-lg">
        <h3>Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>
            @foreach($category->subcategories as $subcategory)
            <tbody>                
                <tr>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->price }}</td>
                    <td>{{ $subcategory->stock }}</td>
                    <td>{{ $subcategory->created_at }}</td>
                    <td>{{ $subcategory->updated_at }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('categories.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('categories.edit', $category) }}">Edit</a>

            <a class="btn btn-secondary" href="/categories/{{ $category->id }}/confirmDelete">Delete</a>
        </div>
    </div>
@endsection
