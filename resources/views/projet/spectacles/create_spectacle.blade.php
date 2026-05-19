@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un spectacle</title>
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
    <h3>Ajouter un spectacle</h3>

    <div class="form-card">

    <form class='form-control' action="{{ route('spectacles.store') }}" method="POST">
        @csrf
        <label for="titre">Titre:</label>
        <input type="text" name="titre" class="form-control mb-2" placeholder="Titre">

        <label for="type">Type:</label>
        <input type="text" name="type" class="form-control mb-2" placeholder="Type">

        
       <div class="mb-3">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
       </div>
       

        <label for="langue">Langue:</label>
        <input type="text" name="langue" class="form-control mb-2" placeholder="Langue">
       
        <label for="public_cible">Public cible:</label>
        <input type="text" name="public_cible" class="form-control mb-2" placeholder="Public cible">
        
        <label for="nb_representations">Nombre de représentations:</label>
        <input type="text" name="nb_representations" class="form-control mb-2" placeholder="Nombre de représentations">

        <label for="equipements">Équipements:</label>
        <input type="text" name="equipements" class="form-control mb-2" placeholder="Équipements">

        <label for="duree">Durée:</label>
        <input type="text" name="duree" class="form-control mb-2" placeholder="Durée">

<label for="caractere">Caractère :</label>
<select name="caractere" class="form-control mb-2">
    <option value="">Choisir le caractère</option>
    <option value="Gratuit">Gratuit</option>
    <option value="Chapeau">Chapeau</option>
    <option value="Contribution libre">Contribution libre</option>
    <option value="Payant">Payant</option>
</select>

<label for="classification">Classification :</label>
<select name="classification" class="form-control mb-2">
    <option value="">Choisir la classification</option>
    <option value="Traditionnel">Traditionnel</option>
    <option value="Contemporain">Contemporain</option>
    <option value="Fusion">Fusion</option>
</select>
        <button class="btn btn-success">💾 Enregistrer</button>
    </form>
</div>
</div>
</body>
</html>
@endsection