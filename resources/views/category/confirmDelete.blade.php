@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>{{ __('Delete Category') }} {{ __($category->name) }}</h1>
    </div>
</div>
<br>

<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ route('categories.index') }}">{{ __('Back') }}</a>

        <a class="btn btn-secondary" href="{{ route('categories.edit', $category) }}">{{ __('Edit') }}</a>
    </div>
</div>
<br>

<div class="table-responsive-lg">
    <h3>{{ __('Details') }}</h3>
    <table class="table table-hover table-sm">
        <thead>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            <th class="text-right"></th>
        </thead>

        <tbody>
            <tr>
                <td>{{ __($category->id) }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
            </tr>
        </tbody>
    </table>
</div>
<br>

<div class="row">
    <div class="col">
        <form action="/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">{{ __('Delete') }}</button>
        </form>
    </div>
</div>
@endsection