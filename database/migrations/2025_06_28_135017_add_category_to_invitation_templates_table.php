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
        Schema::table('invitation_templates', function (Blueprint $table) {
            // Tambahkan kolom kategori setelah kolom 'description'
            // Nilai default-nya adalah 'Lainnya'
            $table->string('category')->default('Lainnya')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitation_templates', function (Blueprint $table) {
            // Hapus kolom jika migrasi di-rollback
            $table->dropColumn('category');
        });
    }
};
