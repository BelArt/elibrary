@extends('app.index', ['title' => 'Документы', 'lnk_page' => ' active'])

@section('content')
    <div class="container" id="page">
        @include('page.partials.filter')
        <div id="pageItems">

        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/summernote-lite.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/summernote-lite.min.js') }}"></script>
@endpush