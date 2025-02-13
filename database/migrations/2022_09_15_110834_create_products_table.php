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
            $table->integer('vendor')->nullable();
            $table->string('img')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->text('body')->nullable();
            $table->text('description')->nullable();
            $table->text('technical_specifications')->nullable();
            $table->text('accessories')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->tinyInteger('without_price')->nullable();
            $table->string('price_from')->nullable();
            $table->string('price_to')->nullable();
            $table->string('number')->nullable();
            $table->string('weight')->nullable();
            $table->tinyText('status')->nullable();
            $table->tinyInteger('publish')->default(1);
            $table->integer('view')->default(0);
            $table->integer('shipment')->nullable();
            $table->tinyInteger('original')->default(1);
            $table->integer('order_count')->default(0);
            $table->integer('special')->default(0);
            $table->unsignedBigInteger('warranty_id')->nullable();
            $table->unsignedBigInteger('child_sub_category_id')->nullable();
            $table->foreign('child_sub_category_id')->references('id')->on('child_sub_categories')
                ->onDelete('cascade');
            $table->foreign('warranty_id')->references('id')->on('warranties')
                ->onDelete('cascade');
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
