@extends('dashboard')
@section('contenu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>liste des groupes</title>
</head>
<body>
     <style>
.table-groupes {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 1px black;
    font-family: Arial, sans-serif;
}

.table-groupes th, .table-groupes td {
    border: 0px solid #ddd;
    padding: 10px;
    text-align: left;
}

.table-groupes th {
    background-color: black;
    color: white;
}

.table-groupes tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-groupes tr:hover {
    background-color: rgb(101, 99, 99);
    color: white;
}

.table-groupes img {
    border-radius: 10px;
    width: 80px;
}
        .nav-link {
  text-decoration: none;
  color: white;
  margin: 0 10px;
  padding: 10px 20px;
  border-radius: 30px;
  transition: 0.3s;
}

.nav-link:hover,
.nav-link.active {
  background: #4CAF50;
  color: white;
}
.text-white{
    color:white;
    background-color: #4CAF50;
    padding:10px;
}
h3{
    margin:20px;
    color:rgb(61, 6, 6);
    text-align: center;
    
}
</style>
<div class="container mt-4">
    @if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
    <h3>Liste des Groupes</h3>

    <br>
    <form method="GET" action="{{ route('groupes.index') }}" class="mb-3 d-flex">
        @csrf
    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Rechercher un groupe..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Rechercher</button>

</form>

       <a class="btn bg-success text-white" href="{{ route('groupes.create') }}" >Ajouter un nouveau groupe</a>
       <p>
        <br>

        
        <a href="/export-groupes" class="btn btn-success">
    📥 Exporter Excel
</a>
    <table class="table-groupes">
        <tr>
            <th>Logo</th>
            <th>Nom</th>
            <th>Date</th>
            <th>Description</th>
            <th>Membres</th>
            <th>Actions</th>
        </tr>

        @foreach($groupes as $groupe)
        <tr>
            <td>
@if($groupe->logo && file_exists(public_path('storage/logos/'.$groupe->logo)))
    <img src="{{ asset('storage/logos/'.$groupe->logo) }}" width="70">
@else
    <img src="{{ asset('storage/logos/default.jpg') }}" width="70">
@endif
            </td>
            <td>{{ $groupe->nom }}</td>
            <td>{{ $groupe->date_creation }}</td>
            <td>{{ $groupe->description }}</td>
            <td>
    @forelse($groupe->acteurs as $acteur)
        <span class="badge bg-primary">
            {{ $acteur->nom_prenom }}
        </span>
    @empty
        <span class="text-danger">Aucun membre</span>
    @endforelse
</td>

            <td>
                <a href="{{ route('groupes.edit', $groupe->id_groupe) }}" class="btn btn-warning btn-sm">✏️</a>
                <a href="{{ route('groupes.show', $groupe->id_groupe) }}" class="btn btn-primary btn-sm">🔍</a>
                <form action="{{ route('groupes.destroy', $groupe->id_groupe) }}" method="POST" 
                    onclick="return confirm('Confirmez vous la suppression de ce groupe?')
                "style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    <div class="mt-3 d-flex justify-content-center">{{ $groupes->links() }}</div>
    </p>
</div>
</body>
</html>
@endsection