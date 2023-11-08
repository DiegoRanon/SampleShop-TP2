@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $sample->titre }}</h1>
            <h4><strong>Créateur : </strong>{{ $sample->compositeur }}</h4>

            <p><strong>Description : </strong>{{ $sample->description }}</p>

            <div class="card card-body">
            <h4><strong>BPM : </strong>{{ $sample->bpm }}</h4>
            <p><strong>Categorie : </strong>{{ $sample->category }}</p>
            <p><strong>Clé musical : </strong>{{ $sample->cle_musical}}</p>
            <p><strong>Genre : </strong>{{ $sample->genre}}</p>
            </div>

            <div class="buttons">
                <a href="{{ url('sample/'. $sample->id .'/edit') }}" class="btn btn-info">Modifier</a>
                <form action="{{ url('sample/'. $sample->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </div>

            <div class="buttons">
                <a href="{{ url('review/show/'. $sample->id) }}" class="btn btn-info">Reviews</a>
            </div>
        </div>
    </div>
</div>
</div>


@endsection