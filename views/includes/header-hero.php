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
                    <a class="nav-link" href="/">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="incident-create">
                        Déclarer un incident
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Rechercher
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="heroes-list">Liste de héros</a></li>
                        <li><a class="dropdown-item" href="villains-list">Liste des villains</a></li>
                        <li><a class="dropdown-item" href="movies-list">Liste des films</a></li>
                    </ul>
                </li>

            </ul>
            <div class="d-flex gap-2">
                <a href="login" class="btn btn-outline-light">
                    Connexion
                </a>
                <a href="register" class="btn btn-primary">
                    Inscription
                </a>
            </div>

        </div>
    </div>
</nav>
