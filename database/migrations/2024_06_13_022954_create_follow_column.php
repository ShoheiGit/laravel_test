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
            $table->integer('follow')->comment('フォロー数')->after('profile_image')->default(0);
            $table->integer('follower')->comment('フォロワー数')->after('follow')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'follow', 'follower')) {
                $table->dropColumn('follow');
                $table->dropColumn('follower');
            }
        });
    }
};
