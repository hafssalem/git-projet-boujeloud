@extends('dashboard')

@section('contenu')

<div class="container mt-4">

    <h3>📊 Statistiques des événements</h3>
<div class="d-flex gap-4">
    <!-- Chart 1 -->
    <div class="card p-3 mb-4"  style="width: 350px;">
        <h5>Evenements par statut</h5>
        <canvas id="statutChart"></canvas>
    </div>

    <!-- Chart 2 -->
    <div class="card p-3"  style="width: 350px;">
        <h5>Evenements par mois</h5>
        <canvas id="monthChart"></canvas>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // ===== Chart statut =====
    const statuts = @json($statuts);

    new Chart(document.getElementById('statutChart'), {
        type: 'pie',
        data: {
            labels: Object.keys(statuts),
            datasets: [{
                data: Object.values(statuts),
                backgroundColor: ['#4CAF50','#2196F3','#FFC107','#F44336']
            }]
        }
    });

    // ===== Chart months =====
    const months = @json($months);

    const monthNames = [
        '', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    new Chart(document.getElementById('monthChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(months).map(m => monthNames[m]),
            datasets: [{
                label: 'Evenements',
                data: Object.values(months),
                backgroundColor: '#3f51b5'
            }]
        }
    });
</script>

@endsection