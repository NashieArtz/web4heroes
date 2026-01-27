
<?php if (!empty($errors)) : ?>
    <div style="color:red;">
        <?php foreach ($errors as $error) : ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<section class="vh-100 d-flex align-items-center">
    <div class="container">
        <div >
            <div >
                <div >
                    <div>

                        <h2 >Citoyen / Super héros</h2>

                        <?php if (isset($error)): ?>
                            <div >
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <form id="loginForm" action="login" method="POST">
                            <div id="responseMessage" ></div>

                            <div>
                                <input type="text"
                                       name="user-email"
                                       placeholder="Pseudo / Mail"
                                       required>
                            </div>

                            <div>
                                <input type="password"
                                       name="pwd"
                                       placeholder="Mot de passe"
                                       required>
                            </div>

                            <div>
                                <a href="forgotten-pwd" >
                                    Mot de passe oublié ?
                                </a>
                            </div>

                            <div >
                                <button type="submit" >
                                    Se connecter <i></i>
                                </button>
                            </div>
                        </form>

                        <div>
                            <span>Vous n'avez pas de compte ?</span>
                            <a href="register" >Inscription</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
