<section class="my-5" id="incident-list-h1">
    <div class="h1">Liste des Incidents</div>
</section>

<section class="my-2" id="incident-list-options">
    <div class="d-flex justify-content-center col-md-12">
        <div class="col-md-4">
            <div class="text-center col-md-12">Statut</div>
            <div class="col-md-12">DROPDOWN</div>
        </div>
        <div class="col-md-4">
            <div class="text-center  col-md-12">Priorité</div>
            <div class="col-md-12">DROPDOWN</div>
        </div>
        <div class="col-md-4">
            <div class="text-center col-md-12">Recherche</div>
            <div class="col-md-12">RESEARCH</div>
        </div>
    </div>
</section>

<section class="my-2" id="incident-list-content">
    <div class="col-md-12 col-sm-12 bd-example">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Lieu</th>
                <th scope="col">Signalé par</th>
                <th scope="col">Date</th>
                <th scope="col">Priorité</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th><span><?= $id; ?></th>
                <td><span><?= $type; ?></td>
                <td><span><?= $location; ?></td>
                <td><span><?= $username; ?></td>
                <td><span><?= $date; ?></span></td>
                <td><span class=""><?= $priority; ?></span></td>
                <td><span class=""><?= $status; ?></td>
                <td>
                    <button type="button" class="btn btn-primary"><a href="#">Détails</a></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
