<div class="filter marTop30 marBot30">
    <div class="form-group">
        <input type="hidden" id="inputPage" class="form-control" placeholder="Начните вводить название документа" />
    </div>

    <div class="input-group">
        <span class="input-group-text">фонд</span>
        <select class="form-select" id="select_fund_page">
            <option value="0">Все фонды</option>
            @if ($funds->count())
                @foreach ($funds as $fund)
                    <option value="{{ $fund->id }}">
                        {{ $fund->number }}
                        {{ $fund->name ? ' - ' . $fund->name : null }}
                    </option>
                @endforeach
            @endif
        </select>
        <span class="input-group-text">опись</span>
        <select class="form-select" id="select_inventory_page">
            <option value="0">Все описи</option>
            @if ($inventories->count())
                @foreach ($inventories as $inventory)
                    <option value="{{ $inventory->id }}">
                        {{ $inventory->number }}
                        {{ $inventory->name ? ' - ' . $inventory->name : null }}
                    </option>
                @endforeach
            @endif
        </select>
        <span class="input-group-text">дело</span>
        <select class="form-select" id="select_case_page">
            <option value="0">Все фонды</option>
            @if ($cases->count())
                @foreach ($cases as $case)
                    <option value="{{ $case->id }}">
                        {{ $case->number }}
                        {{ $case->name ? ' - ' . $case->name : null }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
</div>