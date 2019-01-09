@foreach($comments as $comment)
<div class="display-comment">
    <div class="form-group comment-{{ $comment->id }} reply-comment-{{ $comment->user->name}}">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}" class="comment-reply-form">
            <div class="comment-reply">
                {{ csrf_field() }}
                <!-- <input type="text" name="comment_body" class="form-control" /> -->
                <textarea name="comment_body" rows="5" class="form-control" placeholder="Reply comment"></textarea>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                <div class="form-group">
                    @if(Auth::check())
                    <input type="submit" class="btn btn-primary btn btn-primary btn-comment-reply" value="Reply" />
                    @else
                    <a href="{{ route('user-login') }}" id="" class="btn btn-primary btn btn-primary btn-comment-reply" value="Reply" />Reply</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    @include('_comment_replies', ['comments' => $comment->replies])
</div>
@endforeach