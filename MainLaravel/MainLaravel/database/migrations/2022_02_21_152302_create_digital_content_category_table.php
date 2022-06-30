<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalContentCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digital_content_category', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('category_id') -> nullable();
            $table -> unsignedBigInteger('digital_content_id') -> nullable();
            $table->timestamps();

            $table
            -> foreign('category_id')
            -> references('id')
            -> on('categories')
            -> cascadeOnUpdate()
            ->nullOnDelete();

            $table
            -> foreign('digital_content_id')
            -> references('id')
            -> on('digital_contents')
            -> cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('digital_content_category');
    }
}
