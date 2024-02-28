<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'relationship', 'email', 'phone_1', 'phone_2'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
