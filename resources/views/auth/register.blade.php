<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(135deg, #1e4d3d, #2e6b55);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            width: 900px;
            height: 500px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* LEFT */
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

        /* RIGHT */
        .right {
            flex: 1;
            background: #1e4d3d;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border-radius: 20px;
            border: none;
            margin-bottom: 15px;
        }

        .btn-register {
            border-radius: 20px;
            background: #5fae9e;
            border: none;
        }

        .btn-register:hover {
            background: #4a998a;
        }

        a {
            color: #a8e6cf;
        }

        a:hover {
            color: white;
        }
    </style>
</head>

<body>

<div class="register-container">

    <!-- LEFT IMAGE -->
    <div class="left">
<<<<<<< HEAD
        <img src="{{ asset('images/Commune_de_Fes.png') }}" >
=======
        <img src="{{ asset('images/Commune_de_Fes.png') }}" alt="image">
>>>>>>> cb156e4 (Premier commit)
    </div>

    <!-- RIGHT FORM -->
    <div class="right">

        <h3>Créer un compte</h3>

        <form method="POST" action="/register">
            @csrf

            <input type="text" name="name" class="form-control" placeholder="Name">

            <input type="email" name="email" class="form-control" placeholder="Email">

            <input type="password" name="password" class="form-control" placeholder="Password">

            <button class="btn btn-register w-100">Enregistrer</button>

            @if ($errors->any())
                <div class="text-danger mt-2">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <p class="mt-3 text-center">
                Déjà un compte ? <a href="/login">Login</a>
            </p>

        </form>

    </div>

</div>

</body>
</html>