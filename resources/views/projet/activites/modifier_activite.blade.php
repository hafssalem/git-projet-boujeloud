@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>modification</title>
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
    <h3>Modifier Activité</h3>
<div class='form-card'>
    <form action="{{ route('activites.update', $activite->id_activite) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="type_performance">Type de performance:</label>
        <input type="text" name="type_performance" class="form-control mb-2"
               value="{{ $activite->type_performance }}">
        <label for="mode_exercice">Mode d'exercice:</label>
        <select name="mode_exercice" class="form-control mb-2">
            <option {{ $activite->mode_exercice == 'Individuel' ? 'selected' : '' }}>Individuel</option>
            <option {{ $activite->mode_exercice == 'Groupe' ? 'selected' : '' }}>Groupe</option>
            <option {{ $activite->mode_exercice == 'Association' ? 'selected' : '' }}>Association</option>
        </select>
<label for="frequence">Fréquence:</label>
        <select name="frequence" class="form-control mb-2">
            <option {{ $activite->frequence == 'Quotidienne' ? 'selected' : '' }}>Quotidienne</option>
            <option {{ $activite->frequence == 'Hebdomadaire' ? 'selected' : '' }}>Hebdomadaire</option>
            <option {{ $activite->frequence == 'Occasionnelle' ? 'selected' : '' }}>Occasionnelle</option>
            <option {{ $activite->frequence == 'Saisonniere' ? 'selected' : '' }}>Saisonniere</option>
        </select>
<label for="lieu">Lieu:</label>
        <input type="text" name="lieu" class="form-control mb-2"value="{{ $activite->lieu }}">
<label for="langue">Langue:</label>
        <input type="text" name="langue" class="form-control mb-2"value="{{ $activite->langue }}">
        
{{-- TYPE LIEN --}}
<div class="mb-3">

    <label>Type de lien</label><br>

    {{-- ACTEUR --}}
    <input
        type="radio"
        name="type_lien"
        value="acteur"

        {{ $activite->id_acteur ? 'checked' : '' }}
    >
    Acteur

    {{-- GROUPE --}}
    <input
        type="radio"
        name="type_lien"
        value="groupe"

        {{ $activite->id_groupe ? 'checked' : '' }}
    >
    Groupe

</div>

{{-- BOX ACTEUR --}}
<div
    class="mb-3"
    id="acteur_box"

    style="{{ $activite->id_groupe ? 'display:none;' : '' }}"
>

    <label>Choisir Acteur</label>

    <select name="id_acteur" class="form-control">

        <option value="">-- choisir --</option>

        @foreach($acteurs as $acteur)

            <option
                value="{{ $acteur->id_acteur }}"

                {{ $activite->id_acteur == $acteur->id_acteur ? 'selected' : '' }}
            >

                {{ $acteur->nom_prenom }}

            </option>

        @endforeach

    </select>

</div>

{{-- BOX GROUPE --}}
<div
    class="mb-3"
    id="groupe_box"

    style="{{ $activite->id_acteur ? 'display:none;' : '' }}"
>

    <label>Choisir Groupe</label>

    <select name="id_groupe" class="form-control">

        <option value="">-- choisir --</option>

        @foreach($groupes as $groupe)

            <option
                value="{{ $groupe->id_groupe }}"

                {{ $activite->id_groupe == $groupe->id_groupe ? 'selected' : '' }}
            >

                {{ $groupe->nom }}

            </option>

        @endforeach

    </select>

</div>

        <button class="btn btn-primary">✏️ Modifier</button>
    </form>
</div>
</div>

<script>

document.querySelectorAll('input[name="type_lien"]')
.forEach((radio) => {

    radio.addEventListener('change', function () {

        if (this.value === 'acteur') {

            document.getElementById('acteur_box')
                .style.display = 'block';

            document.getElementById('groupe_box')
                .style.display = 'none';
        }

        if (this.value === 'groupe') {

            document.getElementById('acteur_box')
                .style.display = 'none';

            document.getElementById('groupe_box')
                .style.display = 'block';
        }
    });

});

</script>
</body>
</html>
@endsection