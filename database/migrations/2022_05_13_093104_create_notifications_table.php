<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('upload_prescription_id');
            $table->string('title');
            $table->string('body');
            $table->smallInteger('is_read');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');
            $table->foreign('upload_prescription_id')->references('id')->on('upload_prescriptions');
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
        Schema::dropIfExists('notifications');
    }
};
