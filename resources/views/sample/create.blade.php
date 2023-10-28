@extends('layouts.app')

@section('content')

<h1>Ajouter un sample</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().split('T')[0];
    document.getElementById('current_date').value = formattedDate;
</script>

<form action="{{ url('sample') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="title">Titre:</label>
        <input type="text" class="form-control" id="title" placeholder="Entrez un titre" name="title">
    </div>
    <div class="form-group mb-3">
        <label for="compositeur">Nom du compositeur:</label>
        <input type="text" class="form-control" id="compositeur" placeholder="Entrez un le nom du compositeur" name="compositeur">
    </div>
    <div class="form-group mb-3">
        <label for="category">Categorie :</label>
        <select class="form-control" id="category" name="category">
            <option value="guitar">Guitar</option>
            <option value="bass">Bass</option>
            <option value="piano">Piano</option>
            <option value="synth">Synth</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="cle_musical">Cle Musical:</label>
        <input type="text" class="form-control" id="cle_musical" placeholder="Entrez la clé musicale" name="cle_musical">
    </div>
    <div class="form-group mb-3">
        <label for="number">Entrez le BPM :</label>
        <input type="number" class="form-control" id="number" placeholder="Entrez le bpm : " name="number">
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

    <input type="hidden" class="form-control" id="current_date" name="current_date">
    </div>

    <input type="file" name="photo">
    <button type="submit" class="btn btn-primary">Enregister</button>
</form>

@endsection
