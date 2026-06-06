@extends('dashboard')
@section('contenu')
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Liste des spectacles </title>
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

      <h3>  Liste des spectacles</h3> 
      <br>
    <form method="GET" action="{{ route('spectacles.index') }}" class="mb-3 d-flex">
        @csrf
    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Rechercher un spectacle..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Rechercher</button>

</form>
<<<<<<< HEAD
@role('admin|gestionnaire')
=======
>>>>>>> cb156e4 (Premier commit)
       <a class="btn bg-success text-white" href="{{ route('spectacles.create') }}" >Ajouter un nouveau spectacle</a>
<p>

    <br>
<a href="/export-spectacles" class="btn btn-success">
    📥 Exporter Excel
</a>
<<<<<<< HEAD
@endrole
=======
>>>>>>> cb156e4 (Premier commit)
    @isset($spectacles)
    <table class="table-acteurs">
        <tr>
        <th>Titre</th>
        <th>Type</th>
        <th>Description</th>
        <th>Public Cible</th>
        <th>Langue</th>
        <th>Durée</th>
        <th>Nombre de Représentations</th>
        <th>Équipements</th>
        <th>Caractère</th>
        <th>Classification</th>
<<<<<<< HEAD
        @role('admin|gestionnaire')
        <th>Actions</th>
        @endrole
=======
        <th>Actions</th>
>>>>>>> cb156e4 (Premier commit)
        </tr>
        @foreach ($spectacles as $spectacle )
        <tr>
                <td>{{ $spectacle->titre }}</td>
                <td>{{ $spectacle->type }}</td>
                <td>{{ $spectacle->description }}</td>
                <td>{{ $spectacle->public_cible }}</td>
                <td>{{ $spectacle->langue }}</td>
                <td>{{ $spectacle->duree }}</td>
                <td>{{ $spectacle->nb_representations}}</td>
                <td>{{ $spectacle->equipements }}</td>
                <td>{{ $spectacle->caractere }}</td>
                <td>{{ $spectacle->classification }}</td>
<<<<<<< HEAD
                @role('admin|gestionnaire')
=======
>>>>>>> cb156e4 (Premier commit)
                <td>

<form method="post" action="{{ route('spectacles.destroy', $spectacle) }}">
    @csrf
    @method('DELETE')
    <a href="{{ route('spectacles.show', $spectacle) }}" class="btn btn-primary btn-sm">🔍</a>
    <a href="{{ route('spectacles.edit', $spectacle) }}" class="btn btn-warning btn-sm">✏️</a>
    <input type="submit" class="btn btn-danger btn-sm" value="🗑️"
    onclick="return confirm('Confirmez vous la suppression de cette spectacle?')" />
</form>
<<<<<<< HEAD
                </td>
        @endrole
=======

                </td>
>>>>>>> cb156e4 (Premier commit)
        </tr> 
        @endforeach

    </table>

    <div class="mt-3 d-flex justify-content-center">{{ $spectacles->links() }}
</div>
    @endisset
    </p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </html>
    
@endsection