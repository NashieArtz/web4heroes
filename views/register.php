<section>
    <div >
        <div>
            <div >
                <div >
                    <div >
                        <h2>Inscription - HEROS SOS</h2>
                    </div>

                    <div>
                        <?php if (!empty($errors)): ?>
                            <div>
                                <strong>Erreur(s)d'inscription :</strong>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button"></button>
                            </div>
                        <?php endif; ?>

                        <form action="register" method="POST">
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

                            <div>
                                <div >
                                    <label>Nom <span>*</span></label>
                                    <input type="text" name="lastname"  placeholder="Nom" required>
                                </div>
                                <div >
                                    <label >Prénom <span >*</span></label>
                                    <input type="text" name="firstname"  placeholder="Prénom" required>
                                </div>
                            </div>

                            <div >
                                <div>
                                    <label >Date de naissance <span >*</span></label>
                                    <input type="date" name="birthdate"  required>
                                </div>
                            </div>

                            <h4>Informations complémentaires</h4>
                            <div>
                                <div >
                                    <label >N° de portable <span >*</span></label>
                                    <input type="tel" name="phone"  placeholder="06..." required>
                                </div>
                            </div>

                            <h4>Coordonnées</h4>

                            <div>
                                <label>Nom de rue</label>
                                <input type="text" name="street" placeholder="5 Boulevard Gambetta">
                            </div>

                            <div >
                                <div>
                                    <label >Ville</label>
                                    <input type="text" name="city"  placeholder="Ville">
                                </div>
                                <div>
                                    <label >Code Postal</label>
                                    <input type="text" name="postal_code"  placeholder="76000">
                                </div>
                            </div>

                            <div >
                                <div >
                                    <label >Pays</label>
                                    <select name="country" >
                                        <option value="France">France</option>
                                        <option value="Belgique">Belgique</option>
                                    </select>
                                </div>
                            </div>

                            <h4 >Sécurité</h4>
                            <div >
                                <div>
                                    <label>E-mail <span >*</span></label>
                                    <input type="email" name="email"  required>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <label >Mot de passe <span >*</span></label>
                                    <input type="password" name="pwd"  minlength="6" required>
                                    <small >Min. 6 caractères</small>
                                </div>
                                <div >
                                    <label >Confirmation <span >*</span></label>
                                    <input type="password" name="pwd_confirm" required>
                                </div>
                            </div>

                            <div>
                                <button type="submit" >
                                    M'inscrire
                                </button>
                            </div>

                            <p>
                                Déjà inscrit ? <a href="login.php">Se connecter</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
