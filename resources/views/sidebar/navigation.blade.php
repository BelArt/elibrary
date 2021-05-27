<div class="d-flex flex-column flex-md-row align-items-center px-md-4 mb-3 bg-dark border-bottom box-shadow">
    <h5 class="my-0 text-white mr-md-auto font-weight-normal header_title">Архив документов</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white topLnk {{ $lnk_fund ?? null }}" href="{{ route('fund.show') }}">Фонды</a>
        <a class="p-2 text-white topLnk {{ $lnk_inv ?? null }}" href="{{ route('inventory.index') }}">Описи</a>
        <a class="p-2 text-white topLnk {{ $lnk_case ?? null }}" href="{{ route('case.index') }}">Дела</a>
        <a class="p-2 text-white topLnk {{ $lnk_page ?? null }}" href="{{ route('page.index') }}">Страницы</a>
    </nav>
    {{--<a class="btn btn-outline-primary" href="#">Вход</a>--}}
</div>