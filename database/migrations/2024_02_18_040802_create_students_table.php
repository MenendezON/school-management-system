<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

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
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('city');
            $table->string('country');
            $table->foreignIdFor(User::class);
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone');
            $table->enum('gender', ['Homme', 'Femme'])->default('Homme');
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
