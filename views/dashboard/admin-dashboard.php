<div class="container">
    <h1 class="text-center" style="margin-top:20px; margin-bottom:30px;">
        Tableau de bord Administrateur
    </h1>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Utilisateurs</small>
                    <h3><strong><?= (int)$totalUsers ?></strong></h3>
                    <i class="glyphicon glyphicon-user text-primary" style="font-size:24px;"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-danger">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Héros en attente</small>
                    <h3><strong><?= (int)$pendingHeroes ?></strong></h3>
                    <span class="label label-danger">
                        <?= (int)$pendingHeroes ?> à valider
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-warning">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Incidents ouverts</small>
                    <h3><strong><?= (int)$activeIncidents ?></strong></h3>
                    <span class="label label-warning">
                        <?= (int)$activeIncidents ?> en cours
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-info">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Abonnés newsletter</small>
                    <h3><strong><?= (int)$totalReports ?></strong></h3>
                    <i class="glyphicon glyphicon-bullhorn" style="font-size:24px;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Derniers incidents déclarés</strong>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Titre de l’incident</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($activites)): ?>
                            <?php foreach ($activites as $act): ?>
                                <tr>
                                    <td><?= htmlspecialchars($act['firstname']) ?></td>
                                    <td><?= htmlspecialchars($act['title']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($act['date'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    Aucun incident récent
                                </td>
                            </tr>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>Actions rapides</strong>
                </div>
                <div class="panel-body">

                    <a href="/admin/heroes/pending" class="btn btn-primary btn-block">
                        <i class="glyphicon glyphicon-ok-circle"></i>
                        Valider les héros
                    </a>

                    <hr>

                    <a href="/admin/incidents" class="btn btn-primary btn-block">
                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                        Gérer les incidents
                    </a>

                    <hr>

                    <a href="/admin/newsletter" class="btn btn-info btn-block">
                        <i class="glyphicon glyphicon-envelope"></i>
                        Envoyer une newsletter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
