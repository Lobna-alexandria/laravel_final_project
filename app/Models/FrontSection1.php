<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class FrontSection1 extends Model
{
    use HasFactory;
    protected $fillable = ['main_title', 'title', 'btn_name', 'image', 'video'];
}