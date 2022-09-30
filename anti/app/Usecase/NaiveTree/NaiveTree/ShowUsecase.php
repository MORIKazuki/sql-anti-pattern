<?php

namespace App\Usecase\NaiveTree\NaiveTree;

use App\Http\Payload;
use App\Models\Article;
use App\Models\NaiveTreeComment;

class ShowUsecase
{
    public function run(): Payload
    {
        $articleId = 1;
        $start = microtime(true);;
        $article = Article::find($articleId);
        $comments = $this->getComment($articleId);
        $end = microtime(true);;
        \Log::info('処理時間 = ' . ($end - $start) . '秒');

        return (new Payload())->setStatus(Payload::FOUND)->setOutput(['article' => $article, 'comments' => $comments]);
    }

    private function getComment(int $articleId)
    {
        return NaiveTreeComment::with(['user', 'childComments.user', 'replyToComment'])
        ->whereNull('parent_comment_id')
        ->where('article_id', $articleId)
        ->orderBy('naive_tree_comments.created_at')
        ->orderBy('naive_tree_comments.id')
        ->get();
    }
}
