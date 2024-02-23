<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','place_of_birth','user_id','date_of_birth','address','city', 'country', 'email', 'phone', 'gender'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class)->withPivot('id', 'schoolyear');
    }
    
}