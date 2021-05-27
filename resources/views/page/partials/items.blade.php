@if ($pages->count())
    <div class="marTop30">
        <div class="fund-item">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Номер</th>
                    <th>Изображение</th>
                    <th>Фонд</th>
                    <th>Опись</th>
                    <th>Дело</th>
                    <th></th>
                </tr>
                @each('page.partials.item', $pages, 'page')
            </table>
        </div>
    </div>
@else
    <div class="no-results">Нет данных для отображения</div>
@endif