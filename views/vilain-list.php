<section class="bg-primary" style="padding: 40px 0; border-bottom: 5px solid #0d2a4d; margin-bottom: 30px; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <h1 style="font-weight: bold; margin-bottom: 10px;">Annuaire des Villains</h1>
                <p class="lead" style="opacity: 0.9;">Consultez la liste des menaces identifiées et signalez les suspects</p>
            </div>
            <div class="col-sm-4 hidden-xs text-center">
                <i class="glyphicon glyphicon-list" style="font-size: 60px;"></i>
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
                           value="<?php echo htmlspecialchars($search); ?>">
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
                <select name="filter" class="form-control" onchange="this.form.submit()">
                    <option value="">Tous les pouvoirs</option>
                    <option value="fire" <?php echo $filter === 'fire' ? 'selected' : ''; ?>>Force du feu</option>
                    <option value="water" <?php echo $filter === 'water' ? 'selected' : ''; ?>>Force de l'eau</option>
                    <option value="light" <?php echo $filter === 'light' ? 'selected' : ''; ?>>Force de lumière</option>
                    <option value="dark" <?php echo $filter === 'dark' ? 'selected' : ''; ?>>Force du noire</option>
                    <option value="sand" <?php echo $filter === 'sand' ? 'selected' : ''; ?>>Force du sable</option>
                </select>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <p class="text-muted">
                <i class="glyphicon glyphicon-info-sign"></i>
                <strong><?php echo count($filtered_villains); ?></strong> villain(s) trouvé(s)
            </p>
        </div>
    </div>

    <div class="row">
        <?php if (count($filtered_villains) > 0): ?>
            <?php foreach ($filtered_villains as $villain): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
                    <div class="thumbnail text-center" style="border: 2px solid #a94442; padding: 20px; min-height: 280px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <div style="margin-bottom: 15px;">
                            <i class="glyphicon glyphicon-user" style="font-size: 40px; color: #a94442;"></i>
                        </div>
                        <div class="caption">
                            <h4 style="font-weight: bold;"><?php echo htmlspecialchars($villain['name']); ?></h4>
                            <p><span class="label label-warning" style="font-size: 12px;"><?php echo htmlspecialchars($villain['power']); ?></span></p>
                            <p class="small text-muted" style="word-wrap: break-word;">
                                <i class="glyphicon glyphicon-envelope"></i> <?php echo htmlspecialchars($villain['email']); ?>
                            </p>
                            <button class="btn btn-danger btn-block"
                                    onclick="setVillainData('<?php echo htmlspecialchars($villain['name']); ?>', '<?php echo $villain['id']; ?>')"
                                    data-toggle="modal"
                                    data-target="#reportModal">
                                <i class="glyphicon glyphicon-flag"></i> Signaler
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-xs-12">
                <div class="alert alert-info text-center">
                    Aucun villain trouvé pour vos critères de recherche.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
