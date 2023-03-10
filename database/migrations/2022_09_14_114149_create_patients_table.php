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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->date('medical_examination_day')->nullable();
            $table->string('reason')->nullable();

            $table->unsignedBigInteger('services_id')->nullable();
            $table->foreign('services_id')->references('id')->on('services')->nullable();

            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->foreign('doctors_id')->references('id')->on('doctors')->nullable();
            
            $table->string('diagnosis')->nullable();
            $table->string('medical_summary')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
