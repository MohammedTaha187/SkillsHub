<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email',255);
            $table->string('phone',30);
            $table->string('facebook',255)->nullable();
            $table->string('X',255)->nullable();
            $table->string('instrgram',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
