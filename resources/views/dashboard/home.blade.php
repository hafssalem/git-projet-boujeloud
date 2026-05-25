@extends('dashboard')
@section('contenu')
<style>
    /* CARDS */
.card-box {
    background: white;
    font-family: Arial, sans-serif;
    padding: 20px;
    margin: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgb(106, 105, 105);
}
</style>
   <div class="container mt-4">
        <div class="row">
    <div class="col-md-4">
        <div class="card-box"><strong>Spectacles :</strong> {{ $totalSpectacles ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box"><strong>Groupes :</strong> {{ $totalGroupes ?? 0 }}</div>
    </div> 
    <div class="col-md-4">
        <div class="card-box"><strong>Acteurs :</strong> {{ $totalActeurs ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box"><strong>Activités :</strong> {{ $totalActivites ?? 0 }}</div>
    </div>
    <div class="col-md-4">
        <div class="card-box"><strong>Événements :</strong> {{ $totalEvenements ?? 0 }}</div>
    </div>
    {{-- <div class="col-md-4">
        <div class="card-box"><strong>Autorisations :</strong> {{ $totalAutorisations ?? 0 }}</div>
    </div> --}}
    <div class="col-md-4">
        <div class="card-box"><strong>Sanctions :</strong> {{ $totalSanctions ?? 0 }}</div>
    </div>
</div>
    </div>
    
@endsection