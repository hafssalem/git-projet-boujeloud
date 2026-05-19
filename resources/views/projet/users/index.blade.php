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

.table img {
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
<h3>Users List</h3>

<a class="btn bg-success text-white" href="{{ route('users.create') }}" class="btn" >Ajouter User</a> 

<table class='table'>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @foreach($user->roles as $role)
                {{ $role->name }}
            @endforeach
        </td>
        <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection