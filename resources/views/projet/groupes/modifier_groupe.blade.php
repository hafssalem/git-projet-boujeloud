@extends('dashboard')

@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'un groupe</title>
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
        
    <h3> ✏️ Modifier un groupe</h3>

    <div class="form-card">
        <form action="{{ route('groupes.update', $groupe->id_groupe) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- PHOTO -->
            <div class="mb-3">
                <label>Logo</label><br>
                @if($groupe->logo && file_exists(public_path('storage/logos/'.$groupe->logo)))
    <img src="{{ asset('storage/logos/'.$groupe->logo) }}" width="70">
@else
    <img src="{{ asset('storage/logos/default.jpg') }}" width="70">
@endif
                <input type="file" name="logo" class="form-control">
            </div>

            <!-- NOM -->
            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control"
                       value="{{ $groupe->nom }}">
            </div>

            <!-- DATE -->
            <div class="mb-3">
                <label>Date de création</label>
                <input type="date" name="date_creation" class="form-control"
                       value="{{ $groupe->date_creation }}">
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-3">
                <label>Description</label>
                <input type="text" name="description" class="form-control"
                       value="{{ $groupe->description }}">
            </div>
            <button type="submit" class="btn btn-primary">💾 Modifier</button>
        </form>
    </div>
</div>
</body>
</html>
@endsection