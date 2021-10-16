<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('productType');
            $table->unsignedBigInteger('CategoryID')->index()->nullable();
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('cascade')->onUpdate('No Action');
            $table->unsignedBigInteger('SubCategoryID')->index()->nullable();
            $table->foreign('SubCategoryID')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('products');
    }
}
