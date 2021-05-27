<div class='header'>
    <h1>{{ $fund->name }}</h1>
</div>
<h2><a href="{{ route('cases.index', ['id' => $fund->id]) }}">{{ $fund->number }}</a> </h2>
<p><a href="#" target="_blank"><i class="fas fa-file-pdf"></i> Опись фонда</a> (6,1 Мбайт)</p>
