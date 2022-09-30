<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'newsletter_id',
        'article_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getChildTree(): Collection
    {
        return Comment::with('user')
            ->whereIn('id', function ($query) {
            $query->select('descendant')
                ->from('comment_tree_paths')
                ->where('ancestor', $this->id)
                ->where('path_length', '>', 1)
                ->whereColumn('ancestor', '<>', 'descendant');
            })
            ->orderBy('created_at')
            ->get();
    }

    public function getParentComment(): ?Comment
    {
        return Comment::where('id', function($query) {
            $query->select('comment_tree_paths.ancestor')
                ->from('comment_tree_paths as comment_tree_paths')
                ->whereColumn('ancestor', '<>', 'descendant')
                ->whereExists(function($subQuery) {
                    $subQuery->selectRaw(1)
                        ->from('comment_tree_paths as sub_comment_tree_paths')
                        ->where('sub_comment_tree_paths.descendant', $this->id)
                        ->whereColumn('sub_comment_tree_paths.ancestor', '=', 'comment_tree_paths.descendant');
                })->groupBy('comment_tree_paths.ancestor')
                ->havingRaw('count(comment_tree_paths.descendant) = 1');
        })->first();
    }
}
