<div class="container">
    <h1 class="text-center" style="margin-top: 20px; margin-bottom: 30px;">Tableau de bord Admin</h1>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
            <div class="panel panel-default" style="margin-bottom: 0;">
                <div class="panel-body text-center">
                    <small class="text-muted" style="display: block; text-transform: uppercase;">Total Utilisateurs</small>
                    <h3 style="margin: 10px 0; font-weight: bold;"><?= $totalUsers ?></h3>
                    <i class="glyphicon glyphicon-user" style="font-size: 24px; color: #337ab7;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
            <div class="panel panel-danger" style="margin-bottom: 0;">
                <div class="panel-body text-center">
                    <small class="text-muted" style="display: block; text-transform: uppercase;">Héros en attente</small>
                    <h3 style="margin: 10px 0; font-weight: bold;"><?= $pendingHeroes ?></h3>
                    <span class="label label-danger"><?= $pendingHeroes ?> Nouveaux</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
            <div class="panel panel-warning" style="margin-bottom: 0;">
                <div class="panel-body text-center">
                    <small class="text-muted" style="display: block; text-transform: uppercase;">Incidents actifs</small>
                    <h3 style="margin: 10px 0; font-weight: bold;"><?= $activeIncidents ?></h3>
                    <span class="label label-warning"><?= $activeIncidents ?> En cours</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
            <div class="panel panel-default" style="margin-bottom: 0;">
                <div class="panel-body text-center">
                    <small class="text-muted" style="display: block; text-transform: uppercase;">Abonnés News.</small>
                    <h3 style="margin: 10px 0; font-weight: bold;"><?= $totalReports ?></h3>
                    <i class="glyphicon glyphicon-bullhorn" style="font-size: 24px; color: #5bc0de;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="font-weight: bold;">Derniers Incidents</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" style="margin-bottom: 0;">
                        <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Incident</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($activites as $act): ?>
                            <tr>
                                <td><?= htmlspecialchars($act['firstname']) ?></td>
                                <td><?= htmlspecialchars($act['action']) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($act['date'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Actions Rapides</h3>
                </div>
                <div class="panel-body">
                    <a href="Valider_heros.php" class="btn btn-primary btn-block">
                        <i class="glyphicon glyphicon-ok-circle"></i> Valider Héros
                    </a>
                    <hr style="margin: 10px 0;">
                    <a href="gerer_incidents.php" class="btn btn-primary btn-block">
                        <i class="glyphicon glyphicon-exclamation-sign"></i> Gérer les incidents
                    </a>
                    <hr style="margin: 10px 0;">
                    <a href="#" class="btn btn-info btn-block">
                        <i class="glyphicon glyphicon-envelope"></i> Envoyer Newsletter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
