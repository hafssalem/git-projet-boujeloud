@extends('dashboard')

@section('contenu')
 <style>
/* .table {
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
} */

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
<h3>Liste des permissions</h3>

<a class="btn btn-primary" href="{{ route('permissions.create') }}">➕ Ajouter</a>


<table class='table'>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    @foreach($permissions as $permission)
    <tr>
        <td>{{ $permission->id }}</td>
        <td>{{ $permission->name }}</td>
        <td>
             <a class='btn btn-success' href="{{ route('permissions.edit',$permission->id) }}">Modifier</a>
 
            <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection