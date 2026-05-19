<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    height: 100vh;
    background: linear-gradient(135deg, #1e4d3d, #2e6b55);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* container */
.login-container {
    width: 900px;
    height: 500px;
    display: flex;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

/* left side */
.left {
    flex: 1;
    background: #f5f7f6;
    display: flex;
    justify-content: center;
    align-items: center;
}

.left img {
    width: 80%;
}

/* right side */
.right {
    flex: 1;
    background: #1e4d3d;
    color: white;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.right h2 {
    margin-bottom: 20px;
}

.form-control {
    border-radius: 20px;
    border: none;
    margin-bottom: 15px;
}

.btn-login {
    border-radius: 20px;
    background: #5fae9e;
    border: none;
}

.btn-login:hover {
    background: #4a998a;
}
</style>

</head>

<body>

<div class="login-container">

    <!-- LEFT SIDE -->
    <div class="left">
        <img src="{{ asset('images/Commune_de_Fes.png') }}" >
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">

        <h2>Login</h2>

        <form method="POST" action="/login">
            @csrf

            <input type="email" name="email" class="form-control" placeholder="Email">

            <input type="password" name="password" class="form-control" placeholder="Password">

            <button class="btn btn-login w-100 text-white">Login</button>

            @if(session('error'))
                <p class="text-danger mt-2">{{ session('error') }}</p>
            @endif
        </form>

    </div>

</div>

</body>
</html>