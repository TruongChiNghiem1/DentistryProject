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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('doctors_name')->nullable();
            $table->datetime('medical_examination_day')->nullable();
            $table->string('reason')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('medical_summary')->nullable();
            $table->string('services_name')->nullable();
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
        Schema::dropIfExists('history');
    }
};
