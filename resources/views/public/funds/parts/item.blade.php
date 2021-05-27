<div class="fund_item">
    <a href="{{ route('cases.index', ['id' => $fund->id]) }}">
        <div class="fund_item-number">{{ $fund->number }}</div>
        <div class="fund_item-name">{{ $fund->name }}</div>
    </a>
</div>