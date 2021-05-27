@extends('public.app.index', ['title' => 'Дела'])

@section('content')
    <div class='fund'>
        @each('public.funds.parts.item', $funds, 'fund')
    </div>
@endsection

@push('styles')
    <style>
        body {
            color: #a0a0a0;
            font-family: "Lora",serif;
            background: #fdfbe6 url(/images/ornam-left.gif) repeat-y left 112px;
        }
        .fund {padding: 40px 10px 10px 120px;}
        .fund_item {height: 150px;float: left;margin: 0px 15px;max-width: 250px;}
        .fund_item a {display: flex;flex-flow: column;justify-content: center;
            text-align: center;transition: 0.3s all;padding: 10px 15px;
            height: 150px;border: 1px solid #ddd;border-radius: 10px;}
        .fund_item a:hover {box-shadow: 20px 10px 30px rgba(0,0,0,.4);}
        .fund_item-number {font-size: 2rem;}
    </style>
@endpush