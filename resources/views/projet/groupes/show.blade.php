@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Afficher un groupes</title>
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

    <h3> Détails de goupe</h3>

    <div class="card p-4 shadow">
        <p><strong>Logo:</strong>
            @if($groupe->logo && file_exists(public_path('storage/logos/'.$groupe->logo)))
    <img src="{{ asset('storage/logos/'.$groupe->logo) }}" width="70">
@else
    <img src="{{ asset('storage/logos/default.jpg') }}" width="70">
@endif</p>
        <p><strong>	Nom :</strong> {{ $groupe->nom }}</p>
        <p><strong>	La date de creation :</strong> {{ $groupe->date_creation }}</p>
        <p><strong>Description :</strong> {{ $groupe->description }}</p>
<<<<<<< HEAD
        <p><strong>Acteurs :</strong>
            @forelse($groupe->acteurs as $acteur)
                <span class="badge bg-primary">{{ $acteur->nom_prenom }}</span>
            @empty
                <span class="text-danger">Aucun membre</span>
            @endforelse
        </p>
=======
>>>>>>> cb156e4 (Premier commit)
        <a href="{{ route('groupes.index') }}" class="btn btn-secondary mt-3">⬅️ Retour</a>
    </div>
</div>
</body>
</html>
@endsection