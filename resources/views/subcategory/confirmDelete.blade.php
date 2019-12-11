@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Product or Service {{ $subcategory->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/subcategories">Back</a>
        </div>
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