<div class="container">
    <h1 class="text-center" style="margin-top:20px; margin-bottom:30px;">
        Tableau de bord Héros
    </h1>

    <div class="row">
        <div class="col-xs-12 text-center" style="margin-bottom:20px;">
            <span class="label label-success" style="font-size:16px;">
                Héros actif et opérationnel
            </span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Incidents assignés</small>
                    <h3><strong>5</strong></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-success">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Succès</small>
                    <h3><strong>12</strong></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-danger">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Échecs</small>
                    <h3><strong>1</strong></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom:20px;">
            <div class="panel panel-info">
                <div class="panel-body text-center">
                    <small class="text-muted text-uppercase">Note citoyenne</small>
                    <h3><strong>4.8/5</strong></h3>
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
                        <tr>
                            <td>Attaque de robots géants</td>
                            <td><span class="label label-danger">High</span></td>
                            <td>29/01/2026 14:30</td>
                            <td><span class="label label-info">En cours</span></td>
                        </tr>
                        <tr>
                            <td>Chat coincé dans un arbre dimensionnel</td>
                            <td><span class="label label-success">Low</span></td>
                            <td>28/01/2026 09:15</td>
                            <td><span class="label label-info">En route</span></td>
                        </tr>
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
                        Voir les incidents
                    </a>

                    <hr>

                    <a href="/hero-profile-edit" class="btn btn-default btn-block">
                        Modifier mon profil héros
                    </a>

                    <hr>

                    <a href="/logout" class="btn btn-danger btn-block">
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
