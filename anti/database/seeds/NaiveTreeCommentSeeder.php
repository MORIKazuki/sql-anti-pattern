<?php

use Illuminate\Database\Seeder;

class NaiveTreeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            $parentComment = factory(\App\Models\NaiveTreeComment::class)->create();

            $childComment = factory(\App\Models\NaiveTreeComment::class)->make();
            $childComment->parent_comment_id = $parentComment->id;
            $childComment->reply_to_comment_id = $parentComment->id;
            $childComment->save();

            $replyComment = factory(\App\Models\NaiveTreeComment::class)->make();
            $replyComment->parent_comment_id = $parentComment->id;
            $replyComment->reply_to_comment_id = $childComment->id;
            $replyComment->save();

            $replyComment2 = factory(\App\Models\NaiveTreeComment::class)->make();
            $replyComment2->parent_comment_id = $parentComment->id;
            $replyComment2->reply_to_comment_id = $childComment->id;
            $replyComment2->save();

        }
    }
}
