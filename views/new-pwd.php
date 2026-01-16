<h1>Nouveau mot de passe</h1>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="#" method="POST">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">

    <div>
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" name="password" id="password" minlength="8" required>
    </div>

    <div>
        <label for="confirm_password">Confirmez le mot de passe :</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
    </div>

    <button type="submit">Mettre à jour le mot de passe</button>
</form>

<p>
    <a href="login">Annuler et revenir à la connexion</a>
</p>
