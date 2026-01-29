<section class="container-register">
    <div class="row-register">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h2 class="panel-title" style="margin: 0;">Inscription - HEROS SOS</h2>
            </div>

            <div class="panel-body registerForm">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Erreur(s) d'inscription :</strong>
                        <ul style="margin-bottom: 0; padding-left: 20px;">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="register" method="POST">
                    <h4 class="page-header">Informations personnelles</h4>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lastname" placeholder="Nom" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="firstname" placeholder="Prénom" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date de naissance <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="birthdate" required>
                    </div>

                    <h4 class="page-header">Informations complémentaires</h4>
                    <div class="form-group">
                        <label>N° de portable <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" name="phone" placeholder="06..." required>
                    </div>

                    <h4 class="page-header">Coordonnées</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>N°</label>
                                <input type="text" class="form-control" name="address-number" placeholder="12 bis">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Rue / Voie</label>
                                <input type="text" class="form-control" name="address-street" placeholder="Boulevard Gambetta">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ville <span class="text-danger">*</span></label>
                                <select name="address-city" class="form-control" required>
                                    <option value="">Sélectionnez une ville</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= $city['id']; ?>"><?= htmlspecialchars($city['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Code Postal</label>
                                <input type="text" class="form-control" name="address-postal_code" placeholder="76000">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pays <span class="text-danger">*</span></label>
                        <select name="address-country" class="form-control" required>
                            <?php foreach ($countries as $country): ?>
                                <option value="<?= $country['id']; ?>" <?= ($country['name'] === 'France') ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($country['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <h4 class="page-header">Sécurité</h4>
                    <div class="form-group">
                        <label>E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="pwd" minlength="6" required>
                                <small class="text-muted">Min. 6 caractères</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirmation <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="pwd_confirm" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <button type="submit" class="btn-register">
                            M'inscrire <i class="glyphicon glyphicon-ok"></i>
                        </button>
                    </div>

                    <p class="text-center">
                        Déjà inscrit ? <a href="/login" class="text-decoration-none">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
