<div class="container">
    <h1 class="text-center" style="margin-top:20px; margin-bottom:30px;">
        Tableau de bord Héros
    </h1>
    <div class="row">
        <div class="col-xs-12 text-center" style="margin-bottom:20px;">
            <?php if (($hero['is_active'] ?? 0) == 1): ?>
                <span class="label label-success" style="font-size:16px;">
                    Héros actif et opérationnel
                </span>
            <?php else: ?>
                <span class="label label-warning" style="font-size:16px;">
                    En attente de validation par les modérateurs
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Incidents assignés</small>
                    <h3><strong><?= (int)$stats['assigned'] ?></strong></h3>
                    <i class="glyphicon glyphicon-warning-sign text-primary" style="font-size:26px;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-success">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Succès</small>
                    <h3><strong><?= (int)$stats['success'] ?></strong></h3>
                    <i class="glyphicon glyphicon-ok-circle" style="font-size:26px;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-danger">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Échecs</small>
                    <h3><strong><?= (int)$stats['failed'] ?></strong></h3>
                    <i class="glyphicon glyphicon-remove-circle" style="font-size:26px;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-info">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Note citoyenne</small>
                    <h3><strong><?= htmlspecialchars($stats['rating']) ?>/5</strong></h3>
                    <i class="glyphicon glyphicon-star" style="font-size:26px;"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-md-8 col-sm-12 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Mes interventions en cours</strong>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Incident</th>
                            <th>Priorité</th>
                            <th>Date</th>
                            <th>Statut</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if (!empty($interventions)): ?>
                            <?php foreach ($interventions as $i): ?>
                                <tr>
                                    <td><?= htmlspecialchars($i['title']) ?></td>
                                    <td>
                                        <?php if ($i['priority'] === 'High'): ?>
                                            <span class="label label-danger">High</span>
                                        <?php elseif ($i['priority'] === 'Mid'): ?>
                                            <span class="label label-warning">Mid</span>
                                        <?php else: ?>
                                            <span class="label label-success">Low</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= date('d/m/Y H:i', strtotime($i['date_open'])) ?></td>
                                    <td>
                                        <span class="label label-info">
                                            <?= htmlspecialchars($i['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Aucune intervention en cours
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

                    <a href="/incident-list" class="btn btn-primary btn-block">
                        <i class="glyphicon glyphicon-list"></i>
                        Voir les incidents
                    </a>

                    <hr>

                    <a href="/hero_profile/edit" class="btn btn-default btn-block">
                        <i class="glyphicon glyphicon-user"></i>
                        Modifier mon profil héros
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
