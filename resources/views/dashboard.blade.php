<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset("css/style1.css") }}">
    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>
        <i class="bi bi-grid-1x2-fill"></i>
        Dashboard
    </h4>

    @role('admin')
        <a href="{{route('dashboard.index')}}">
            <i class="bi bi-house-door"></i> Home
        </a>
        <a href="{{ route('users.index') }}">
            <i class="bi bi-people"></i> Users
        </a>
        <a href="{{ route('roles.index') }}">
            <i class="bi bi-shield"></i> Roles
        </a>
        <a href="{{ route('permissions.index') }}">
            <i class="bi bi-key"></i> Permissions
        </a>
        <a href="{{ route('evenements.stats') }}">
            <i class="bi bi-bar-chart"></i> Statistics
        </a>

        <select class="form-select shadow rounded-3 mt-3" onchange="goToPage(this)">
            <option selected disabled>📋 Les tableaux</option>
            <option value="{{ route('acteurs.index') }}">🎭 Acteurs</option>
            <option value="{{ route('activites.index') }}">🎯 Activités</option>
            <option value="{{ route('groupes.index') }}">👥 Groupes</option>
            <option value="{{ route('spectacles.index') }}">🎪 Spectacles</option>
            <option value="{{ route('evenements.index') }}">📅 Événements</option>
            <option value="{{ route('autorisations.index') }}">✅ Autorisations</option>
            <option value="{{ route('sanctions.index') }}">⚠️ Sanctions</option>
        </select>
    @endrole

    @role('gestionnaire')
        <a href="{{route('dashboard.index')}}">
            <i class="bi bi-house-door"></i> Home
        </a>
        <a href="{{ route('evenements.stats') }}">
            <i class="bi bi-bar-chart"></i> Statistics
        </a>

        <select class="form-select shadow rounded-3" onchange="goToPage(this)">
            <option selected disabled>📋 Les tableaux</option>
            <option value="{{ route('acteurs.index') }}">🎭 Acteurs</option>
            <option value="{{ route('activites.index') }}">🎯 Activités</option>
            <option value="{{ route('groupes.index') }}">👥 Groupes</option>
            <option value="{{ route('spectacles.index') }}">🎪 Spectacles</option>
            <option value="{{ route('evenements.index') }}">📅 Événements</option>
            <option value="{{ route('autorisations.index') }}">✅ Autorisations</option>
            <option value="{{ route('sanctions.index') }}">⚠️ Sanctions</option>
        </select>
    @endrole

    @role('agent')
        <a href="{{route('dashboard.index')}}">
            <i class="bi bi-house-door"></i> Home
        </a>
        <a href="{{ route('evenements.stats') }}">
            <i class="bi bi-bar-chart"></i> Statistics
        </a>

        <select class="form-select shadow rounded-3" onchange="goToPage(this)">
            <option selected disabled>📋 Les tableaux</option>
            <option value="{{ route('evenements.index') }}">📅 Événements</option>
            <option value="{{ route('autorisations.index') }}">✅ Autorisations</option>
            <option value="{{ route('sanctions.index') }}">⚠️ Sanctions</option>
        </select>
    @endrole
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="welcome-text">
            <i class="bi bi-person-circle"></i>
            <div>
                <span>Bienvenue</span>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- PROFILE DROPDOWN -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-gear"></i> Profile
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-pencil-square me-2"></i>Edit Profile
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content-wrapper">
        @yield('contenu')
    </div>
</div>

<script>
function goToPage(select) {
    let url = select.value;
    if (url) {
        window.location.href = url;
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>