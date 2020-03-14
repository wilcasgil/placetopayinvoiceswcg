@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Edit invoice state {{ $invoiceState->id }}</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-secondary" href="{{ route('invoiceStates.index') }}">Back</a>
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

        <form action="{{ route('invoiceStates.update', $invoiceState) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $invoiceState->name }}" required>
            </div>
            <div class="form-group">
                <label for="active">Invoice state</label>
                <select class="form-control" name="active" id="active" required>
                    <option value="" selected>{{ $invoiceState->active }}</option>
                    <option value="1" @if (old('active')==1) @endif>True</option>
                    <option value="0" @if (old('active')==0) @endif>False</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection