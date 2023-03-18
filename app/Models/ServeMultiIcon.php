<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServeMultiIcon extends Model
{
    use HasFactory;
    protected $fillable = ['linkname', 'image'];
}