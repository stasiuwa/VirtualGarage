<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('brand');
            $table->string('model');
            $table->string('version')->nullable();
            $table->string('generation')->nullable();
            $table->smallInteger('car_year');
            $table->string('drive')->nullable();
            $table->string('vin')->nullable();
            $table->string('engine');
            $table->smallInteger('engine_cap');
            $table->string('fuel')->nullable();
            $table->smallInteger('power');
            $table->smallInteger('torque');
            $table->bigInteger('mileage');
            $table->smallInteger('paint_code');
            $table->string('reg_plate')->nullable();
            $table->date('service_date');
            $table->string('insurance')->nullable();
            $table->date('insurance_pay_time');
            $table->double('insurance_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
