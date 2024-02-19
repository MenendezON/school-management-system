<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','place_of_birth','user_id','date_of_birth','address','city','email', 'phone', 'gender'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}