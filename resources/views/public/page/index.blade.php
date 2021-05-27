@extends('public.app.index', ['title' => 'Дела'])

@section('content')
    <div class='wrapper'>
        @include('public.page.parts.fund', ['fund' => $case->fund])

        <div class="pagename">
            <div>{{ $case->number }}</div>
            <div>{{ $case->name }}</div>
        </div>

        <div class="tabs">
            <ul>
                <li>Изображения</li>
                <li>Описание</li>
            </ul>
            <div>
                <div>
                    <div class="view">
                        <iframe src="{{ route('showcase', ['id' => $case->id]) }}" frameborder="0" width="100%" height="100%"></iframe>
                    </div>
                </div>
                <div class="description-text">
                    {!! $case->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $(".tabs").lightTabs();
        });
    </script>
@endpush

@push('styles')
<style type="text/css">
    body {
        color: #a0a0a0;
        font-family: "Lora",serif;
        background: #fdfbe6 url(/images/ornam-left.gif) repeat-y left 112px;
    }

    .header {
        text-align: left;
    }

    .header h1 {
        color: #7f3500;
        font-size: 1.4rem;
        font-weight:500;
    }

    .wrapper {
        width: calc(100% - 100px);
        height: 90vh;
        margin: 0 0 0 100px;
    }

    .wrapper h2 {
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2;
        color: #212529;
    }

    .wrapper p {
        margin: 0;
    }

    .wrapper a {
        color: #7f3500;
    }

    .navigation {
        width: 100%;
        display: flex;
    }

    .list { width: 75%; }

    .list-item {
        background: #fff;
        padding: 10px;
        margin: 10px 0;
    }

    .list-item a {
        color: #7f3500;
        text-decoration: none;
    }

    .list-item a:hover {
        text-decoration: underline;
    }

    .list-item p {
        margin: 5px 0;
    }

    .list-item span {
        color: #020101;
    }

    .search {
        margin: 10px 0 0 50px;
        background: #fff;
        padding: 0 30px;
        width: 20%;
    }

    .search input {
        margin: 5px 0 10px 0;
        padding: 5px;
        width: 100%;
    }

    .search label {
        color: #212529;
    }

    .search h1 {
        color: #7f3500;
        font-weight: 500;
    }

    .desc > div {
        border: solid 1px;
        border-radius: 5px;
        padding: 0 20px;
        margin-left: 20px;
    }

    .desc > div H1 {
        font-size: 130%;
    }

    .view {
        display: block;
        position: absolute;
        width: calc(100% - 150px);
        height: calc(100% - 180px);
        background: #cecece;
    }

    .view-act {
        cursor: pointer;
    }

    .close-act {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 50px;
        cursor: pointer;
    }


    .tabs{
        display:inline-block;
    }
    .tabs > div{
        padding-top:10px;
    }
    .tabs ul{
        margin:0px;
        padding:0px;
    }
    .tabs ul:after{
        content:"";
        display:block;
        clear:both;
        height:5px;
        background:#e3daa0;
    }
    .tabs ul li{
        margin:0px;
        padding:0px;
        cursor:pointer;
        display:block;
        float:left;
        padding:5px 10px;
        background:#fdfbe6;
        color:#7f3500;
    }
    .tabs ul li.active, .tabs ul li.active:hover{
        background:#e3daa0;
        color:#7f3500;
    }
    .tabs ul li:hover{
        background:#e3daa0;
    }

    .description-text {
        color: #000;
        width: 1000px;
    }

    .pagename {
        padding: 15px 0;display: flex;flex-direction: column;
    }
</style>
@endpush