@extends('layouts.app')


@section('content')


<h1>Modifier samples: {{ $sample->titre }}</h1> @if ($errors->any()) <div class="alert alert-danger">

    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>

    </div>

    @endif

    <form method="post" action="{{ url('sample/'. $sample->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">
        <label for="titre">@lang('messages.titre')</label>
        <input type="text" class="form-control" id="titre" placeholder="Entrez un titre" name="titre" value="{{
        $sample->titre }}">
        </div>
        <div class="form-group mb-3">
            <label for="category">@lang('messages.categorie')</label>
            <select class="form-control" id="category" name="category" value="{{ $sample->category }}">
            <option value="guitar">Guitar</option>
            <option value="bass">Bass</option>
            <option value="piano">Piano</option>
            <option value="synth">Synth</option>
            </select>
            </div>
            <div class="form-group mb-3">
                <label for="cle_musical">@lang('messages.clemusical')</label>
                <input type="text" class="form-control" id="cle_musical" placeholder="Entrez la clé musicale"
                    name="cle_musical" value="{{ $sample->cle_musical }}">
            </div>
            <div class="form-group mb-3">
                <label for="bpm">@lang('messages.bpm')</label>
                <input type="number" class="form-control" id="bpm" placeholder="Entrez le bpm : " name="bpm"
                    value="{{ $sample->bpm }}">
            </div>
            <div class="form-group mb-3">
                <label for="genre">Genre :</label>
                <select class="form-control" id="genre" name="genre" value="{{ $sample->genre }}">
                    <option value="rap">Rap</option>
                    <option value="ukdrill">Uk Drill</option>
                    <option value="hip-hop">Hip-Hop</option>
                    <option value="pop">Pop</option>
                    <option value="lofi">Lofi</option>
                    <option value="jazz">Jazz</option>
                </select>
            </div>

            <div class="form-group mb-3">

                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    class="form-control">{{ $sample->description }}</textarea>

            </div>

            <div class="form-group mb-3">
                <input type="file" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">@lang('messages.save')</button>

    </form>

    @endsection