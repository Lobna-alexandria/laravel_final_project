<?php

namespace App\Models;

use App\Models\CreativeWork;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Creative_Work_image extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'desc', 'crwork_id'];
    protected $table = 'creative__work_images';
    /**
     * Get the user that owns the Creative_Work_image
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function CreativeWorks(): BelongsTo
    {
        return $this->BelongsTo(CreativeWork::class, 'crwork_id', 'id');
    }
}