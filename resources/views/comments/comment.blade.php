<div class="comment__card">
    <div class="comment__user">{{ $comment->user->name }}</div>
    <div class="comment__body">
        <div class="comment__text">{{ $comment->body }}</div>
        <div class="comment__date">{{ $comment->created_at}}</div>
    </div>
</div>
