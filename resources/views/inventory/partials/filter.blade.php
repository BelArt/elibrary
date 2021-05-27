<div class="filter marTop30 marBot30">
    <div class="input-group">
        <input type="text" id="inputInventory" class="form-control" placeholder="Начните вводить название описи" />
        <span class="input-group-text">в</span>
        <select class="form-select" id="select_fund_id">
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
    </div>
</div>