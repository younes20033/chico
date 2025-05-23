<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('notifications', 'partner_id')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->foreignId('partner_id')->nullable()->after('devis_id');
                $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
            });
        }
        
        // Rendre devis_id nullable s'il ne l'est pas déjà
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreignId('devis_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['partner_id']);
            $table->dropColumn('partner_id');
        });
    }
};