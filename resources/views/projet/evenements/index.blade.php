@extends('dashboard')
@section('contenu')
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Liste des evenements </title>
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

      <h3>  Liste des Evenements </h3> 
      <br>
      <form method="GET" action="{{ route('evenements.index') }}" class="mb-3 d-flex">
        @csrf
    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Rechercher un evenement..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Rechercher</button>

</form>
    
       <a class="btn bg-success text-white" href="{{ route('evenements.create') }}" >Ajouter un nouveau evenement</a>
<p>

    <br>
<a href="/export-evenements" class="btn btn-success">
    📥 Exporter Excel
</a>
    @isset($evenements)
    <table class="table-acteurs">
        <tr>
        <th>date de debut</th>
        <th>date de fin</th>
        <th>Fréquence</th>
        <th>Saison</th>
        <th>Statut</th>
        <th>Titre de Spectacle</th>
        <th>Actions</th>
        </tr>
        @foreach ($evenements as $evenement )
        <tr>
                <td>{{ $evenement->date_debut }}</td>
                <td>{{ $evenement->date_fin }}</td>
                <td>{{ $evenement->frequence }}</td>
                <td>{{ $evenement->saison }}</td>
                <td>{{ $evenement->statut }}</td>
                <td>{{ $evenement->spectacle->titre ?? '---' }}</td>
                <td>

<form method="POST" action="{{ route('evenements.destroy', $evenement->id) }}">
    @csrf
    @method('DELETE')

    <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-primary btn-sm">🔍</a>
    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning btn-sm">✏️</a>

    <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('Confirmez vous la suppression ?')">
        🗑️
    </button>
</form>

                </td>
        </tr> 
        @endforeach
        
    </table>
<div class="mt-3 d-flex justify-content-center">{{ $evenements->links() }}</div>
    @endisset
    </p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </html>
    
@endsection