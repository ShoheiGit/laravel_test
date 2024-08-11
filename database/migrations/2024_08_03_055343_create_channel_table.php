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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->string('channel_name')->nullable();
            $table->string('discription')->nullable();
            $table->string('image');
            $table->integer('member_count')->default(0);
            $table->timestamps();
        });

        Schema::create('channel_users', function(Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('channel_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
        Schema::dropIfExists('channel_users');
    }
};
