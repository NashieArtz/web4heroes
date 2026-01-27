<section class="py-4">
    <div class="container">

        <h2 class="mb-4 text-center">Liste des incidents</h2>
        <form method="get" class="card mb-4 shadow-sm">
            <div class="card-body">

                <h5 class="mb-3">Filtres</h5>

                <div class="row g-3 align-items-end">

                    <div class="col-12 col-md-3">
                        <label class="form-label">Statut</label>
                        <select name="statut" class="form-select">
                            <option value="">Tous</option>
                            <option value="En cours">En cours</option>
                            <option value="Signalé">Signalé</option>
                            <option value="Résolu">Résolu</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label">Priorité</label>
                        <select name="priorite" class="form-select">
                            <option value="">Toutes</option>
                            <option value="Haute">Haute</option>
                            <option value="Normale">Normale</option>
                            <option value="Basse">Basse</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">Recherche</label>
                        <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Rechercher...">
                    </div>

                    <div class="col-12 col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary">
                            Filtrer
                        </button>
                    </div>

                </div>

            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Lieu</th>
                    <th>Signalé par</th>
                    <th>Date</th>
                    <th>Priorité</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($incidents as $incident): ?>
                    <tr>
                        <td><?= $incident[0] ?></td>
                        <td><?= $incident[1] ?></td>
                        <td><?= $incident[2] ?></td>
                        <td><?= $incident[3] ?></td>
                        <td><?= $incident[4] ?></td>

                        <td>
                            <span class="badge
                                <?= $incident[5] === 'Haute' ? 'bg-danger' :
                                    ($incident[5] === 'Normale' ? 'bg-warning text-dark' : 'bg-secondary') ?>">
                                <?= $incident[5] ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge
                                <?= $incident[6] === 'Résolu' ? 'bg-success' :
                                    ($incident[6] === 'En cours' ? 'bg-primary' : 'bg-info text-dark') ?>">
                                <?= $incident[6] ?>
                            </span>
                        </td>

                        <td>
                            <a href="incident-detail.php?id=<?= $incident[0] ?>"
                               class="btn btn-sm btn-outline-primary">
                                Voir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</section>
