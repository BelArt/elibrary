@extends('app.index', ['title' => 'Фонды', 'lnk_inv' => ' active'])

@section('content')
    <div class="container" id="inventory">
        @include('inventory.partials.filter')
        <div id="inventoryItems">

        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/summernote-lite.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/summernote-lite.min.js') }}"></script>
@endpush