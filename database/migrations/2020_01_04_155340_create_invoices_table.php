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
            $table->dateTimeTz('due_date')->nullable();
            $table->dateTimeTz('receipt_date');
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('invoice_state_id');
            //$table->unsignedInteger('invoice_state_id');
            $table->timestamps();

            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('invoice_state_id')->references('id')->on('invoice_states')->onDelete('cascade');
            //$table->foreign('invoice_state_id')->references('id')->on('invoice_states');
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
