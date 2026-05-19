@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Afficher un Acteur</title>
</head>
<body>
    <style>
    body {
    background: white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.container {
    max-width: 700px;
}
.card {
    background: #ffffff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-top: 5px solid rgb(61, 6, 6);
}
h3 {
    color: rgb(61, 6, 6);
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}
p strong {
    color: rgb(61, 6, 6);
}
.btn{
    background-color: rgb(61, 6, 6);
    color: white;
}
img{
    border-radius:5px;
}
    </style>
    <div class="container mt-4">

    <h3> Détails de l'acteur</h3>

    <div class="card p-4 shadow">
@if($acteur->photo && file_exists(public_path('storage/photos/'.$acteur->photo)))
    <img src="{{ asset('storage/photos/'.$acteur->photo) }}" width="70">
@else
    <img src="{{ asset('storage/photos/default.jpg') }}" width="70">
@endif         <p><strong>Nom Complet :</strong> {{ $acteur->nom_prenom }}</p>
        <p><strong>Date de naissance :</strong> {{ $acteur->date_naissance }}</p>
        <p><strong>CIN :</strong> {{ $acteur->cin_passport }}</p>
        <p><strong>Nationalité :</strong> {{ $acteur->nationalite }}</p>
        <p><strong>Téléphone :</strong> {{ $acteur->telephone }}</p>
        <p><strong>Email :</strong> {{ $acteur->email }}</p>
        <p><strong>Statut :</strong> {{ $acteur->statut }}</p>
        <a href="{{ route('acteurs.index') }}" class="btn btn-secondary mt-3">⬅️ Retour</a>
    </div>
</div>
</body>
</html>
@endsection