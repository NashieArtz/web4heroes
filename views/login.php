<?php if (!empty($errors)) : ?>
    <div style="color:red;">
        <?php foreach ($errors as $error) : ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<section class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">Citoyen / Super héros</h2>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <form id="loginForm" action="login" method="POST">
                            <div id="responseMessage" class="mb-3"></div>

                            <div class="mb-3">
                                <input type="text"
                                       class="form-control form-control-lg rounded-pill"
                                       name="pseudo"
                                       placeholder="Pseudo / Mail"
                                       required>
                            </div>

                            <div class="mb-3">
                                <input type="password"
                                       class="form-control form-control-lg rounded-pill"
                                       name="password"
                                       placeholder="Mot de passe"
                                       required>
                            </div>

                            <div class="mb-3 text-end">
                                <a href="forgotten-pwd" class="small">
                                    Mot de passe oublié ?
                                </a>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary rounded-pill fw-bold">
                                    Se connecter <i class="bi bi-arrow-right-circle-fill ms-2"></i>
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <span>Vous n'avez pas de compte ?</span>
                            <a href="register" class="fw-bold">Inscription</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
