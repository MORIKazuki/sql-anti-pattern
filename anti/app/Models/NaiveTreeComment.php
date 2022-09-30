<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NaiveTreeComment extends Model
{
    protected $fillable = [
        'user_id',
        'newsletter_id',
        'article_id',
        'reply_to_comment_id',
        'parent_comment_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function childComments(): HasMany
    {
        return $this->hasMany(NaiveTreeComment::class, 'parent_comment_id', 'id')
            ->orderBy('created_at');
    }

    public function parentComment(): BelongsTo
    {
        return $this->belongsTo(NaiveTreeComment::class, 'parent_comment_id');
    }

    public function replyToComment(): BelongsTo
    {
        return $this->belongsTo(NaiveTreeComment::class, 'reply_to_comment_id');
    }
}
