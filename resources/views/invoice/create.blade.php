@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New Invoice</h1>
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

            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="client_id">Client</label>
                                <select class="form-control" id="client_id" name="client_id" required>
                                    <option value="">Please select a client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Type a last name" value="{{ $client->last_name }}" required>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Type a email" value="{{ old('email') }}" required>
                            </div>
                        </div>                        
                    </div>
                </div>

                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="due_date">Due Date:</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" placeholder="Type a due date" value="{{ old('due_date') }}" required>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="receipt_date">Receipt Date:</label>
                                <input type="date" class="form-control" id="receipt_date" name="receipt_date" placeholder="Type a receipt date" value="{{ old('receipt_date') }}" required>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="payment_type_id">Payment Type</label>
                                <select class="form-control" id="payment_type_id" name="payment_type_id" required>
                                    <option value="">Please select a payment type</option>
                                        @foreach ($paymentTypes as $paymetType)
                                            <option value="{{ $paymetType->id }}">{{ $paymetType->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="invoice_state_id">Invoice State</label>
                                <select class="form-control" id="invoice_state_id" name="invoice_state_id" required>
                                    <option value="">Please select a invoice state</option>
                                        @foreach ($invoiceStates as $invoiceState)
                                            <option value="{{ $invoiceState->id }}">{{ $invoiceState->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>

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
                <td>{{ $subcategory->name }}</td>
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

    <script>
        var self = this;

        // Invoice details
        self.client_id = 0;
        self.detail = [];
        self.iva = 0;
        self.subTotal = 0;
        self.total = 0;

        self.on('mount', function(){
            __clientAutocomplete();
            __productAutocomplete();
        })

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __addProductToDetail() {
            self.detail.push({
                id: self.product_id,
                name: self.product.value,
                quantity: parseFloat(self.quantity.value),
                price: parseFloat(self.price),
                total: parseFloat(self.price * self.quantity.value)
            });

            self.product_id = 0;
            self.product.value = '';
            self.quantity.value = '';
            self.price = '';

            __calculate();
        }

        __save() {
            $.post(baseUrl('invoice/save'), {
                client_id: self.client_id,
                iva: self.iva,
                subTotal: self.subTotal,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) {
                    window.location.href = baseUrl('invoice');
                } else {
                    alert('Ocurrio un error');
                }
            }, 'json')
        }

        function __calculate() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
            self.subTotal = parseFloat(total / 1.18);
            self.iva = parseFloat(total - self.subTotal);
        }

        function __clientAutocomplete(){
            var client = $("#client"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findClient?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = client.getSelectedItemData();
                        self.client_id = e.id;
                        self.ruc = e.ruc;
                        self.address = e.address;

                        self.update();
                    }
                }
            };

            client.easyAutocomplete(options);
        }

        function __productAutocomplete(){
            var product = $("#product"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findProduct?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.product_id = e.id;
                        self.price = e.price;

                        self.update();
                    }
                }
            };

            product.easyAutocomplete(options);
        }
    </script>
@endsection
