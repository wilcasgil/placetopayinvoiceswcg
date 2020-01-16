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
                                <select class="form-control" id="client_id" name="client_id" required autofocus="">
                                    <option value="">Please select a client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        
<<<<<<< HEAD

                        <div class="col-xs-2">
=======
                        <!-- <div class="col-xs-2">
>>>>>>> cdff8d741cbabb8526a64350d8b778afbb316444
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Type a last name" value="" required>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Type a email" value="{{ old('email') }}" required>
                            </div>
                        </div> -->
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

        </div>
    </div>

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
