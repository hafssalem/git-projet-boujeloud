@extends('layout')
@section('title','Activites de La Place Bou Jeloud')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header class="hero">
  
  <!-- NAVBAR -->
  <ul class="nav">
    <li><a href="#" class="nav-link active">Home</a></li>
    <li><a href='{{ route('register') }}' class="nav-link">Enregister</a></li>
    <li><a href='{{ route('login') }}' class="nav-link">Login</a></li>
  </ul>

  <!-- Optional content inside hero -->
  <div class="hero-content">
    <h1>La Place Boujeloud</h1>
    <p>Gestion des activités de La Place Boujeloud. 
      En partenariat avec La commune de Fes</p>
     {{-- <img src="{{ asset('images/Commune_de_Fes.png') }}" id='commune-logo' width="200px" height="200px" alt="Commune de Fés"> --}}
  </div>

</header>

  <!-- OBJECTIF SECTION -->
  <section class="display-flex">
    <div>
      <h2>Objectif de l'application</h2>
      <p>
        Centraliser les données personnelles et professionnelles de tous les acteurs culturels opérant sur la place.
        Gérer les typologies de spectacles et d’activités artistiques.
         La commune de Fes et dans le cadrre de sa politique de modernisation de la gestion des espaces publics et de valorisation du patrimoine
          culturel immateriel.
      </p>
    </div>

    <img id='img' src="{{ asset('images/babboujloud.jpeg') }}" alt="babboujeloud">
  </section>

  <!-- FEATURES -->
  <section>
    <h2>Les fonctionnalités de ce projet</h2>

    <div class="cards">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Système de gestion des acteurs et leurs activités</h4>
          <p class="card-text">
            Une applications web permet d’organiser les acteurs,
            les artistes et ces activités et aussi toutes formes de spectacle et de fêtes populaires.
          </p>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Gestion des performances</h4>
          <p class="card-text">
             gestion des Spectacles et Performances.
             Agenda et de Planification des Evènements.  
          </p>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Une Application CRUD</h4>
          <p class="card-text">
            Permet de créer, lire, modifier et supprimer les données des acteurs, artistes et de ces activités
            et aussi toutes formes de spectacles et de fêtes populaires.
          </p>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer>
     <h2>Localisation</h2>

  <div class="map-container">
    <iframe 
      src="https://www.google.com/maps?q=34.0645,-4.9738&output=embed"
      width="100%" 
      height="400" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy">
    </iframe>
  </div>
    <p>&copy; 2026 Commune de FES</p>
  </footer>

</body>
</html>
@endsection