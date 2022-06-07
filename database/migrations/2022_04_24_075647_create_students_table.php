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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('image')->default('frontend_assets/uploads/NO-IMAGE-AVAILABLE.jpg');
            $table->unsignedBigInteger('phone_number')->unique();
            $table->string('username');
            $table->unsignedBigInteger('roll_no');
            $table->unsignedBigInteger('cnic_number'); 
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('students');
    }
};
