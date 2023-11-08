@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
    <div class="col-md-12">
        <h1>{{ $sample->titre }}</h1>
        @foreach ($reviews as $index => $review)
        <div class="card card-body">
            <h1>Par : {{ $review->identifiant }}</h1>
            <h3>Nombre étoiles : {{ $review->nb_etoiles }}</h3>
            <p>Commentaire : {{ $review->commentaire }}</p>
            <div class="buttons">
                <a href="{{ url('review/'. $review->id .'/edit') }}" class="btn btn-info">Modifier</a>
                <form action="{{ url('sample/'. $review->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </div>
        </div>
    @endforeach
    <div class="buttons">
        <a href="{{ url('review/create/'. $sample->id) }}" class="btn btn-info">Ajouter review</a>
    </div>
</div>
</div>
</div>
</div>
</div>


@endsection