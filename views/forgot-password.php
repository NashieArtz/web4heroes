<div class="container" style="max-width: 500px; margin-top: 50px;">
    <h1 class="text-center">Mot de passe oublié</h1>
    <hr>

    <p class="text-muted">
        Entrez votre adresse email ci-dessous. Nous vous enverrons un lien pour créer un nouveau mot de passe.
    </p>

    <form method="POST" action="forgot-password" id="forgot_form">
        <div class="form-group">
            <label for="email">Votre adresse email :</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="exemple@web4heroes.com" required>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" id="submit_forgot" class="btn btn-danger btn-block">
                Réinitialiser le mot de passe
            </button>
        </div>
    </form>

    <div class="text-center" style="margin-top: 20px;">
        <a href="/login">Retour à la connexion</a>
    </div>
</div>
