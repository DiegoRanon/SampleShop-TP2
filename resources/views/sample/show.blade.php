@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $samples->titre }}</h1>
            <p class="lead">{{ $samples->content }}</p>

            <div class="buttons">
                <a href="{{ url('sample/'. $sample->id .'/edit') }}" class="btn btn-info">Modifier</a>
                <form action="{{ url('sample/'. $sample->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection