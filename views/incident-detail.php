<div class="container-fluid">
    <div class="row">
        <aside class="col-12 col-md-3 col-lg-2 bg-light p-3">
            <h4 class="mb-4">Web 4 Heroes</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Héros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Incidents</a>
                </li>
            </ul>
        </aside>
        <section class="col-12 col-md-9 col-lg-10 p-4">

            <h3>Incident #<?= $incident['id'] ?> : <?= $incident['titre'] ?></h3>
            <p class="text-muted">Accueil > Mes Incidents > Détails</p>

            <div class="row g-3 mb-4">

                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-header">Détails</div>
                        <div class="card-body">
                            <p><strong>Description :</strong><br><?= $incident['description'] ?></p>
                            <p><strong>Lieu :</strong><br><?= $incident['lieu'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-header">Lieu</div>
                        <div class="card-body text-center">
                            <p>Carte</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-header">Statut actuel</div>
                        <div class="card-body">
                            <p><?= $incident['statut'] ?></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-header">Historique</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($historique as $item): ?>
                            <li class="list-group-item">
                                <strong>Incident #<?= $item['id'] ?> :</strong>
                                <?= $item['titre'] ?><br>
                                <small class="text-muted"><?= $item['date'] ?></small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </section>

    </div>
</div>
