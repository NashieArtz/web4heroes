<div class="container" style="margin-top: 30px;">
    <h1 class="text-center" style="margin-bottom: 30px;">Liste des Héros</h1>

    <div class="heroes-container">
        <div class="form-group">
            <div class="input-group" style="width: 100%; max-width: 600px; margin: 0 auto 40px auto;">
                <input type="text" name="search" class="form-control"
                       placeholder="Rechercher par nom (ex: Batman, Superman...)"
                       value="">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-search"></i> Rechercher
                    </button>
                </span>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                <div class="panel panel-default hero-card" style="overflow: hidden; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=Batman"
                         alt="Batman"
                         style="width: 100%; height: 200px; object-fit: cover; background: #111927;">
                    <div class="panel-body hero-body">
                        <h4 style="font-weight: bold;">Batman</h4>
                        <p class="text-muted" style="height: 60px; overflow: hidden;">Protège les rues de Gotham et Rouen avec ses gadgets high-tech...</p>
                        <hr>
                        <span class="label label-success" style="padding: 5px 10px;">Actif</span>
                        <a href="/hero-profile" class="btn btn-link pull-right">Voir le profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                <div class="panel panel-default hero-card" style="overflow: hidden; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=Superman"
                         alt="Superman"
                         style="width: 100%; height: 200px; object-fit: cover; background: #111927;">
                    <div class="panel-body hero-body">
                        <h4 style="font-weight: bold;">Superman</h4>
                        <p class="text-muted" style="height: 60px; overflow: hidden;">L'homme d'acier. Force surhumaine et vol pour des interventions rapides.</p>
                        <hr>
                        <span class="label label-success" style="padding: 5px 10px;">Actif</span>
                        <a href="/hero-profile" class="btn btn-link pull-right">Voir le profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                <div class="panel panel-default hero-card hero-disabled" style="overflow: hidden; border-radius: 10px; opacity: 0.7; filter: grayscale(100%);">
                    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=Pending"
                         alt="Nouveau Héro"
                         style="width: 100%; height: 200px; object-fit: cover; background: #ddd;">
                    <div class="panel-body hero-body">
                        <h4 style="font-weight: bold;">Mystère</h4>
                        <p class="text-muted" style="height: 60px; overflow: hidden;">Profil en cours de validation par l'administration de Rouen.</p>
                        <hr>
                        <span class="label label-default" style="padding: 5px 10px;">Inactif</span>
                        <span class="text-muted pull-right" style="font-size: 11px; margin-top: 5px;">En attente</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
