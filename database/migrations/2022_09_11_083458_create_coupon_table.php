<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->string( 'code' )->nullable( );
            $table->string( 'name' );
            $table->text( 'description' )->nullable( );
            $table->integer( 'uses' )->unsigned( )->nullable( );
            $table->integer( 'max_uses' )->unsigned()->nullable( );
            $table->tinyInteger( 'type' )->unsigned( );
            $table->tinyInteger( 'status' )->nullable();
            $table->text( 'discount_amount' )->nullable();
            $table->text( 'percent_amount' )->nullable();
            $table->timestamp( 'starts_at');
            $table->timestamp( 'expires_at');
            // You know what this is...
            $table->timestamps( );
            // We like to horde data.
            $table->softDeletes( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn([
                'code' , 'name' , 'description' , 'uses' , 'max_uses' , 'discount_amount' , 'type' , 'started_at' , 'expired_at' , 'status'
            ]);
        });
    }
}
