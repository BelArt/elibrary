@if ($funds->count())
    <div class="marTop30">
        <div class="fund-item">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                @each('fund.partials.item', $funds, 'fund')
            </table>
        </div>
    </div>
@else
    <div class="no-results">Нет данных для отображения</div>
@endif