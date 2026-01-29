<div class="container" style="margin-top: 30px;">

    <div class="well" style="background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div class="row">
            <div class="col-md-3 col-sm-4 text-center">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Batman"
                     alt="Avatar"
                     class="img-circle img-thumbnail"
                     style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="pull-right">
                    <span class="label label-success" style="font-size: 12px;">Héros Actif</span>
                </div>
                <h2 style="margin-top: 0;">Batman <small>(Bruce Wayne)</small></h2>
                <p class="lead" style="font-size: 16px; color: #666;">
                    <em>"La nuit est plus sombre juste avant l'aube. Et je vous le promets, l'aube approche."</em>
                </p>
                <hr style="margin: 10px 0;">
                <p><span class="glyphicon glyphicon-envelope"></span> bruce.wayne@waynecorp.com</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Gotham City / Rouen District</p>

                <a href="/hero-profile" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-edit"></span> Modifier les infos publiques
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-info text-center">
                <div class="panel-heading">Incidents gérés</div>
                <div class="panel-body"><h3>42</h3></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success text-center">
                <div class="panel-heading">Interventions réussies</div>
                <div class="panel-body"><h3>38</h3></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-warning text-center">
                <div class="panel-heading">Note Citoyenne</div>
                <div class="panel-body"><h3>4.8 / 5</h3></div>
            </div>
        </div>
    </div>

    <div class="nav-tabs-custom" style="margin-top: 20px;">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active col-sm-4"><a href="/user-profile" data-toggle="tab">Configuration</a></li>
            <li class="col-sm-4"><a href="/incident-list" data-toggle="tab">Journal d'interventions</a></li>
            <li class="col-sm-4"><a href="/movies-list" data-toggle="tab">Vidéothèque</a></li>
        </ul>

        <div class="tab-content" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-top: none;">

            <div class="tab-pane active" id="profile">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Super-Pouvoir</h4>
                        <div class="well well-sm">Détecteur de mensonges humain & Gadgets</div>

                        <h4>Description</h4>
                        <p class="text-justify">Expert en infiltration et en combat tactique. Utilise la peur comme outil de dissuasion contre le crime organisé.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-warning">
                            <strong>Statut :</strong> Votre compte est sous surveillance admin suite au dernier incident.
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane"
