<section class="container-login">
    <div class="container">
        <div class="row-login px-7">
            <div class="col-xs-12 col-sm-10 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="text-center">Citoyen / Super héros</h2>
                        <hr>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger text-center">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>
                        <form id="loginForm" action="login" method="POST">
                            <div id="responseMessage"></div>
                            <div class="form-group">
                                <div class="form-group py-2">
                                    <input type="text" class="form-control" name="user-email" placeholder="Pseudo / Mail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group py-2">
                                    <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <a href="forgot-password">
                                    Mot de passe oublié ?
                                </a>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn-login">
                                    Se connecter <i class="glyphicon glyphicon-log-in"></i>
                                </button>
                            </div>
                        </form>
                        <div class="text-center" style="margin-top: 15px;">
                            <span>Vous n'avez pas de compte ? </span>
                            <a href="register" style="font-weight: bold;">Inscription</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
