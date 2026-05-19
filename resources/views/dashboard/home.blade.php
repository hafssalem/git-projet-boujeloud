@extends('dashboard')
@section('contenu')
<style>
    /* CARDS */
.card-box {
    background: white;
    padding: 20px;
    margin: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
</style>
   <div class="container mt-4">
        <div class="row">
    <div class="col-md-4">
        <div class="card-box">Spectacles : {{ $totalSpectacles ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box">Groupes : {{ $totalGroupes ?? 0 }}</div>
    </div> 
    <div class="col-md-4">
        <div class="card-box">Acteurs : {{ $totalActeurs ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box">Activités : {{ $totalActivites ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box">Événements : {{ $totalEvenements ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box">Autorisations : {{ $totalAutorisations ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box">Sanctions : {{ $totalSanctions ?? 0 }}</div>
    </div>
</div>
    </div>
    
@endsection