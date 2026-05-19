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
<h3>Edit User</h3>

<form class='form-card' method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label class='form-label'>Name:</label>
    <input class="form-control" type="text" name="name" value="{{ $user->name }}"><br>

    <label class='form-label'>Email:</label>
    <input class="form-control" type="email" name="email" value="{{ $user->email }}"><br>

    <label class='form-label'>Roles:</label><br>
    @foreach($roles as $role)
        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}"
        {{ $user->hasRole($role->name) ? 'checked' : '' }}>
        <label class="form-check-label">{{ $role->name }}</label><br>
    @endforeach

    <button class="btn bg-success text-white" type="submit">Update</button>
</form>

@endsection