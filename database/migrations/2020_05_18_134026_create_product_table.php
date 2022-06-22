<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('prodId');
            $table->string('name',100);
            $table->string('descShort',150);
            $table->string('descLong',2500);
            $table->text('image')->nullable();
            $table->float('price');
            $table->integer('discountPerc');
            $table->bigInteger('subCatId')->unsigned()->index();
            $table->foreign('subCatId')->references('subCatId')->on('subcategory');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
