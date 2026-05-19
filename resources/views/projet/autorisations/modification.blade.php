@extends('dashboard')

@section('contenu')
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
<h2>Modifier Autorisation</h2>

<form action="{{ route('autorisations.update', $autorisation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="date" name="date_debut" value="{{ $autorisation->date_debut }}" class="form-control mb-2">

    <input type="date" name="date_fin" value="{{ $autorisation->date_fin }}" class="form-control mb-2">

    <input type="text" name="statut" value="{{ $autorisation->statut }}" class="form-control mb-2">

    <select name="id_acteur" class="form-control mb-2">
        @foreach($acteurs as $acteur)
            <option value="{{ $acteur->id_acteur }}"
                {{ $acteur->id_acteur == $autorisation->id_acteur ? 'selected' : '' }}>
                {{ $acteur->nom_prenom }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary">Modifier</button>

</form>

@endsection