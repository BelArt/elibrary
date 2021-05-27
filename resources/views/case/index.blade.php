@extends('app.index', ['title' => 'Фонды', 'lnk_case' => ' active'])

@section('content')
    <div class="container" id="case">
        @include('case.partials.filter')
        <div id="caseItems">

        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/summernote-lite.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/summernote-lite.min.js') }}"></script>
@endpush