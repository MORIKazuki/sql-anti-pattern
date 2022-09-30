<?php

use App\Models\CommentTreePath;
use Illuminate\Database\Seeder;

class ClosureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            $parentComment = factory(\App\Models\Comment::class)->create();
            CommentTreePath::create([
                'ancestor' => $parentComment->id,
                'descendant' => $parentComment->id,
                'path_length' => 1,
            ]);
            $childComment = factory(\App\Models\Comment::class)->create();
            CommentTreePath::create([
                'ancestor' => $childComment->id,
                'descendant' => $childComment->id,
                'path_length' => 2,
            ]);
            CommentTreePath::create([
                'ancestor' => $parentComment->id,
                'descendant' => $childComment->id,
                'path_length' => 2,
            ]);
            $replyComment = factory(\App\Models\Comment::class)->create();
            CommentTreePath::create([
                'ancestor' => $replyComment->id,
                'descendant' => $replyComment->id,
                'path_length' => 3,
            ]);
            CommentTreePath::create([
                'ancestor' => $childComment->id,
                'descendant' => $replyComment->id,
                'path_length' => 3,
            ]);
            CommentTreePath::create([
                'ancestor' => $parentComment->id,
                'descendant' => $replyComment->id,
                'path_length' => 3,
            ]);
            $replyComment2 = factory(\App\Models\Comment::class)->create();
            CommentTreePath::create([
                'ancestor' => $replyComment2->id,
                'descendant' => $replyComment2->id,
                'path_length' => 3,
            ]);
            CommentTreePath::create([
                'ancestor' => $childComment->id,
                'descendant' => $replyComment2->id,
                'path_length' => 3,
            ]);
            CommentTreePath::create([
                'ancestor' => $parentComment->id,
                'descendant' => $replyComment2->id,
                'path_length' => 3,
            ]);
        }
    }
}
