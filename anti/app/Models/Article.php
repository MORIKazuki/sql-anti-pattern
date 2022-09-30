<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title', 'body',
    ];

    protected $hidden = [];

    protected $casts = [];

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'comments');
    }
}
