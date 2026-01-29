<?php
extract($data ?? []);
?>
<div class="container db-container">
    <div class="row">
        <div class="col-md-9">
            <h1 class="db-title">Tableau de bord Administrateur</h1>
            <p class="db-welcome">Gestion globale du système Rouen District</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="db-card text-center">
                <span class="db-card-title">Utilisateurs</span>
                <h3 style="margin: 10px 0;"><strong><?= (int)($totalUsers ?? 0) ?></strong></h3>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="db-card text-center" style="border-top: 4px solid var(--tag-danger) !important;">
                <span class="db-card-title">Héros en attente</span>
                <h3 style="margin: 10px 0;"><strong><?= (int)($pendingHeroes ?? 0) ?></strong></h3>
                <span class="label label-danger"><?= (int)($pendingHeroes ?? 0) ?> à valider</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="db-card text-center" style="border-top: 4px solid var(--tag-warning) !important;">
                <span class="db-card-title">Incidents ouverts</span>
                <h3 style="margin: 10px 0;"><strong><?= (int)($activeIncidents ?? 0) ?></strong></h3>
                <span class="label label-warning"><?= (int)($activeIncidents ?? 0) ?> en cours</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="db-card text-center">
                <span class="db-card-title">Abonnés newsletter</span>
                <h3 style="margin: 10px 0;"><strong><?= (int)($totalReports ?? 0) ?></strong></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="db-card">
                <div class="db-card-header">
                    <span class="db-card-title">Derniers incidents déclarés</span>
                </div>
                <div class="db-table-container">
                    <table class="db-table">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Priorité</th>
                            <th>Auteur</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($activites)): ?>
                            <?php foreach ($activites as $act): ?>
                                <tr>
                                    <td><strong><?= $act['title'] ?></strong></td>
                                    <td>
                                        <?php
                                        $prio = $act['priority'] ?? 'Low';
                                        if ($prio === 'High'): ?>
                                            <span class="label label-danger">Haute</span>
                                        <?php elseif ($prio === 'Mid'): ?>
                                            <span class="label label-warning">Normale</span>
                                        <?php else: ?>
                                            <span class="label label-success">Basse</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $act['firstname'] . ' ' . $act['lastname'] ?></td>
                                    <td><?= date('d/m/y à H:i', strtotime($act['date'])) ?></td>
                                    <td>
                                        <a href="/admin/incident/edit/<?= $act['id'] ?>" class="btn btn-xs btn-warning">Modifier</a>
                                        <a href="/admin/incident/delete/<?= $act['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Supprimer ?');">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted" style="padding: 30px;">
                                    Aucun incident récent
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="db-sidebar">
                <h4 style="margin-top: 0; margin-bottom: 20px; font-size: 16px;">Gestion Modérateur</h4>

                <a href="/admin/heroes/pending" class="db-btn-action db-btn-info">Valider les héros</a>
                <a href="/admin/incidents" class="db-btn-action db-btn-outline">Gérer les incidents</a>
                <a href="/admin/users" class="db-btn-action db-btn-outline">Gérer les utilisateurs</a>
                <a href="/admin/blog" class="db-btn-action db-btn-outline">Gérer le Blog</a>
                <a href="/admin/newsletter" class="db-btn-action db-btn-outline">Newsletter</a>
            </div>
        </div>
    </div>
</div>
