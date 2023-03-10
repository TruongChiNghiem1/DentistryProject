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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->timestamp('booking_date')->nullable();

            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->foreign('doctors_id')->references('id')->on('doctors')->nullable();

            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('id')->on('services');

            $table->tinyInteger('booking_type')->comment('1: Lịch khám - 2: Lịch tư vấn');

            $table->unsignedBigInteger('calendar_id')->nullable()->comment('0: Lịch bác sĩ');
            $table->foreign('calendar_id')->references('id')->on('calendars')->nullable();

            // $table->integer('hours')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('success')->nullable()->comment('1: Thành công - 2: Không thành công');
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
        Schema::dropIfExists('booking');
    }
};
