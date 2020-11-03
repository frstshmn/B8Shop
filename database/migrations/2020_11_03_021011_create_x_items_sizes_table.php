<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXItemsSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('x_items_sizes', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('size_id');
            $table->timestamps();

            $table->foreign('size_id')->references('id')->on('item_sizes');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('x_items_sizes');
    }
}
