@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h2>{{ __('Category') }} {{ __($category->name) }}</h2>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <h3>{{ __('Details') }}</h3>
    <table class="table table-hover table-sm">
        <thead>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Price') }}</th>
            <th>{{ __('Stock') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            <th class="text-right"></th>
        </thead>

        @foreach($category->subcategories as $subcategory)
        <tbody>
            <tr>
                <td><a href="{{ route('subcategories.show', $subcategory) }}">{{ __($subcategory->name) }}</a></td>
                <td>{{ __($subcategory->price) }}</td>
                <td>{{ __($subcategory->stock) }}</td>
                <td>{{ date('F d, Y', strtotime($subcategory->created_at)) }}</td>
                <td>{{ date('F d, Y', strtotime($subcategory->updated_at)) }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
<br>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ route('categories.index') }}">{{ __('Back') }}</a>

        <a class="btn btn-secondary" href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>

        <a class="btn btn-secondary" href="/categories/{{ $category->id }}/confirmDelete">{{ __('Delete') }}</a>
    </div>
</div>
@endsection