@php
    $childComments = $comment->childComments;
    $count = count($childComments);
@endphp
<div class="comment-detail-wrapper">
    <div class="comment-node-tree" @if($count === 0) style="display:none;" @endif></div>
    <div class="user-icon-wrapper">
        {{ Html::image(asset('assets/images/no-user-icon.png'), null, [
            'class' => 'icon',
        ]) }}
    </div>
    <div class="comment-detail" data-article-id="{{ $article->id }}">
        <div>
            <span class="name user-profile">{{ $comment->user->name }}</span>
        </div>
        <div class='arrow_box'>
            <span class="body">{!! $comment->body !!}</span></span>
            <span class="post-date">('{{ \Carbon\Carbon::parse($comment->created_at)->format('y.m.d H:i') }})</span>
        </div>
        <div class="reactions">
            <span class="reply-button reply-to-parent">返信する</span>
        </div>
    </div>
</div>

@if($count > 0)
    <div class="comment child-comment" data-parent-comment-id="{{$comment->id}}">
        <div class="child-comment-list">
            <div class="comment-node-tree-curve"></div>
            <div class="child-comment-node-tree"></div>
            <ul class="child-comment-ul">
                @foreach($childComments as $childCommentKey => $childComment)
                    <li class="comment"
                        id="comment-{{$childComment->id}}" data-comment-id="{{$childComment->id}}">
                        @include('naive_tree.naive_tree.comments.childComment', [$childComment, $article])
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
