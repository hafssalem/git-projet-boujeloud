@extends('dashboard')

@section('contenu')
    <style>
.table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 1px black;
    font-family: Arial, sans-serif;
}

.table th, .table td {
    border: 0px solid #ddd;
    padding: 10px;
    text-align: left;
}

.table th {
    background-color: black;
    color: white;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tr:hover {
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

<h3>Liste des sanctions</h3>
<br>

<form method="GET" action="{{ route('sanctions.index') }}" class="mb-3 d-flex">
        @csrf
    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Rechercher une sanction..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-success">Rechercher</button>

</form>
@role('admin|gestionnaire')
<a href="{{ route('sanctions.create') }}" class="btn btn-success mb-2">Ajouter un nouveau sanction</a>

<br>
<a href="/export-sanctions" class="btn btn-success">
    📥 Exporter Excel
</a>
@endrole
<table class="table">
    <tr>
        <th>Type</th>
        <th>Date</th>
        <th>Description</th>
        <th>Acteur</th>
        @role('admin|gestionnaire')
        <th>Actions</th>
        @endrole
    </tr>

    @foreach($sanctions as $s)
    <tr>
        <td>{{ $s->type }}</td>
        <td>{{ $s->date }}</td>
        <td>{{ $s->description }}</td>
        <td>{{ $s->acteur->nom_prenom ?? '' }}</td>
@role('admin|gestionnaire')
        <td>
            <a href="{{ route('sanctions.edit', $s->id) }}" class="btn btn-primary">✏️</a>

            <form action="{{ route('sanctions.destroy', $s->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"  onclick="return confirm('Confirmez vous la suppression de cette sanction?')">🗑️</button>
            </form>
        </td>
@endrole
    </tr>
    @endforeach

</table>
<div class="mt-3 d-flex justify-content-center">{{ $sanctions->links() }}</div>
@endsection