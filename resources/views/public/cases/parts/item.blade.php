<div data-id="{{ $case->id }}" class="list-item">
    <a href="{{ route('view.case', ['id' => $case->id]) }}">
        <h2>{!! $case->number != '' ? $case->number : '<small class="text-muted">название не указано</small>' !!}</h2>
        <h3>{!! $case->name != '' ? $case->name : '' !!}</h3>
        <p>Номер описи: <span>{{ $case->inventory->number }}</span></p>
        <p>Кол-во листов: <span>{{ $case->pages->count() }}</span></p>
    </a>
</div>
