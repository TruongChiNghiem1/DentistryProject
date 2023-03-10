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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('avatar')->nullable();
            $table->string('doctor_name');
            $table->tinyInteger('gender')->default(1)->comment('1:Male 2:Femail');
            $table->date('doctor_birth');
            $table->string('doctor_phone');
            $table->string('ethnic');
            $table->tinyInteger('position')->default(3)->comment('1:Ts 2:Ths 3:Bs');
            $table->string('email');
            $table->string('address');
            $table->string('worktime');
            $table->tinyInteger('hidden')->default(2)->nullable()->comment('1: Ẩn - 2: Hiện');
            $table->text('decription')->nullable();
            
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
        Schema::dropIfExists('doctors');
    }
};
