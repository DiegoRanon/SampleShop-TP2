@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>À propos de mon application</h1>

            <h2>Nom : Diego Ranon</h2>
            <br></br>
            <h2>420-5H6 MO Applications Web transactionnelles, Automne 2023, Collège Montmorency</h2>
            <br></br>
            <h2>Étapes d'utilisation typiques</h2>
            <p>
                <strong>Étape 1:</strong> Pour vérifier le bon fonctionnement de l'application, connectez-vous à votre compte.
                <br>
                <strong>Étape 2:</strong> Accédez à la page d'accueil, consultez les derniers samples et reviews (selon les samples musicales).
                <br>
                <strong>Étape 3:</strong> Créez un nouveau sample en utilisant le formulaire de création qui n'est seulement accessible si vous êtes connecté.
                <br>
                <strong>Étape 4:</strong> Modifier et supprimer votre sample créée.
                <br>
                <strong>Étape 5:</strong> Ajoutez des reviews aux samples existants.
                <br>
                <strong>Résultat attendu:</strong> Les étapes ci-dessus devraient permettre de naviguer dans l'application, créer des samples et interagir avec d'autres utilisateurs.
                <br>
            </p>

            <h2>Diagramme de la base de données</h2>
            <img src="{{ asset('images/BaseDeDonneesLaravel.png') }}" alt="Diagramme de la base de données">

            <h2>Liens inspirants</h2>
            <p>Voici le site web qui m'a inspiré pour ce projet.</p>
            <ul>
                <li><a href="https://www.looperman.com/" target="_blank">Site Web 1</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
