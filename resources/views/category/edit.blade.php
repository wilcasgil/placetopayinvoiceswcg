@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>{{ __('Edit Category') }} {{ __($category->id) }}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="/categories">{{ __('Back') }}</a>
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

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Type a category name') }}" value="{{ __($category->name) }}" required>
            </div>
            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection