<div class="container">
    <h1 class="text-center col-10" style="margin-top:20px; margin-bottom:30px;">
        Tableau de bord
    </h1>

    <form action="/user-dashboard" method="POST">
        <button type="submit">Un héro? Devenez en un</button>
    </form>

    <div class="row">
        <div class="row col-md-10 col-sm-12">
            <div class="row">
                <div class="col-12 text-center" style="margin-bottom:20px;">
                    <p class="lead">
                        Bienvenue <strong><?= $userFirstName ?? 'Utilisateur' ?></strong>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px;">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <small class="text-muted text-uppercase">Mes incidents déclarés</small>
                            <table class="table">
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Priorité</th>
                                    <th>Type</th>
                                    <th>Villain</th>
                                    <th>Status</th>
                                    <th>Adresse</th>
                                </tr>

                                <?php foreach ($userOpenedIncidents as $userOpenedIncident): ?>
                                    <tr>
                                        <td><?= $userOpenedIncident['title'] ?></td>
                                        <td><?= $userOpenedIncident['description'] ?></td>
                                        <td><?= $userOpenedIncident['date'] ?></td>
                                        <td><?= $translationPriority[$userOpenedIncident['priority']] ?? $userOpenedIncident['priority']?></td>
                                        <td><?= $translationType[$userOpenedIncident['type']] ?? $userOpenedIncident['type'] ?></td>
                                        <td><?= $userOpenedIncident['alias'] ?></td>
                                        <td><?= $translationStatus[$userOpenedIncident['status']] ?? $userOpenedIncident['status'] ?></td>
                                        <td><?= $userOpenedIncident['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12" style="margin-bottom:20px;">
                    <div class="panel panel-success">
                        <div class="panel-body text-center">
                            <small class="text-muted text-uppercase">Mes incidents résolus</small>
                            <table class="table">
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Priorité</th>
                                    <th>Type</th>
                                    <th>Villain</th>
                                    <th>Status</th>
                                    <th>Adresse</th>
                                </tr>

                                <?php foreach ($userResolvedIncidents as $userResolvedIncident): ?>
                                    <tr>
                                        <td><?= $userResolvedIncident['title']?></td>
                                        <td><?= $userResolvedIncident['description']?></td>
                                        <td><?= $userResolvedIncident['date'] ?></td>
                                        <td><?= $translationPriority[$userResolvedIncident['priority']] ?? $userResolvedIncident['priority']?></td>
                                        <td><?= $translationType[$userResolvedIncident['type']] ?? $userResolvedIncident['type'] ?></td>
                                        <td><?= $userResolvedIncident['alias'] ?></td>
                                        <td><?= $translationStatus[$userResolvedIncident['status']] ?? $userResolvedIncident['status'] ?></td>
                                        <td><?= $userResolvedIncident['address'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column col-md-2 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>Actions rapides</strong>
                </div>
                <div class="panel-body">

                    <a href="/incident-create" class="btn btn-danger btn-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        Déclarer un incident
                    </a>

                    <hr>

                    <a href="/incident-list" class="btn btn-default btn-block">
                        <i class="glyphicon glyphicon-list"></i>
                        Voir tous mes incidents
                    </a>

                    <hr>

                    <a href="/user-profile" class="btn btn-info btn-block">
                        <i class="glyphicon glyphicon-user"></i>
                        Mon profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12" style="margin-bottom:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> Les incidents récents</strong>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Priorité</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if (!empty($recentIncidents)): ?>
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
                                    <?php else: ?>
                                        <span class="label">EN ATTENTE</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($recentIncident['date'])) ?></td>
                                <td>
                                        <span class="label label-info">
                                            <?= htmlspecialchars($recentIncident['status']) ?>
                                        </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Aucun incident déclaré
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

