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
    <div class="container mt-4">
    <h3>Modifier Evenements</h3>
<div class='form-card'>
    <form action="{{ route('evenements.update', $evenement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="date_debut">Date de début:</label>
<<<<<<< HEAD
        <input type="date" name="date_debut" class="form-control mb-2" value="{{ $evenement->date_debut }}">

        <label for="date_fin">Date de fin:</label>
        <input type="date" name="date_fin" class="form-control mb-2" value="{{ $evenement->date_fin }}">
=======
        <input type="datetime-local" name="date_debut" class="form-control mb-2" value="{{ $evenement->date_debut }}">

        <label for="date_fin">Date de fin:</label>
        <input type="datetime-local" name="date_fin" class="form-control mb-2" value="{{ $evenement->date_fin }}">
>>>>>>> cb156e4 (Premier commit)

        <label for="saison">Saison:</label>
        <input type="text" name="saison" class="form-control mb-2" value="{{ $evenement->saison }}">

        <label for="frequence">Fréquence:</label>
                <input type="text" name="frequence" class="form-control mb-2" value="{{ $evenement->frequence }}">

<label for="statut">Statut:</label>
        <select name="statut" class="form-control mb-2">
            <option value="Planifie" {{ $evenement->statut == 'Planifie' ? 'selected' : '' }}>Planifie</option>
            <option value="En cours" {{ $evenement->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Termine" {{ $evenement->statut == 'Termine' ? 'selected' : '' }}>Termine</option>
            <option value="Annule" {{ $evenement->statut == 'Annule' ? 'selected' : '' }}>Annule</option>
        </select>
<select name="id_spectacle" class="form-control">
    @foreach($spectacles as $spectacle)
        <option value="{{ $spectacle->id_spectacle }}"
            {{ $evenement->id_spectacle == $spectacle->id_spectacle ? 'selected' : '' }}>
            {{ $spectacle->titre }}
        </option>
    @endforeach
</select>
        <button type="submit" class="btn btn-primary">✏️ Modifier</button>
    </form>
</div>



@endsection