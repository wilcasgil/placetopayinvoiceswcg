@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Category {{ $category->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/categories">Back</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/categories/{{ $category->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Type a country name" value="{{ old('name') }}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection