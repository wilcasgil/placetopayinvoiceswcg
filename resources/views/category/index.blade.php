@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>{{ __('Categories') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ route('categories.create') }}">{{ __('Create a new category') }}</a>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <table class="table table-hover table-sm table-dark">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Actions') }}</th>
                <!-- <th class="text-right"></th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td><a href="{{ route('categories.show', $category) }}">{{ __($category->name) }}</a></td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>
                    <a href="/categories/{{ $category->id }}/confirmDelete">{{ __('Delete') }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ route('subcategories.index') }}">{{ __('Subcategories') }}</a>
    </div>
</div>
@endsection