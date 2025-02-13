<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePattributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pattributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('cctv_group')->nullable();
            $table->string('cctv_type')->nullable();
            $table->string('cctv_sensor')->nullable();
            $table->string('cctv_power_source')->nullable();
            $table->string('cctv_outdoor_use')->nullable();
            $table->string('cctv_compression')->nullable();
            $table->string('cctv_resolution')->nullable();
            $table->string('lenz')->nullable();
            $table->string('viewing_angle')->nullable();
            $table->string('range_pan_horizontal_movement')->nullable();
            $table->string('rang_tilt_vertical_movement')->nullable();
            $table->string('cctv_ai_programming')->nullable();
            $table->string('cctv_temperature_of_performance')->nullable();
            $table->string('max_frame')->nullable();
            $table->string('range_dynamics')->nullable();
            $table->string('record_day_night')->nullable();
            $table->string('cctv_resolution_ability')->nullable();
            $table->string('min_colored_light')->nullable();
            $table->string('night_vision')->nullable();
            $table->string('optical_magnification')->nullable();
            $table->string('cctv_voice')->nullable();
            $table->string('cctv_memory_card_slot')->nullable();
            $table->string('cctv_resistance_to_vandalism')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('pattributes');
    }
}
