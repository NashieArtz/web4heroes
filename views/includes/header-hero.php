<nav class="navbar navbar-expand-lg header">

    <div class="container d-flex justify-content-evenly">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/public/assets/img/logo-hero.png" alt="Logo" height="30" class="me-2 logo-hover">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between
" id="mainNavbar">

            <ul class="navbar-nav d-flex align-items-center mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link d-inline-block mb-0" href="/">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-inline-block mb-0" href="/hero-movies">Mes films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-block mb-0" href="/hero-reputation">Ma réputation</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Rechercher
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="incident-list">Liste des incidents</a></li>
                        <li><a class="dropdown-item" href="heroes-list">Liste de héros</a></li>
                        <li><a class="dropdown-item" href="villains-list">Liste des villains</a></li>
                        <li><a class="dropdown-item" href="movies-list">Liste des films</a></li>
                    </ul>
                </li>

            </ul>
            <div class="d-flex gap-2">
                <a href="hero-dashboard" class="btn btn-outline-light">
                    Mon espace
                </a>
                <form action="/logout" method="POST" class="d-inline-block mb-0">
                    <button type="submit" class="btn-login" style="padding: 8px 20px;">
                        Déconnecter <i class="glyphicon glyphicon-log-out"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
