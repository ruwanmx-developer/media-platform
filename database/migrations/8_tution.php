<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutions', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('time_to');
            $table->string('time_from');
            $table->string('day');
            $table->string('location');
            $table->string('district');
            $table->string('user_id');
            $table->string('state');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutions');
    }
};
