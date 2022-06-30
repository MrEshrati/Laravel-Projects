<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('digital_content_id') -> nullable();
            $table -> unsignedBigInteger('user_id') -> nullable();
            $table -> decimal('price' , 10 , 2) -> default(0);
            $table -> decimal('discount' , 10 , 2) -> default(0);
            $table -> integer('count') -> default(0);
            $table->timestamps();

            $table
            -> foreign('digital_content_id')
            -> references('id')
            -> on('digital_contents')
            -> cascadeOnUpdate()
            -> nullOnDelete();

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
        Schema::dropIfExists('cart_items');
    }
}
