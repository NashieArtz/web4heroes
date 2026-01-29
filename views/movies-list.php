<div class="container" style="margin-top: 30px;">
    <h1 class="text-center" style="margin-bottom: 30px;">Liste des films disponibles</h1>

    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-5 col-sm-12" style="margin-bottom: 10px;">
            <form method="GET">
                <select name="filter" class="form-control">
                    <option value="">Tous les genres</option>
                    <option value="fantésie">Fantésie</option>
                    <option value="Drame">Drame</option>
                    <option value="Braquage">Braquage</option>
                    <option value="Comédie">Comédie</option>
                    <option value="aventure">Aventure</option>
                </select>
            </form>
        </div>

        <div class="col-md-7 col-sm-12">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par nom de film...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-search"></i> Rechercher
                    </button>
                </span>
            </div>
        </div>
    </div>

        <div class="row" style="display: flex; flex-wrap: wrap;">

            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                    <img src="https://placehold.co/300x450/111927/white?text=Batman" alt="Batman">
                    <div class="caption">
                        <h4>The Dark Knight</h4>
                        <p>Description duu film</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="glyphicon glyphicon-edit"></i> Modifier
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="glyphicon glyphicon-trash"></i> Supprimer
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                    <img src="https://placehold.co/300x450/0090FF/white?text=Superman" alt="Superman">
                    <div class="caption">
                        <h4>Man of Steel</h4>
                        <p>Description du film</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="glyphicon glyphicon-edit"></i> Modifier
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="glyphicon glyphicon-trash"></i> Supprimer
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
