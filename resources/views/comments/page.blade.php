<div id="comments">
    <div class="close_comments">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
        </svg>
    </div>
    <div class="inner-comment">
        <div class="image">
            <img src="{{ asset('loaded/' . $page->fund_id . '/' . $page->inventory_id . '/' . $page->case_id . '/max/' . $page->getUrl()) }}?{{ time() }}" />
        </div>
        <div class="comment_list">
            <div class="add_comment mb-3">
                @include('comments.parts.form_add', ['type' => 'page', 'id' => $page->id])
            </div>
            <div class="comment_list--items">
                <h3>
                    Комментарии
                    @if ($page->comments->count())
                        <sup>{{ $page->comments->count() }}</sup>
                    @endif
                </h3>
                <div id="list_comments">
                    @include('comments.parts.items', ['comments' => $page->comments])
                </div>
            </div>
        </div>
    </div>
</div>