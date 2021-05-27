<div class='search search-case'>
    <h1>Поиск</h1>
    <form>
        <input type="hidden" name="fund_id" value="{{ $fund->id }}" />
        <div class="block-search">
            <label>Номер / название фонда</label><br/>
            <input type="text" class="name-number-fund" value="{{ $fund->number }}"><br/>
        </div>
        {{--
        <label>Разряд</label><br/>
        <input type="text"><br/>--}}
        <label>Год</label><br/>
        <input type="text" name="search-year" maxlength="4" class="search_by_year_inventory"><br/>
        <div>
            <label>Опись</label><br/>
            <input type="text" name="search-inventory" class="search_by_year_inventory">	<br/>
        </div>
        <div class="block-search">
            <label>ДЕЛО</label><br/>
            <input type="text" class="name-number-case"><br/>
        </div>
        {{--<input type="submit" value="Искать"><br/>--}}
    </form>
</div>