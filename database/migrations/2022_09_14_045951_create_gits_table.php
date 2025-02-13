<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->string( 'name' );
            $table->string( 'amount' )->nullable();
            $table->integer( 'uses' )->unsigned( )->nullable( );
            $table->integer( 'max_uses' )->unsigned()->nullable( );
            //user
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->text( 'description' )->nullable( );
            $table->string( 'cart_number' )->nullable( );
            $table->timestamp( 'starts_at');
            $table->timestamp( 'expires_at');
            $table->tinyInteger( 'status' )->nullable();
            // You know what this is...
            $table->timestamps( );
            // We like to horde data.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gifts', function (Blueprint $table) {
            Schema::dropIfExists('gifts');
        });
    }
}
