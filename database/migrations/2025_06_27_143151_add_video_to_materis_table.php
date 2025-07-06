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
        Schema::table('materis', function (Blueprint $table) {
            $table->string('media_path')->nullable()->after('deskripsi'); // bisa video atau gambar
            $table->string('media_type')->nullable()->after('media_path'); // 'image' atau 'video'
            $table->string('video_thumbnail')->nullable()->after('media_type'); // thumbnail untuk video
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('materis', function (Blueprint $table) {
            $table->string('media_path')->nullable()->after('deskripsi'); // bisa video atau gambar
            $table->string('media_type')->nullable()->after('media_path'); // 'image' atau 'video'
            $table->string('video_thumbnail')->nullable()->after('media_type'); // thumbnail untuk video
        });
    }
};
