@if ($cases->count())
    <div class="marTop30">
        <div class="fund-item">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Фонд</th>
                    <th>Опись</th>
                    <th></th>
                </tr>
                @each('case.partials.item', $cases, 'case')
            </table>
        </div>
    </div>
@else
    <div class="no-results">Нет данных для отображения</div>
@endif