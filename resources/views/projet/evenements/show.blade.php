@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>afficher un événement</title>
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

    </style>
<h3>Détails de l'événement</h3>

<div class="card p-4 shadow">

    <p><strong>Date début :</strong> {{ $evenement->date_debut }}</p>
    <p><strong>Date fin :</strong> {{ $evenement->date_fin }}</p>
    <p><strong>Fréquence :</strong> {{ $evenement->frequence }}</p>
    <p><strong>Saison :</strong> {{ $evenement->saison }}</p>
    <p><strong>Statut :</strong> {{ $evenement->statut }}</p>
    <p><strong>Spectacle :</strong> {{ $evenement->spectacle->titre ?? '---' }}</p>

    <a href="{{ route('evenements.index') }}" class="btn btn-secondary">⬅ Retour</a>

</div>
</body>
</html>
@endsection