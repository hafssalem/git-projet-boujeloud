@extends('dashboard')
@section('contenu')
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Liste des Acteurs</title>
  </head>
  <body>

    <style>
.table-acteurs {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 1px black;
    font-family: Arial, sans-serif;
}

.table-acteurs th, .table-acteurs td {
    border: 0px solid #ddd;
    padding: 10px;
    text-align: left;
}

.table-acteurs th {
    background-color: black;
    color: white;
}

.table-acteurs tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-acteurs tr:hover {
    background-color: rgb(101, 99, 99);
    color: white;
}

.table-acteurs img {
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

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

      <h3> 👤 Liste des Acteurs</h3> <br>

      <form method="GET" action="{{ route('acteurs.index') }}" class="mb-3 d-flex">
        @csrf
    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Rechercher un acteur..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Rechercher</button>

</form>
<<<<<<< HEAD
    @role('admin|gestionnaire')
       <a class="btn bg-success text-white" href="{{ route('acteurs.create') }}" >Ajouter un nouveau acteur</a>
    
=======
    
       <a class="btn bg-success text-white" href="{{ route('acteurs.create') }}" >Ajouter un nouveau acteur</a>
>>>>>>> cb156e4 (Premier commit)
<p>


    <br>
<a href="/export-acteurs" class="btn btn-success">
    📥 Exporter Excel
</a>
<<<<<<< HEAD
@endrole
=======
>>>>>>> cb156e4 (Premier commit)
    @isset($acteurs)
    <table class="table-acteurs">
        <tr>
        <th>Photo</th>
        <th>Nom et Prenom</th>
        <th>Date de naissance</th>
        <th>CIN</th>
        <th>Nationalite</th>
        <th>Adresse</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Date d'inscription</th>
        <th>Statut</th>
<<<<<<< HEAD
        @role('admin|gestionnaire')
        <th>Actions</th>
        @endrole
=======
        <th>Actions</th>
>>>>>>> cb156e4 (Premier commit)
        </tr>
        @foreach ($acteurs as $acteur )
        <tr>
            <td>
                
@if($acteur->photo && file_exists(public_path('storage/photos/'.$acteur->photo)))
    <img src="{{ asset('storage/photos/'.$acteur->photo) }}" width="70">
@else
    <img src="{{ asset('storage/photos/default.jpg') }}" width="70">
@endif            

</td>
                <td>{{ $acteur->nom_prenom }}</td>
                <td>{{ $acteur->date_naissance }}</td>
                <td>{{ $acteur->cin_passport }}</td>
                <td>{{ $acteur->nationalite }}</td>
                <td>{{ $acteur->adresse }}</td>
                <td>{{ $acteur->telephone }}</td>
                <td>{{ $acteur->email }}</td>
                <td>{{ $acteur->date_inscription }}</td>
                <td>{{ $acteur->statut }}</td>
<<<<<<< HEAD
                @role('admin|gestionnaire')
                <td>

<form method="post" action="{{ route('acteurs.destroy', $acteur->id_acteur) }}">
=======
                <td>

<form method="post" action="{{ route('acteurs.destroy', $acteur) }}">
>>>>>>> cb156e4 (Premier commit)
    @csrf
    @method('DELETE')
    <a href="{{ route('acteurs.show', $acteur) }}" class="btn btn-primary btn-sm">🔍</a>
    <a href="{{ route('acteurs.edit', $acteur) }}" class="btn btn-warning btn-sm">✏️</a>
    <input type="submit" class="btn btn-danger btn-sm" value="🗑️"
    onclick="return confirm('Confirmez vous la suppression de ce acteur?')" />
</form>
 </td>
<<<<<<< HEAD
                @endrole
=======
>>>>>>> cb156e4 (Premier commit)
        </tr> 
        @endforeach

    </table>

    <div class="mt-3 d-flex justify-content-center">{{ $acteurs->links() }}</div>
    @endisset
    </p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </html>
    
@endsection