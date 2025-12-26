<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','message','approved','user_id'];

    protected $casts = [
        'approved' => 'boolean',
    ];
}
