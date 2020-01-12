@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit payment type {{ $paymentType->id }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('paymentTypes.index') }}">Back</a>
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
            
            <form action="{{ route('paymentTypes.update', $paymentType) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $paymentType->name }}" required>
                </div>
                <div class="form-group">
                    <label for="active">Payment type</label>
                    <select class="form-control" name="active" id="active" required>
                        <option value="" selected>{{ $paymentType->active }}</option>
                        <option value="1" @if (old('active') == 1) @endif>True</option>
                        <option value="0" @if (old('active') == 0) @endif>False</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
