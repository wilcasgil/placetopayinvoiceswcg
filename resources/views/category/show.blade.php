@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Product or Service: {{ $category->name }}</h2>
        </div>
    </div>        
    <br>
    <div class="table-responsive-lg">
        <h3>Details</h3>
        <table class="table table-hover table-sm">
            <thead>
                <th>Id</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th class="text-right"></th>
            </thead>
            <tbody>                
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </tbody>
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
