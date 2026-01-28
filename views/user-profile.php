<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <div class="profile-avatar" style="margin-bottom: 20px;">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=<?= $userFirstName ?>"
                             alt="Avatar" class="img-circle img-responsive"
                             style="width: 150px; margin: 0 auto; border: 5px solid #d9534f;">
                    </div>
                    <h3><?= $userInfo['firstname'] ?></h3>
                    <h3><?= $userInfo['lastname'] ?></h3>
                    <p class="text-muted text-uppercase">
                        <strong>Rang :</strong>
                        <span class="label label-danger"><?= htmlspecialchars($userRole ?? 'Citoyen') ?></span>
                    </p>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <strong>Incidents</strong><br>
                            <span class="badge"><?= count($userOpenedIncidents ?? []) ?></span>
                        </div>
                        <div class="col-xs-6">
                            <strong>Résolus</strong><br>
                            <span class="badge" style="background-color: #5cb85c;">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Informations Personnelles</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td><strong>Prénom :</strong></td>
                            <td><?= $userInfo['firstname'] ?? 'Non renseigné'?></td>
                        </tr>
                        <tr>
                            <td><strong>Nom :</strong></td>
                            <td><?= $userInfo['lastname'] ?? 'Non renseigné' ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email :</strong></td>
                            <td><?= $userInfo['email'] ?? 'Non disponible' ?></td>
                        </tr>
                        <tr>
                            <td><strong>Adresse principale :</strong></td>
                            <td>
                                <i class="glyphicon glyphicon-map-marker text-danger"></i>
                                <?= htmlspecialchars($userAddress['full_address'] ?? 'Aucune adresse enregistrée') ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-right">
                        <a href="/user-profile-edit" class="btn btn-warning">
                            <i class="glyphicon glyphicon-edit"></i> Modifier mon profil
                        </a>
                        <a href="/user-dashboard" class="btn btn-default">Retour au Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
