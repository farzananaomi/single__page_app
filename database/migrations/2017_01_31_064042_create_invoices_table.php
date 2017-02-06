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

            $table->increments('id');
            $table->integer('invoice_no')->unique();
            $table->date('invoice_date');
            $table->string('title');
            $table->date('due_date');
            $table->string('client');
            $table->string('client_address');
            $table->decimal('discount');
            $table->decimal('sub_total');
            $table->decimal('grand_total');
            $table->timestamps();
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
