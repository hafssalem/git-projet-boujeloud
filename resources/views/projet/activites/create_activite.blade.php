@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une Activite</title>
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

.form-card {
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

label {
    font-weight: 600;
    color: #333;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #ccc;
    transition: 0.3s;
}

.form-control:focus {
    border-color: rgb(61, 6, 6);
    box-shadow: 0 0 5px rgba(61, 6, 6, 0.4);
}

.btn {
    border-radius: 10px;
    padding: 8px 15px;
    font-weight: 500;
}

.btn-success {
    background-color: rgb(61, 6, 6);
    border: none;
}

.btn-success:hover {
    background-color: rgb(90, 10, 10);
}

.btn-warning {
    background-color: #c9a100;
    border: none;
    color: white;
}

.btn-warning:hover {
    background-color: #a88700;
}

.btn-primary {
    background-color: rgb(61, 6, 6);
    border: none;
}

.btn-primary:hover {
    background-color: rgb(90, 10, 10);
}

.btn-danger {
    background-color: #8b0000;
    border: none;
}

.btn-danger:hover {
    background-color: #5a0000;
}

.card {
    border-radius: 15px;
    border-left: 5px solid rgb(61, 6, 6);
}

p strong {
    color: rgb(61, 6, 6);
}
    </style>

    <div class="container mt-4">
    <h3>Ajouter Activité</h3>

    <div class="form-card">

    <form class='form-control' action="{{ route('activites.store') }}" method="POST">
        @csrf
<label for="type_performance">Type de performance:</label>
        <input type="text" name="type_performance" class="form-control mb-2" placeholder="Type performance">
        <label for="mode_exercice">Mode d'exercice:</label>
        <select name="mode_exercice" class="form-control mb-2">
            <option>Individuel</option>
            <option>Groupe</option>
            <option>Association</option>
        </select>
        <label for="frequence">Fréquence:</label>
        <select name="frequence" class="form-control mb-2">
            <option>Quotidienne</option>
            <option>Hebdomadaire</option>
            <option>Occasionnelle</option>
            <option>Saisonniere</option>
        </select>
        <label for="lieu">Lieu:</label>
        <input type="text" name="lieu" class="form-control mb-2" placeholder="Lieu">
        <label for="langue">Langue:</label>
        <input type="text" name="langue" class="form-control mb-2" placeholder="Langue">
<label for="id_acteur">Acteur :</label>
<select name="id_acteur" class="form-control mb-2">
    <option value="">Choisir Acteur </option>

    @foreach($acteurs as $acteur)
        <option value="{{ $acteur->id_acteur }}">
            {{ $acteur->nom_prenom }}
        </option>
    @endforeach
</select>
<select name="id_groupe" class="form-control mb-2">
    <option value="">Choisir Un Groupe </option>

    @foreach($groupes as $groupe)
        <option value="{{ $groupe->id_groupe }}">
            {{ $groupe->nom }}
        </option>
    @endforeach
</select>
        <button class="btn btn-success">💾 Enregistrer</button>
    </form>
</div>
</div>
</body>
</html>
@endsection