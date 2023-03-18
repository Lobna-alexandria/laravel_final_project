<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAbout extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_title',
        'title',
        'desc',
        'image',
        'editor1',
        'about',
        'address',
        'mail',
        'mediaIcon',
        'image1',
        'image2',
    ];
}