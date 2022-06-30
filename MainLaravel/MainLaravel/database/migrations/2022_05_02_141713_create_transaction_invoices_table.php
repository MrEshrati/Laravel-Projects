<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_invoices', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('transaction_id') -> nullable();
            $table -> unsignedBigInteger('digital_content_id') -> nullable();
            $table -> decimal('price' , 10 , 2) -> default(0);
            $table -> decimal('discount' , 10 , 2) -> default(0);
            $table -> integer('count') -> default(0);
            $table->timestamps();

            $table
            -> foreign('transaction_id')
            -> references('id')
            -> on('transactions')
            -> cascadeOnUpdate()
            -> nullOnDelete();

            $table
            -> foreign('digital_content_id')
            -> references('id')
            -> on('digital_contents')
            -> cascadeOnUpdate()
            -> nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_invoices');
    }
}
