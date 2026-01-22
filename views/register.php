
<div class="container my-5">
    <div class="card shadow-lg border-0 bg-dark text-white">
        <div class="card-header bg-primary text-white text-center py-4">
            <h2>Inscription - HEROS SOS</h2>
        </div>
        <div class="card-body p-5">
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-6 border-end border-secondary">
                        <h4 class="mb-4 text-info">Informations personnelles</h4>

                        <div class="mb-3">
                            <label class="form-label">Civilité</label>
                            <select name="civilite" class="form-select">
                                <option value="M.">M.</option>
                                <option value="Mme">Mme</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Nom">
                            </div>
                            <div class="col">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="date" name="age" class="form-control">
                        </div>

                        <h4 class="mt-4 mb-3 text-info">Informations complémentaires</h4>
                        <div class="mb-3">
                            <label class="form-label">N° de portable</label>
                            <input type="tel" name="telephone" class="form-control" placeholder="06..">
                        </div>
                    </div>

                    <div class="col-md-6 ps-md-4">
                        <h4 class="mb-4 text-info">Coordonnées</h4>

                        <div class="mb-3">
                            <label class="form-label">Nom de rue</label>
                            <input type="text" name="rue" class="form-control" placeholder="5 Boulevard Gambetta">
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">
                                <label class="form-label">Ville</label>
                                <input type="text" name="ville" class="form-control" placeholder="Ville">
                            </div>
                            <div class="col-4">
                                <label class="form-label">Code Postal</label>
                                <input type="text" name="cp" class="form-control" placeholder="76000">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pays</label>
                            <select name="pays" class="form-select">
                                <option value="France">France</option>
                                <option value="Belgique">Belgique</option>
                            </select>
                        </div>

                        <h4 class="mt-4 mb-3 text-info">Sécurité</h4>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Confirmation</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-info btn-lg px-5 text-white fw-bold">M'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
