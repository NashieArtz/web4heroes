<section class="vh-100 d-flex align-items-center justify-content-center border-top border-bottom border-secondary">

    <div class="card bg-dark bg-opacity-75 text-white p-4 shadow-lg border-0 rounded-4 w-100 mx-3" style="max-width: 450px;">

        <div class="card-body p-4">
            <h2 class="text-center mb-5 fw-normal">Citoyen/Super héros</h2>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger border-0 bg-danger bg-opacity-25 text-white small text-center rounded-pill mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="/login" method="POST">
                <div class="mb-3">
                    <input type="text"
                           name="pseudo"
                           class="form-control form-control-lg rounded-pill border-0 text-center shadow-sm"
                           placeholder="Pseudo/Mail"
                           required>
                </div>

                <div class="mb-2">
                    <input type="password"
                           name="password"
                           class="form-control form-control-lg rounded-pill border-0 text-center shadow-sm"
                           placeholder="Mot de passe"
                           required>
                </div>

                <div class="text-center mb-4">
                    <a href="forgotten-pwd" class="text-white-50 text-decoration-none small">
                        Mot de passe oublié ?
                    </a>
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm">
                        Connecter <i class="bi bi-arrow-right-circle-fill ms-2"></i>
                    </button>
                </div>
            </form>

            <div class="text-center mt-3 small text-white-50">
                Vous n'avez pas de compte ?
                <a href="register" class="text-white fw-bold text-decoration-none ms-1">Inscription</a>
            </div>
        </div>
    </div>
</section>
