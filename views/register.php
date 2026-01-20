<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-lg-10">
                <div class="card shadow">

                    <div class="card-header text-center">
                        <h2 class="mb-0">Inscription - HEROS SOS</h2>
                    </div>

                    <div class="card-body">
                        <form action="#" method="POST">
                            <h4 class="mb-3">Informations personnelles</h4>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">Civilité</label>
                                    <select name="civilite" class="form-select">
                                        <option value="M.">M.</option>
                                        <option value="Mme">Mme</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Date de naissance</label>
                                    <input type="date" name="age" class="form-control">
                                </div>
                            </div>
                            <h4 class="mb-3">Informations complémentaires</h4>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">N° de portable</label>
                                    <input type="tel" name="telephone" class="form-control" placeholder="06...">
                                </div>
                            </div>
                            <h4 class="mb-3">Coordonnées</h4>

                            <div class="mb-3">
                                <label class="form-label">Nom de rue</label>
                                <input type="text" name="rue" class="form-control" placeholder="5 Boulevard Gambetta">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Ville</label>
                                    <input type="text" name="ville" class="form-control" placeholder="Ville">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Code Postal</label>
                                    <input type="text" name="cp" class="form-control" placeholder="76000">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">Pays</label>
                                    <select name="pays" class="form-select">
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
                                    <label class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Mot de passe</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirmation</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    M'inscrire
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
