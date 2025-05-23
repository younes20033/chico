<?php
// Si vous voulez sauvegarder les candidatures en base de données
// Créez cette migration avec: php artisan make:migration create_partners_table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('activity');
            $table->string('contact_name');
            $table->string('position');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->string('website')->nullable();
            $table->enum('partnership_type', ['transporteur', 'agent_commercial', 'logistique', 'distributeur', 'autre']);
            $table->text('message');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('contacted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};