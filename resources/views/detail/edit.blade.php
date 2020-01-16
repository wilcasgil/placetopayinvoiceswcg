@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Item: {{ $detail->id }} {{ $detail->subcategory->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="{{ route('invoices.index') }}">Back</a>
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

            <form action="{{ route('details.update', $detail) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="subcategory_id">Item</label>
                                <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                                    <option value="">Please select a item</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Type a quantity" value="{{ $detail->quantity }}" required>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Type a price" value="{{ $detail->price }}" required>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="invoice_id">Invoice</label>
                                <select class="form-control" id="invoice_id" name="invoice_id" required>
                                    <option value="">Please select a invoice</option>
                                        @foreach ($invoices as $invoice)
                                            <option value="{{ $invoice->id }}">{{ $invoice->id }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
