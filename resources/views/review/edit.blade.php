@extends('layouts.app')


@section('content')


<h1>Modifier review: {{ $review->titre }}</h1> @if ($errors->any()) <div class="alert alert-danger">

    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>

    </div>

    @endif

    <form method="post" action="{{ url('review/'. $review->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

        <label for="commentaire">Commentaire:</label>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" class="form-control">{{ $review->commentaire
        }}</textarea>

        </div>

        <div class="form-group mb-3">
            <label for="nb_etoiles">Nombre d'étoiles :</label>
            <select class="form-control" id="nb_etoiles" name="nb_etoiles" value="{{ $review->nb_etoiles }}">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

    @endsection