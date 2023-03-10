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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('phone',12);
            $table->timestamp('day_time')->nullable();
            $table->string('doctor_name')->nullable();
            // $table->unsignedBigInteger('booking_id')->nullable()->comment('0: Lịch bác sĩ');
            // $table->foreign('booking_id')->references('id')->on('booking')->nullable();
            // $table->unsignedBigInteger('doctors_id')->nullable();
            // $table->foreign('doctors_id')->references('id')->on('doctors')->nullable();
            $table->tinyInteger('calendar_type')->comment('1: Lịch khám do bệnh nhân onl thêm 3: lịch khám do điều dưỡng thêm');
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
        Schema::dropIfExists('calendars');
    }
};
