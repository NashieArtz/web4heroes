<nav class="navbar navbar-expand-lg header">

    <div class="container d-flex justify-content-evenly">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/public/assets/img/logo-admin.png" alt="Logo" height="30" class="me-2 logo-hover">
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
                    <a class="nav-link" href="admin-incidents-list">
                        Liste Incidents
                    </a>
                </li>
                <li>
                <a class="nav-link" href="admin-users-list">
                    Liste Utilisateurs
                </a>
                </li>
                <li>
                <a class="nav-link" href="admin-movies-list">
                    Liste Films
                </a>
                </li>
                <li>
                    <a class="nav-link" href="admin-newsletters">
                        Newsletters
                    </a>
                </li>

            </ul>
            <div class="d-flex gap-2">
                <form action="/logout" method="POST">
                    <button type="submit">Déconnecter</button>
                </form>
            </div>

        </div>
    </div>
</nav>
