<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativeWorkImage extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'desc', 'creativeWork_id'];

    /**
     * Get the user that owns the CreativeWorkImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CreativeWorkImage(): BelongsTo
    {
        return $this->belongsTo(CreativeWork::class, 'creativeWork_id', 'id');
    }
}
