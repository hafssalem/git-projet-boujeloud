@extends('dashboard')

@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'un acteur</title>
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
        
<<<<<<< HEAD
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
=======
>>>>>>> cb156e4 (Premier commit)
    <h3> ✏️ Modifier un acteur</h3>

    <div class="form-card">
        <form action="{{ route('acteurs.update', $acteur->id_acteur) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- PHOTO -->
            <div class="mb-3">
                <label>Photo</label><br>
@if($acteur->photo && file_exists(public_path('storage/photos/'.$acteur->photo)))
    <img src="{{ asset('storage/photos/'.$acteur->photo) }}" width="70">
@else
    <img src="{{ asset('storage/photos/default.jpg') }}" width="70">
@endif                
 <input type="file" name="photo" class="form-control">
            </div>

            <!-- NOM -->
            <div class="mb-3">
                <label>Nom complet</label>
                <input type="text" name="nom_prenom" class="form-control"
                       value="{{ $acteur->nom_prenom }}">
            </div>

            <!-- DATE -->
            <div class="mb-3">
                <label>Date de naissance</label>
                <input type="date" name="date_naissance" class="form-control"
                       value="{{ $acteur->date_naissance }}">
            </div>

            <!-- CIN -->
            <div class="mb-3">
                <label>CIN</label>
                <input type="text" name="cin_passport" class="form-control"
                       value="{{ $acteur->cin_passport }}">
            </div>

            <!-- NATIONALITE -->
            <div class="mb-3">
                <label>Nationalité</label>
                <input type="text" name="nationalite" class="form-control"
                       value="{{ $acteur->nationalite }}">
            </div>

            <!-- ADRESSE -->
            <div class="mb-3">
                <label>Adresse</label>
                <input type="text" name="adresse" class="form-control"
                       value="{{ $acteur->adresse }}">
            </div>

            <!-- TELEPHONE -->
            <div class="mb-3">
                <label>Téléphone</label>
                <input type="text" name="telephone" class="form-control"
                       value="{{ $acteur->telephone }}">
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $acteur->email }}">
            </div>

            <!-- DATE INSCRIPTION -->
            <div class="mb-3">
                <label>Date d'inscription</label>
                <input type="date" name="date_inscription" class="form-control"
                       value="{{ $acteur->date_inscription }}">
            </div>

            <!-- STATUT -->
            <div class="mb-3">
                <label>Statut</label>
                <select name="statut" class="form-control">
                    <option value="Actif" {{ $acteur->statut == 'Actif' ? 'selected' : '' }}>Actif</option>
                    <option value="Suspendu" {{ $acteur->statut == 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                    <option value="Archive" {{ $acteur->statut == 'Archive' ? 'selected' : '' }}>Archive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">💾 Modifier</button>
        </form>
    </div>
</div>
</body>
</html>
@endsection