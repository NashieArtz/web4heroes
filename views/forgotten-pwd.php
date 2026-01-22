<h1>Réinitialiser le mot de passe</h1>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if (isset($success)): ?>
    <p style="color: green;">Un lien a été envoyé par email pour réinitialiser votre mot de passe.</p>
<?php endif; ?>

<form action="forgotten-pwd" method="POST">
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>

    <button type="submit">Envoyer le lien</button>
</form>

<p>
    <a href="login">Retour à la connexion</a>
</p>
