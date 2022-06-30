<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table -> integer('status') -> default(1);
            $table -> text('description') -> nullable();
            $table -> string('token');
            $table -> string('delivery_name');
            $table -> string('postal_code');
            $table -> text('address');
            $table -> decimal('price' , 10 , 2) -> default(0);
            $table -> decimal('discount' , 10 , 2) -> default(0);
            $table -> unsignedBigInteger('user_id') -> nullable();
            $table->timestamps();

            $table
            -> foreign('user_id')
            -> references('id')
            -> on('users')
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
        Schema::dropIfExists('transactions');
    }
}
