@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New Item</h1>
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

            <form action="{{ route('details.store') }}" method="POST">
                @csrf
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
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Type a quantity" value="{{ old('quantity') }}" required>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Type a price" value="{{ old('price') }}" required>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="subtotal">Subtotal:</label>
                            <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Type a subtotal" value="{{ old('subtotal') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="iva">Iva:</label>
                            <input type="text" class="form-control" id="iva" name="iva" placeholder="Type a iva" value="{{ old('iva') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="total">Total:</label>
                            <input type="text" class="form-control" id="total" name="total" placeholder="Type a total" value="{{ old('total') }}" required>
                        </div> -->                        
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>

                <!-- <div class="col-xs-1">
                    <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div> -->
            </form>
        </div>
    </div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:40px;"></th>
                <th>Product</th>
                <th style="width:100px;">Quantity</th>
                <th style="width:100px;">Unit Price</th>
                <th style="width:100px;" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- <td>
                    <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
                </td> -->
                <th style="width:40px;"></th>
                <td>Subcategori name</td>
                <td class="text-right">0</td>
                <td class="text-right">$ 000.00</td>
                <td class="text-right">$ 000.00</td>
            </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ {iva.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">${subTotal.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tfoot>
    </table>

    <!-- <button if={detail.length > 0 && client_id > 0} onclick={__save} class="btn btn-default btn-lg btn-block">
        Guardar
    </button> -->

    <!-- <script>
    $(document).ready(function(){
        $("#client_id").change(function(){
        var client = $(this).val();
        $.get('dataByClient/'+client, function(data){
    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
            console.log(data);
            var lastName_select = '<input value="">'
                for (var i=0; i<data.length;i++)
                lastName_select+='<input value="'+data[i].id+''+data[i].last_name+'">';

                $("#last_name").html(lastName_select);

        });
        });
    });
    </script> -->
@endsection
