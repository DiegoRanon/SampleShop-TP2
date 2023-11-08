@extends('layouts.app')

@section('content')

<h1>@lang("messages.titreajoutersample")</h1> @if ($errors->any()) <div class="alert alert-danger"> <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif


    <form action="{{ url('sample') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="titre">@lang('messages.titre')</label>
        <input type="text" class="form-control" id="titre" placeholder="Entrez un titre" name="titre">
    </div>
    <div class="form-group mb-3">
        <label for="category">@lang('messages.categorie')</label>
        <select class="form-control" id="category" name="category">
        <option value="guitar">@lang('messages.guitar')</option>
        <option value="bass">@lang('messages.bass')</option>
        <option value="piano">@lang('messages.piano')</option>
        <option value="synth">@lang('messages.synth')</option>
</select>

    </div>
    <div class="form-group mb-3">
        <label for="cle_musical">@lang('messages.clemusical')</label>
        <input type="text" class="form-control" id="cle_musical" placeholder="Entrez la clé musicale" name="cle_musical">
    </div>
    <div class="form-group mb-3">
        <label for="bpm">@lang('messages.bpm')</label>
        <input type="number" class="form-control" id="bpm" placeholder="Entrez le bpm : " name="bpm">
    </div>
    <div class="form-group mb-3">
        <label for="genre">Genre :</label>
        <select class="form-control" id="genre" name="genre">
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
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>

        </div>

    <div class="form-group mb-3">

    <div class="form-group mb-3">
        <label for="photo">@lang('messages.photo_label')</label>
        <input type="file" name="photo">
        <br>
        <label for="music">@lang('messages.music_label')</label>
    <input type="file" name="music">
</div>


    <button type="submit" class="btn btn-primary">@lang('messages.save')</button>
</form>

@endsection