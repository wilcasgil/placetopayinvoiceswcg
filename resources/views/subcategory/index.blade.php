@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Products and Services</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('subcategories.create') }}">Create a new product or service</a>            
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
            @foreach($subcategories as $subcategory)
                <tr>
                    <td><a href="{{ route('subcategories.show', $subcategory) }}">{{ $subcategory->name }}</a></td>                    
                    <td><a href="{{ route('subcategories.edit', $subcategory) }}">Edit</a></td>
                    <td><a href="/subcategories/{{ $subcategory->id }}/confirmDelete">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-3 d-flex justify-content-center">
        {{ $subcategories->links() }}
    </div>
@endsection
