// Migration pour ajouter le champ role à la table users
// Créer un fichier: database/migrations/2025_05_09_120000_add_role_to_users_table.php

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
            $table->string('role')->default('client')->after('email'); // 'client' ou 'admin'
            $table->string('company_name')->nullable()->after('role');
            $table->string('telephone')->nullable()->after('company_name');
            $table->string('address')->nullable()->after('telephone');
            $table->string('city')->nullable()->after('address');
            $table->string('postal_code')->nullable()->after('city');
            $table->string('ice')->nullable()->after('postal_code'); // Identifiant Commun de l'Entreprise
            $table->string('profile_image')->nullable()->after('ice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'company_name',
                'telephone',
                'address',
                'city',
                'postal_code',
                'ice',
                'profile_image'
            ]);
        });
    }
};