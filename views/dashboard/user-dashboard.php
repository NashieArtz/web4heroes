<div class="container db-container">

    <div class="row">
        <div class="col-md-9">
            <h1 class="db-title">Tableau de bord</h1>
            <p class="db-welcome">Bienvenue, <strong><?= $userFirstName ?? 'Citoyen' ?></strong></p>
        </div>
        <div class="col-md-3 text-right">
            <form action="/user-dashboard" method="GET">
                <button type="submit" class="btn-login" style="width: 100%; padding: 10px;">Devenir un héros</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="db-card">
                <div class="db-card-header">
                    <span class="db-card-title">Mes incidents déclarés</span>
                </div>
                <div class="db-table-container">
                    <table class="db-table">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Priorité</th>
                            <th>Status</th>
                            <th>Vilain</th>
                            <th>Ville</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userOpenedIncidents as $incident): ?>
                            <tr>
                                <td><strong><?= $incident['title'] ?></strong></td>
                                <td><?= date('d/m/y à H:i', strtotime($incident['date'])) ?></td>
                                <td><?= $translationType[$incident['type']] ?? $incident['type'] ?></td>
                                <td><span class="label label-warning"><?= $translationPriority[$incident['priority']] ?? $incident['priority'] ?></span></td>
                                <td><span class="label label-info"><?= $translationStatus[$incident['status']] ?? $incident['status'] ?></span></td>
                                <td><?=$incident['alias']?></td>
                                <td><?= $incident['address'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="db-card" style="border-left: 5px solid var(--tag-success) !important;">
                <div class="db-card-header">
                    <span class="db-card-title">Mes incidents résolus</span>
                </div>
                <div class="db-table-container">
                    <table class="db-table">
                        <tbody>
                        <?php foreach ($userResolvedIncidents as $incident): ?>
                            <tr>
                                <td><?= $incident['title'] ?></td>
                                <td class="text-muted"><?= date('d/m/y à H:i', strtotime($incident['date'])) ?></td>
                                <td><?= $translationType[$incident['type']] ?? $incident['type'] ?></td>
                                <td><?=$incident['alias']?></td>
                                <td><span class="label label-success">Terminé</span></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="db-sidebar">
                <h4 style="margin-top: 0; margin-bottom: 20px; font-size: 16px;">Actions rapides</h4>
                <a href="/incident-create" class="db-btn-action db-btn-danger">Déclarer un incident</a>
                <a href="/incident-list" class="db-btn-action db-btn-outline">Mes incidents</a>
                <a href="/user-profile" class="db-btn-action db-btn-info">Mon profil</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-12">
            <div class="db-card">
                <div class="db-card-header">
                    <span class="db-card-title">Les incidents récents (Global)</span>
                </div>
                <div class="db-table-container">
                    <table class="db-table">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Priorité</th>
                            <th>Date</th>
                            <th>Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($recentIncidents)): ?>
                            <?php foreach ($recentIncidents as $recentIncident): ?>
                                <tr>
                                    <td><?= $recentIncident['title'] ?></td>
                                    <td>
                                        <?php if ($recentIncident['priority'] === 'High'): ?>
                                            <span class="label label-danger">HAUTE</span>
                                        <?php elseif ($recentIncident['priority'] === 'Mid'): ?>
                                            <span class="label label-warning">MOYENNE</span>
                                        <?php elseif ($recentIncident['priority'] === 'Low'): ?>
                                            <span class="label label-success">BASSE</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= date('d/m/y à H:i', strtotime($recentIncident['date'])) ?></td>
                                    <td><span class="label label-default"><?= $recentIncident['status'] ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted" style="padding: 30px;">
                                    Aucun incident récent dans votre secteur.
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
