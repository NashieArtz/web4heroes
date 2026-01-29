<section class="bg-primary" style="padding: 40px 0; border-bottom: 5px solid #0d2a4d; margin-bottom: 30px; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <h1 style="font-weight: bold; margin-bottom: 10px;">Annuaire des Villains</h1>
                <p class="lead" style="opacity: 0.9;">Consultez la liste des menaces identifiées et signalez les suspects</p>
            </div>
            <div class="col-sm-4 hidden-xs text-center">
                <i class="glyphicon glyphicon-warning-sign" style="font-size: 60px;"></i>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-7 col-sm-12" style="margin-bottom: 15px;">
            <form method="GET" class="form-inline">
                <div class="input-group" style="width: 100%;">
                    <input type="text" name="search" class="form-control"
                           placeholder="Rechercher par nom, email ou pouvoir..."
                           value="">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-search"></i> Rechercher
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-5 col-sm-12">
            <form method="GET">
                <select name="filter" class="form-control">
                    <option value="">Tous les pouvoirs</option>
                    <option value="fire">Force du feu</option>
                    <option value="water">Force de l'eau</option>
                    <option value="light">Force de lumière</option>
                    <option value="dark">Force du noire</option>
                    <option value="sand">Force du sable</option>
                </select>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <p class="text-muted">
                <i class="glyphicon glyphicon-info-sign"></i>
                <strong>3</strong> villain(s) trouvé(s)
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
            <div class="thumbnail text-center" style="border: 2px solid #a94442; padding: 20px; min-height: 280px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <div style="margin-bottom: 15px;">
                    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=Joker" alt="Joker" style="width: 60px; height: 60px;">
                </div>
                <div class="caption">
                    <h4 style="font-weight: bold;">Le Joker</h4>
                    <p><span class="label label-warning" style="font-size: 12px;">Force du noire</span></p>
                    <button class="btn btn-danger btn-block">Signaler
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
            <div class="thumbnail text-center" style="border: 2px solid #a94442; padding: 20px; min-height: 280px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <div style="margin-bottom: 15px;">
                    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=Herobrine" alt="Herobrine" style="width: 60px; height: 60px;">
                </div>
                <div class="caption">
                    <h4 style="font-weight: bold;">Herobrine</h4>
                    <p><span class="label label-warning" style="font-size: 12px;">Force de lumière</span></p>
                    <button class="btn btn-danger btn-block">Signaler
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
            <div class="thumbnail text-center" style="border: 2px solid #a94442; padding: 20px; min-height: 280px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <div style="margin-bottom: 15px;">
                    <img src="https://api.dicebear.com/7.x/identicon/svg?seed=Sandman" alt="Sandman" style="width: 60px; height: 60px;">
                </div>
                <div class="caption">
                    <h4 style="font-weight: bold;">Sandman</h4>
                    <p><span class="label label-warning" style="font-size: 12px;">Force du sable</span></p>
                    <button class="btn btn-danger btn-block"> Signaler
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
