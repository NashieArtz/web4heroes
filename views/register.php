<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h2 class="mb-0">Inscription - HEROS SOS</h2>
                    </div>

                    <div class="card-body">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Erreur(s) d'inscription :</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>✓ Inscription réussie !</strong>
                                <p class="mb-0 mt-2">Bienvenue, <?= htmlspecialchars($username) ?></p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="/App/Controllers/AuthController" method="POST">
                            <h4 class="mb-3">Informations personnelles</h4>

                           <!-- <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">Civilité <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-select" required>
                                        <option value="">-- Sélectionner --</option>
                                        <option value="M.">M.</option>
                                        <option value="Mme">Mme</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Nom" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Prénom" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                    <input type="date" name="birthdate" class="form-control" required>
                                </div>
                            </div>

                            <h4 class="mb-3">Informations complémentaires</h4>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">N° de portable <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control" placeholder="06..." required>
                                </div>
                            </div>

                            <h4 class="mb-3">Coordonnées</h4>

                            <div class="mb-3">
                                <label class="form-label">Nom de rue</label>
                                <input type="text" name="street" class="form-control" placeholder="5 Boulevard Gambetta">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" name="ville" class="form-control" placeholder="Ville">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Code Postal</label>
                                    <input type="text" name="postal_code" class="form-control" placeholder="76000">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Pays</label>
                                    <select name="country" class="form-select">
                                        <option value="France">France</option>
                                        <option value="Belgique">Belgique</option>
                                    </select>
                                </div>
                            </div>

                            <h4 class="mb-3">Sécurité</h4>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">E-mail <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" name="pwd" class="form-control" minlength="6" required>
                                    <small class="form-text text-muted">Min. 6 caractères</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirmation <span class="text-danger">*</span></label>
                                    <input type="password" name="pwd_confirm" class="form-control" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    M'inscrire
                                </button>
                            </div>

                            <p class="text-center mt-3">
                                Déjà inscrit ? <a href="login.php">Se connecter</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
