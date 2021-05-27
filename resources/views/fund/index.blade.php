@extends('app.index', ['title' => 'Фонды', 'lnk_fund' => ' active'])

@section('content')
    <div class="container" id="funds">
        @include('fund.partials.filter')
        <div id="fundsItems">

        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/summernote-lite.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/summernote-lite.min.js') }}"></script>
@endpush