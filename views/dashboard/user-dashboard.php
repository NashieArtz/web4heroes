<div class="container">
    <h1 class="text-center" style="margin-top:20px; margin-bottom:30px;">
        Tableau de bord Utilisateur
    </h1>
    <div class="row">
        <div class="col-xs-12 text-center" style="margin-bottom:20px;">
            <p class="lead">
                Bienvenue <strong><?= htmlspecialchars($_SESSION['firstname'] ?? 'Utilisateur') ?></strong>
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Incidents déclarés</small>
                    <h3><strong><?= (int)$stats['reported'] ?></strong></h3>
                    <i class="glyphicon glyphicon-bullhorn text-primary" style="font-size:26px;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-success">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Incidents résolus</small>
                    <h3><strong><?= (int)$stats['resolved'] ?></strong></h3>
                    <i class="glyphicon glyphicon-ok-circle" style="font-size:26px;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-info">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Incidents en cours</small>
                    <h3><strong><?= (int)$stats['open'] ?></strong></h3>
                    <i class="glyphicon glyphicon-time" style="font-size:26px;"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-md-8 col-sm-12 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Mes incidents récents</strong>
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

                        <?php if (!empty($incidents)): ?>
                            <?php foreach ($incidents as $incident): ?>
                                <tr>
                                    <td><?= htmlspecialchars($incident['title']) ?></td>
                                    <td>
                                        <?php if ($incident['priority'] === 'High'): ?>
                                            <span class="label label-danger">HAUTE</span>
                                        <?php elseif ($incident['priority'] === 'Mid'): ?>
                                            <span class="label label-warning">MOYENNE</span>
                                        <?php else: ?>
                                            <span class="label label-success">BASSE</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= date('d/m/Y H:i', strtotime($incident['date'])) ?></td>
                                    <td>
                                        <span class="label label-info">
                                            <?= htmlspecialchars($incident['status']) ?>
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
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>Actions rapides</strong>
                </div>
                <div class="panel-body">

                    <a href="/incident-declaration" class="btn btn-danger btn-block">
                        <i class="glyphicon glyphicon-plus"></i>
                        Déclarer un incident
                    </a>

                    <hr>

                    <a href="/incident-list" class="btn btn-default btn-block">
                        <i class="glyphicon glyphicon-list"></i>
                        Voir tous mes incidents
                    </a>

                    <hr>

                    <a href="/profile" class="btn btn-info btn-block">
                        <i class="glyphicon glyphicon-user"></i>
                        Mon profil
                    </a>

                    <hr>

                    <a href="/logout" class="btn btn-danger btn-block">
                        <i class="glyphicon glyphicon-log-out"></i>
                        Déconnexion
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>
