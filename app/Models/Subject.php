<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'label', 'value', 'teacher_id'];

    public function classroom(): BelongsTo{
        return $this->belongsTo(Classroom::class);
    }

    public function Students(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'notes')->withPivot('average', 'appreciation')->withTimestamps();
    }

    public function Teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    
}