<div class="comment-detail-wrapper">
    <div class="user-icon-wrapper">
        {{ Html::image(asset('assets/images/no-user-icon.png'), null, [
            'class' => 'icon',
        ]) }}
    </div>
    <div class="comment-detail" data-article-id="{{ $article->id }}">
        <div class="profile-tooltip-triangle"></div>
        <div>
            <span class="name user-profile">{{ $childComment->user->name }}</span>
        </div>
        <div class='arrow_box'>
            <span class="body">{!! $childComment->body !!}</span>
            <span
                class="post-date">('{{ \Carbon\Carbon::parse($childComment->created_at)->format('y.m.d H:i') }})</span>
        </div>
        <div class="reactions">
            <a href="#comment-{{ $childComment->reply_to_comment_id }}" class="re"><span
                    class="material-symbols-outlined">reply_all</span> 返信元</a>
            <span class="reply-button reply-to-child">返信する</span>
        </div>
    </div>
</div>
