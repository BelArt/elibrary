@if ($cases->count())
    @each('public.cases.parts.item', $cases, 'case')
@else
    <div class="no-cases">Нет дел для отображения</div>
@endif
