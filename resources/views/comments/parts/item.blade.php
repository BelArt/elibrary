<div class="comment_list--items--item">
    <div class="comment_list--items--item-data">
        {{ date('d.m.Y в H:i', strtotime($comment->created_at)) }}
    </div>
    <div class="comment_list--items--item-text">
        {!! $comment->comment !!}
    </div>
</div>