@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Afficher une Activite</title>
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

    <h3> Détails de l'activité</h3>

    <div class="card p-4 shadow">
        <p><strong>Type de performance:</strong> {{ $activite->type_performance }}</p>
        <p><strong>	Mode d'exercice :</strong> {{ $activite->mode_exercice }}</p>
        <p><strong>	Fréquence :</strong> {{ $activite->frequence }}</p>
        <p><strong>Lieu :</strong> {{ $activite->lieu }}</p>
        <p><strong>Langue :</strong> {{ $activite->langue }}</p>
        <p><strong>Acteur :</strong> {{ $activite->acteur->nom_prenom }}</p>
        <a href="{{ route('activites.index') }}" class="btn btn-secondary mt-3">⬅️ Retour</a>
    </div>
</div>
</body>
</html>
@endsection