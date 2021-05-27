<figure
        class="gallery__figure"
        itemprop="associatedMedia"
        itemscope=""
        itemtype="http://schema.org/ImageObject">
    <img
            src="{{ $page->page_number < 3 ? asset('loaded/' . $page->fund_id . '/' . $page->inventory_id . '/' . $page->case_id . '/thumb/' . $page->getUrl()) . '?' . time() : '' }}"
            alt="Страница {{ $page->page_number }}"
            class="gallery__image i-lazy loaded"
            data-src="{{ asset('loaded/' . $page->fund_id . '/' . $page->inventory_id . '/' . $page->case_id . '/max/' . $page->getUrl()) }}?{{ time() }}" itemprop="thumbnail"></figure>