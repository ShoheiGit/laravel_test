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
        Schema::table('users', function (Blueprint $table) {
            $table->text('profile_text')->comment('プロフィール文章')->after('email')->nullable();
            $table->string('profile_image')->comment('プロフィール画像')->after('profile_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'profile_text')) {
                $table->dropColumn('profile_text');
                $table->dropColumn('profile_image');
            }
        });
    }

};
