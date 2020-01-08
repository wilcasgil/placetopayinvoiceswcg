@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Product or Service {{ $subcategory->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('subcategories.index') }}">Back</a>
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
            <form action="{{ route('subcategories.update', $subcategory) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Type a product or service name" value="{{ $subcategory->name }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Type a price" value="{{ $subcategory->price }}" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Type a stock" value="{{ $subcategory->stock }}" required>
                </div>
                <div class="form-group">
                    <label for="room">Category Type</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">{{ $subcategory->category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
