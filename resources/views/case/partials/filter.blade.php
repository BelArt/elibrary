<div class="filter marTop30 marBot30">
    <div class="input-group">
        <input type="text" id="inputCase" class="form-control" placeholder="Начните вводить название дела" />
        <span class="input-group-text">фонд</span>
        <select class="form-select" id="select_fund_id_case">
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
        <span class="input-group-text">оись</span>
        <select class="form-select" id="select_inventory_case">
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
    </div>
</div>