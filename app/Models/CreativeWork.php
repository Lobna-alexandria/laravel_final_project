<?php

namespace App\Models;

use image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreativeWork extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc'];
    /**
     * Get all of the comments for the CreativeWork
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CreativeWorkimages()
    {
        return $this->hasMany(Creative_Work_image::class, 'crwork_id', 'id');
    }
}
