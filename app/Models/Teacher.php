<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'speciality', 'email', 'phone_1', 'phone_2'];

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
