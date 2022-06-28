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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assign_course_id');
            $table->foreign('assign_course_id')->references('id')->on('assign_class_courses')->onDelete('cascade');
            $table->unsignedBigInteger('lecture');
            $table->unsignedBigInteger('present');
            $table->unsignedBigInteger('absent');
            $table->string('attendance_date');
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
        Schema::dropIfExists('attendances');
    }
};
