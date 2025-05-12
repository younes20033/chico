// database/migrations/[timestamp]_create_devis_tables.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('telephone');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code')->nullable();
            $table->string('ice')->nullable();
            $table->string('reference');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('pdf_path')->nullable();
            $table->text('special_requirements')->nullable();
            $table->decimal('total_ht', 10, 2);
            $table->decimal('total_tva', 10, 2);
            $table->decimal('total_ttc', 10, 2);
            $table->decimal('tva_rate', 5, 2);
            $table->timestamps();
        });

        Schema::create('devis_transports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devis_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('destination');
            $table->string('vehicle_type');
            $table->decimal('price', 10, 2);
            $table->string('reference')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devis_transports');
        Schema::dropIfExists('devis');
    }
};