<section class="py-4">
    <div class="container">

        <h2 class="mb-4 text-center">Liste des incidents à Rouen</h2>

        <form method="get" class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Filtres de recherche</h5>
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
                        <input type="text" name="search" class="form-control" placeholder="Rechercher un incident...">
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
                <?php if (!empty($incidents)): ?>
                    <?php foreach ($incidents as $incident): ?>
                        <tr>
                            <td><?= $incident['id'] ?></td>
                            <td><?= $typeTranslations[$incident['type']] ?? $incident['type'] ?></td>
                            <td><?= $incident['city_name'] ?? 'Lieu inconnu' ?></td>
                            <td><?= ($incident['firstname'] ?? 'Anonyme') . ' ' . ($incident['lastname'] ?? '') ?></td>
                            <td><?= date('d/m/y à H:i', strtotime($incident['date'])) ?></td>
                            <td>
                                <?php
                                $prioClass = match($incident['priority']) {
                                    'High' => 'bg-danger',
                                    'Mid' => 'bg-warning text-dark',
                                    default => 'bg-secondary'
                                };
                                ?>
                                <span class="badge <?= $prioClass ?>"><?= $incident['priority'] ?></span>
                            </td>
                            <td>
                                <?php
                                $statusClass = match($incident['status']) {
                                    'Resolved' => 'bg-success',
                                    'In progress' => 'bg-primary',
                                    default => 'bg-info text-dark'
                                };
                                ?>
                                <span class="badge <?= $statusClass ?>"><?= $incident['status'] ?></span>
                            </td>
                            <td>
                                <a href="/incident-detail?id=<?= $incident['id'] ?>" class="btn btn-sm btn-outline-primary">Voir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Aucun incident enregistré.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
