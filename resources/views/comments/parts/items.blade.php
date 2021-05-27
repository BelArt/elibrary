@if ($comments->count())
    @each('comments.parts.item', $comments, 'comment')
@else
    <div class="alert alert-info">К данной записи пока не оставлено комментариев</div>
@endif