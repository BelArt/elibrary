<div class="fund-form">
    <h3>Редактирование данных дела</h3>
    <form action="{{ route('case.save') }}" method="post" id="edit_case">
        @csrf
        <input type="hidden" name="id" value="{{ $case->id }}" />
        <div class="fund-form-row">
            <label>Фонд</label>
            <div><strong>{{ $case->fund->number }}</strong>
                {!! $case->fund->name
                ? '<small>(' . $case->fund->name . ')</small>'
                : '' !!}
            </div>
        </div>
        <div class="fund-form-row">
            <label>Опись</label>
            <div><strong>{{ $case->inventory->number }}</strong>
                {!! $case->inventory->name
                ? '<small>(' . $case->inventory->name . ')</small>'
                : '' !!}
            </div>
        </div>
        <div class="fund-form-row">
            <label>Номер дела</label>
            <div><strong>{{ $case->number }}</strong></div>
        </div>
        <div class="fund-form-row">
            <label>Название дела</label>
            <input type="text" name="name" value="{{ $case->name }}" class="form-control" />
        </div>
        <div class="fund-form-row">
            <label>Описание дела</label>
            <textarea name="description" id="desc_case" class="form-control">{{ $case->description }}</textarea>
        </div>
        <div class="fund-form-row">
            <button class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Сохранить
            </button>
        </div>
    </form>
</div>