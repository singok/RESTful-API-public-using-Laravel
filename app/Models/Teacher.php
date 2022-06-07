<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'gender',
        'age',
        'email',
        'phone',
        'address'
    ];
}
