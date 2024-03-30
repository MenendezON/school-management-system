<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'capacity'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'registrations')->withPivot('academic_year', 'observations')->withTimestamps();
    }

    public function studentsfees(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'tuitions')->withPivot('id', 'academic_year', 'label', 'amount')->withTimestamps();
    }

    public function Subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
