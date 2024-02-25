<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','place_of_birth', 'date_of_birth', 'gender', 'nationality', 'address','city', 'email', 'phone', 'previous_school', 'blood_group', 'medical_history', 'allergies', 'comments'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'registration')->withPivot('schoolyear', 'observations');
    }

    public function classroomfees(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'tuition')->withPivot('id', 'schoolyear', 'observations');
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'notes')->withPivot('average', 'appreciation');
    }

    public function Tutors(): HasMany
    {
        return $this->hasMany(Tutor::class);
    }
    
}