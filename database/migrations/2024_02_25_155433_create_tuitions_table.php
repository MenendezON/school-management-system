<?php

use App\Models\Classroom;
use App\Models\Student;
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
        Schema::create('tuitions', function (Blueprint $table) {
            $table->foreignIdFor(Classroom::class); 
            $table->foreignIdFor(Student::class); 
            $table->string('academic_year');  
            $table->string('label');
            $table->bigInteger('amount');
            $table->timestamps();

            $table->primary(['classroom_id', 'student_id', 'academic_year', 'label']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuitions');
    }
};
