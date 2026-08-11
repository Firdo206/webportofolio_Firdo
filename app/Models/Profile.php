<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'description',
        'photo',
        'cv_path',
        'github_url',
        'instagram_url',
        'whatsapp_number',
        'email',
    ];
}