<?php

namespace App\Usecase\NaiveTree\ClosureTable;

use App\Http\Payload;
use App\Models\Article;
use App\Models\Comment;

class ShowUsecase
{
    public function run(): Payload
    {
        $articleId = 1;
        $start = microtime(true);;
        $article = Article::find($articleId);
        $comments = $this->getRootComment($articleId);
        $end = microtime(true);;
        \Log::info('処理時間 = ' . ($end - $start) . '秒');

        return (new Payload())->setStatus(Payload::FOUND)->setOutput(['article' => $article, 'comments' => $comments]);
    }

    private function getRootComment(int $articleId)
    {
        // 最上位階層となる親コメントを取得する
        $comments = Comment::with(['user'])
            ->leftJoin('comment_tree_paths', 'comment_tree_paths.ancestor', 'comments.id')
            ->where('comment_tree_paths.path_length', 1)
            ->where('article_id', $articleId)
            ->orderBy('comments.created_at')
            ->orderBy('comments.id')
            ->get();

        foreach ($comments as $comment) {
            // 親コメントのすべての子孫コメントを取得する
            $comment->childComments = $comment->getChildTree();
            foreach ($comment->childComments as $childComment) {
                // 子コメントから一階層親のコメントを取得する
                $childComment->parentComment = $childComment->getParentComment();
            }
        }

        return $comments;
    }
}
