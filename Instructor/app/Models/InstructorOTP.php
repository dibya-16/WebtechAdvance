<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorOTP extends Model
{
    use HasFactory;
    protected $table = 'instructor_otps';
    public $timestamps = false;
}
