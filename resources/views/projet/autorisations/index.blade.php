@extends('dashboard')

@section('contenu')
    <style>
.table-autorisations {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 1px black;
    font-family: Arial, sans-serif;
}

.table-autorisations th, .table-autorisations td {
    border: 0px solid #ddd;
    padding: 10px;
    text-align: left;
}

.table-autorisations th {
    background-color: black;
    color: white;
}

.table-autorisations tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-autorisations tr:hover {
    background-color: rgb(101, 99, 99);
    color: white;
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
<h3>Liste des autorisations</h3>

<br>
<form method="GET" action="{{ route('autorisations.index') }}" class="mb-3 d-flex">
        @csrf
    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Rechercher un autorisation..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Rechercher</button>

</form>

<a href="{{ route('autorisations.create') }}" class="btn btn-success mb-2">Ajouter un nouveau autorisation</a>
<br>

<a href="/export-autorisations" class="btn btn-success">
    📥 Exporter Excel
</a>

<table class="table-autorisations">
    <tr>
        <th>Date début</th>
        <th>Date fin</th>
        <th>Statut</th>
        <th>Acteur</th>
        <th>Actions</th>
    </tr>

    @foreach($autorisations as $autorisation)
    <tr>
        <td>{{ $autorisation->date_debut }}</td>
        <td>{{ $autorisation->date_fin }}</td>
        <td>{{ $autorisation->statut }}</td>
        <td>{{ $autorisation->acteur->nom_prenom ?? '' }}</td>

        <td>
            <a href="{{ route('autorisations.edit', $autorisation->id) }}" class="btn btn-primary">✏️</a>

            <form action="{{ route('autorisations.destroy', $autorisation->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmez-vous la suppression de cette autorisation?')">🗑️</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
<div class="mt-3 d-flex justify-content-center">{{ $autorisations->links() }}</div>
@endsection