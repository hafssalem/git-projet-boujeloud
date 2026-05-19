@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un Acteur</title>
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
    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container mt-4">
        
    <h3> ➕ Ajouter un acteur</h3>
<div class="form-card">
    <form action="{{ route('acteurs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
<div class="mb-3">
<label for="photo" class="form-label">Photo</label>
<input type="file" class="form-control" name= "photo" id="photo"/>
</div>
        <div class="mb-3">
            <label>Nom complet</label>
            <input type="text" name="nom_prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control">
        </div>

        <div class="mb-3">
            <label>CIN</label>
            <input type="text" name="cin_passport" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nationalité</label>
            <input type="text" name="nationalite" class="form-control">
        </div>

        <div class="mb-3">
            <label>Adresse</label>
           <input type="text" name="adresse" class="form-control">
        </div>

        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

         <div class="mb-3">
            <label>date d'inscription</label>
            <input type="date" name="date_inscription" class="form-control">
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select name="statut" class="form-control">
                <option value="Actif">Actif</option>
                <option value="Suspendu">Suspendu</option>
                <option value="Archive">Archive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Enregistrer</button>
    </form>
    </div>
</div>
</body>
</html>
@endsection