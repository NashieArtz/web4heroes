<section class="container-create py-5">
    <div class="container">
        <h1 class="text-center mb-4 form-label">Déclarer un incident</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card-create shadow">
                    <div class="card-body p-4">

                        <h2 class="mb-4 text-center form-label">Signaler un incident</h2>

                        <form action="/incident-create" method="POST" class="row g-4">
                            <div class="col-12 col-md-6">
                                <h3 class="mb-4 text-center form-label">Information</h3>

                                <div class="mb-3">
                                    <label class="form-label" for="incident-title">Titre de l'incident</label>
                                    <input type="text" class="form-control" name="incident-title" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="incident-description">Description de l'incident</label>
                                    <textarea class="form-control" name="incident-description" id="incident-description" rows="5"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="incident-type">Type de l'incident</label>
                                    <select class="form-control" name="incident-type" id="incident-type" required>
                                        <?php foreach ($incidentTypes as $incidentType): ?>
                                            <option value="<?= $incidentType ?>"><?= $typeTranslations[$incidentType] ?? $incidentType ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="incident-villain">Vilain sur place</label>
                                    <select class="form-control" name="incident-villain" id="incident-villain">
                                        <?php foreach ($villains as $villain): ?>
                                            <option value="<?= $villain['id']; ?>"><?= $villain['alias'] ?></option>
                                        <?php endforeach; ?>
                                        <option value="no-villain">Vilain Inconnu</option>
                                    </select>
                                    <div id="incident-villain-new-div" class="mt-2">
                                        <label class="form-label" for="incident-villain-new">Si non figurant dans la liste</label>
                                        <input class="form-control" type="text" name="incident-villain-new">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <h3 class="mb-4 text-center form-label">Adresse</h3>

                                <div class="mb-3">
                                    <label class="form-label" for="address-number">Numéro</label>
                                    <input class="form-control" type="text" name="address-number">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="address-complement">Complément</label>
                                    <input class="form-control" type="text" name="address-complement">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="address-street">Rue</label>
                                    <input class="form-control" type="text" name="address-street">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="address-postal_code">Code Postal</label>
                                    <input class="form-control" type="text" name="address-postal_code">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="address-country">Pays</label>
                                    <select class="form-control" name="address-country" id="address-country" required>
                                        <?php foreach ($countries as $country): ?>
                                            <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="address-city">Ville</label>
                                    <select class="form-control" name="address-city" id="address-city" required>
                                        <?php foreach ($cities as $city): ?>
                                            <option value="<?= $city['id']; ?>"><?= $city['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 d-grid mt-4">
                                <button type="submit" class="btn btn-danger btn-lg">
                                    Soumettre
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
