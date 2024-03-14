<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'relationship', 'nationality', 'address', 'occupation', 'duty_station', 'email', 'phone'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
