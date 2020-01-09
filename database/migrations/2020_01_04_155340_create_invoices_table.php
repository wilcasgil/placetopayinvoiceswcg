<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTimeTz('due_date');
            $table->dateTimeTz('receipt_date');
            $table->unsignedInteger('payment_type_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('invoice_state_id');
            $table->timestamps();

            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('invoice_state_id')->references('id')->on('invoice_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
