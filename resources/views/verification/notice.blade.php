@extends('layouts.app')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Ajouter sample</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Un lien de vérification a été envoyé à votre email.
            </div>
        @endif

        Vous ne pouvez pas ajouter un sample tant que vous n'avez pas validé votre email, s'il vous plait regarder votre email afin de le valider. Si vous n'avez pas reçu d'email appuyer ici,
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-link p-0">
                click here to request another
            </button>.
        </form>
    </div>
@endsection