<?php

use App\Models\User;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('gender')->default('Masculin');
            $table->string('nationality')->default('Senegal') ;
            $table->string('address')->nullable();
            $table->string('city')->default('Dakar');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('previous_school');
            $table->string('blood_group');
            $table->text('medical_history');
            $table->text('allergies');
            $table->string('decision')->default('Régulière');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
