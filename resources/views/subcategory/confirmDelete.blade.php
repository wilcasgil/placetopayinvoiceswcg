@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Product or Service: {{ $subcategory->name }}</h1>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('subcategories.index') }}">Back</a>

            <a class="btn btn-secondary" href="{{ route('subcategories.edit', $subcategory) }}">Edit</a>
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
                <th class="text-right"></th>
            </thead>
            <tbody>                
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->price }}</td>
                    <td>{{ $subcategory->stock }}</td>
                    <td>{{ $subcategory->category->name }}</td>                    
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <div class="row">
        <div class="col">
            <form action="/subcategories/{{ $subcategory->id }}" method="POST">
                @csrf
                @method('delete')                
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
