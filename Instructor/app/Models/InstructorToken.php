<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorToken extends Model
{
    use HasFactory;
    protected $table = 'instructor_tokens';
    public $timestamps = false;
}
