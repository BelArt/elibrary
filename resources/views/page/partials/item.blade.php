        <tr>
            <td>{{ $page->page_number }}</td>
            <td>
                <img class="comments"
                     src="{{ asset('loaded/' . $page->fund_id . '/' . $page->inventory_id . '/' . $page->case_id . '/thumb/' . $page->getUrl()) }}?{{ time() }}"
                     data-id="{{ $page->id }}" data-type="page" />
            </td>
            <td>{{ $page->fund->number }}
                {{ $page->fund->name
                ? '<small>(' . $page->fund->name . ')</small>'
                : '' }}
            </td>
            <td>{{ $page->inventory->number }}
                {!! $page->inventory->name
                ? '<small>(' . $page->inventory->name . ')</small>'
                : '' !!}
            </td>
            <td>{{ $page->case->number }}
                {!! $page->case->name
                ? '<small>(' . $page->case->name . ')</small>'
                : '' !!}
            </td>
            <td>
                <a href="javascript:;" data-toggle="tooltip" class="comments" data-type="page" data-id="{{ $page->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    <span class="badge rounded-pill bg-info text-white">{{ $page->comments->count() }}</span>
                </a>
            </td>
        </tr>