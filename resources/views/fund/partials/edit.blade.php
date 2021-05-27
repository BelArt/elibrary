<div class="fund-form">
    <h3>Редактирование данных фонда</h3>
    <form action="" method="post" id="edit_fund">
        @csrf
        <input type="hidden" name="id" value="{{ $fund->id }}" />
        <div class="fund-form-row">
            <label>Номер фонда</label>
            <input type="text" name="number" value="{{ $fund->number }}" class="form-control" />
        </div>
        <div class="fund-form-row">
            <label>Название фонда</label>
            <input type="text" name="name" value="{{ $fund->name }}" class="form-control" />
        </div>
        <div class="fund-form-row">
            <label>Описнаие фонда</label>
            <textarea name="description" id="desc_fund" class="form-control">{{ $fund->description }}"</textarea>
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