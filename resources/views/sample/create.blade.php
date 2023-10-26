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

    <form action="{{ url('sample') }}" method="POST" enctype="multipart/form-data">
        @csrf
        

        <div class="form-group mb-3">
            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" placeholder="Entrez un titre" name="title">
        </div>


        <div class="form-group mb-3">

            <label for="content">Ajouter le contenu:</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            <input type = "file" name= "photo">
            <input type = "submit" name= "Envoyer">

        </div>

        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection