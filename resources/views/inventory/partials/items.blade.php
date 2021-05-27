@if ($inventories->count())
    <div class="marTop30">
        <div class="fund-item">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Фонд</th>
                    <th></th>
                </tr>
                @each('inventory.partials.item', $inventories, 'inventory')
            </table>
        </div>
    </div>
@else
    <div class="no-results">Нет данных для отображения</div>
@endif