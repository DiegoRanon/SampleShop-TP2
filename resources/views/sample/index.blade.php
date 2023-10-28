@extends('layouts.app')

@section('content')

<div class="header">
    <h1>Mon premier blog avec Laravel</h1>
</div>

<div class="row">
    <div class="col-lg-2">
        <a class="button" href="{{ url('sample/create') }}">Ajouter un sample</a>
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
            <div class="sample-card">
                <a href="{{ url('sample/'. $sample->id) }}">
                    <h2>{{ $sample->title }}</h2>
                </a>
                {{ $sample->content }}
                <a href="{{ url('sample/'. $sample->id) }}" class="en-savoir-plus">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
