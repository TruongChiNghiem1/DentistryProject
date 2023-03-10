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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('phone')->nullable();;
            $table->tinyInteger('gender')->default(1)->nullable();
            $table->tinyInteger('online')->default(2)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('level')->default(3)->comment('1: Admin - 2: Điều dưỡng - 3: Bệnh nhân - 4: Super Admin');
            $table->string('avatar')->nullable();
            
            $table->string('ethnic')->nullable();
            $table->string('address')->nullable();
            $table->date('birth')->nullable();
            $table->string('job')->nullable();
            $table->string('job_adress')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relative_phone')->nullable();
            $table->string('relative_address')->nullable();

            $table->unsignedBigInteger('patients_id')->nullable();
            $table->foreign('patients_id')->references('id')->on('patients');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
