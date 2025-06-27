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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique(); // Untuk URL publik, mis: kitanikah.com/budi-dan-ani
            $table->string('template_title');
            $table->enum('status', ['draft', 'published'])->default('draft');
            
            // Info Mempelai
            $table->string('groom_nickname')->nullable();
            $table->string('bride_nickname')->nullable();

            // Detail Acara Akad
            $table->date('akad_date')->nullable();
            $table->time('akad_time')->nullable();
            $table->text('akad_location')->nullable();

            // Detail Acara Resepsi
            $table->date('resepsi_date')->nullable();
            $table->time('resepsi_time')->nullable();
            $table->text('resepsi_location')->nullable();

            // Galeri & Cerita
            $table->text('love_story')->nullable();
            $table->string('main_photo_path')->nullable(); // Path ke file gambar utama
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
