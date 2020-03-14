<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifiedColumnInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_type_id')->nullable()->change();
            $table->unsignedBigInteger('client_id')->nullable()->change();
            $table->unsignedBigInteger('invoice_state_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
        });
    }
}
