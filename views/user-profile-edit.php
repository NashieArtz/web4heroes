<div class="container">
    <h2>Modifier mon profil</h2>
    <hr>

    <form action="/user-profile-edit" method="POST">
        <div class="form-group">
            <label>Nom utilisation</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username'] ?? '') ?>">
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>Prénom</label>
                <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($user['firstname'] ?? '') ?>" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>Nom</label>
                <input type="text" name="lastname" class="form-control" value="<?= htmlspecialchars($user['lastname'] ?? '') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>Genre</label>
                <select name="gender" class="form-control">
                    <option value="Male" <?= ($user['gender'] ?? '') === 'Male' ? 'selected' : '' ?>>Homme</option>
                    <option value="Female" <?= ($user['gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Femme</option>
                    <option value="Other" <?= ($user['gender'] ?? '') === 'Other' ? 'selected' : '' ?>>Autre</option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label>Date de naissance</label>
                <input type="date" name="birthdate" class="form-control" value="<?= $user['birthdate'] ?? '' ?>">
            </div>
        </div>

        <h4 style="margin-top: 25px;">Adresse</h4>
        <div class="row">
            <div class="col-xs-3 form-group">
                <label>N°</label>
                <input type="text" name="address-number" class="form-control" value="<?= htmlspecialchars($address['number'] ?? '') ?>">
            </div>
            <div class="col-xs-9 form-group">
                <label>Rue</label>
                <input type="text" name="address-street" class="form-control" value="<?= htmlspecialchars($address['street'] ?? '') ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Ville</label>
            <select name="address-city" class="form-control">
                <?php foreach ($cities as $city): ?>
                    <option value="<?= $city['id'] ?>" <?= ($address['city_id'] ?? '') == $city['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($city['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="text-center" style="margin-top: 30px; margin-bottom: 50px;">
            <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
            <a href="/profile" class="btn btn-default">Annuler</a>
        </div>
    </form>
</div>
