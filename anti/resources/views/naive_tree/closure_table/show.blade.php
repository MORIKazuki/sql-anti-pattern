@extends('layouts.app')

@section('content')
    @if (!$article)
        <h3 class="text-center mt-5">該当する記事が存在しません。</h3>
    @else
        <div class="article">
            <h1 class="title">{{ $article->title }}</h1>

            <div class="content">
                {!! $article->body !!}
            </div>
            <div class="comment-wrapper">
                <div class="comment-list">
                    @foreach($comments as $key => $comment)
                        <li class="comment parent-comment-li" id="comment-{{$comment->id}}"
                            data-comment-id="{{$comment->id}}">
                            @include('naive_tree.closure_table.comments.comment', [$comment, $article])
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')

@endsection
