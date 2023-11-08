@extends('layouts.app')

@section('content')

<div class="header">
    <h1>Mon premier blog avec Laravel</h1>
</div>

<div class="row">
    <div class="col-lg-2">
        <a class="button btn-success" href="{{ url('sample/create') }}">Ajouter un sample</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container">
    <div class="row">
        @foreach ($samples as $index => $sample)
        <div class="col-md-4">
            <div class="card card-body">
                <a href="{{ url('sample/'. $sample->id) }}">
                    <h2>{{ $sample->titre }}</h2>
                </a>
                <p>Fait par : {{ $sample->compositeur }}</p>
                <p>Genre : {{ $sample->genre }}</p>
                <p>BPM : {{ $sample->bpm }}</p>
                <div></div>
                <a href="{{ url('sample/'. $sample->id) }}" class="en-savoir-plus">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
