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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['Landed', 'Highrise']);

            $table->unsignedInteger('bedrooms');
            $table->unsignedInteger('bathrooms');
            $table->unsignedInteger('carparks');
            $table->unsignedInteger('area');

            $table->string('address')->nullable();
            $table->string('city', 100);
            $table->string('zip_code', 100);
            $table->string('state');
            $table->string('country');

            $table->unsignedInteger('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
