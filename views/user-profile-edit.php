<div class="container">
    <h2>Modifier mon profil</h2>
    <hr>



    <form action="/user-profile-edit" method="POST">
        <?php if ($userRole === 'hero'): ?>
            <div class="form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" class="form-control"
                       value="<?= htmlspecialchars($userInfo['username'] ?? '') ?>" placeholder="<?=$userInfo['username']?>">
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>Prénom</label>
                <input type="text" name="firstname" class="form-control"
                       value="<?= htmlspecialchars($userInfo['firstname'] ?? '') ?>"
                       placeholder="<?=$userInfo['firstname']?>" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>Nom</label>
                <input type="text" name="lastname" class="form-control"
                       value="<?= htmlspecialchars($userInfo['lastname'] ?? '') ?>"
                       placeholder="<?=$userInfo['lastname']?>" required>
            </div>
        </div>

        <div class="form-group">
            <label>Email (Modification soumise à validation admin)</label>

            <input type="email" name="email" class="form-control"
                   value="<?= htmlspecialchars($userInfo['email']) ?>" readonly>
            <small class="text-muted">Contactez le support pour changer votre adresse mail.</small>
        </div>

        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="phone" class="form-control"
                   value="<?= htmlspecialchars($userInfo['phone'] ?? '') ?>"
                   placeholder="<?=$userInfo['phone']?>">
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>Genre</label>
                <select name="gender" class="form-control">
                    <option value="Male" <?= ($userInfo['gender'] ?? '') === 'Male' ? 'selected' : '' ?>>Homme</option>
                    <option value="Female" <?= ($userInfo['gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Femme</option>
                    <option value="Other" <?= ($userInfo['gender'] ?? '') === 'Other' ? 'selected' : '' ?>>Autre</option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label>Date de naissance</label>
                <input type="date" name="birthdate" class="form-control" value="<?= $userInfo['birthdate'] ?? '' ?>">
            </div>
        </div>

        <h4 style="margin-top: 25px;">Adresse</h4>
        <div class="row">
            <div class="col-xs-3 form-group">
                <label>N°</label>
                <input type="text" name="address-number" class="form-control"
                       value="<?= htmlspecialchars($address['number'] ?? '') ?>"
                       placeholder="<?=$address['number'] ?? ''?>">
            </div>
            <div class="col-xs-9 form-group">
                <label>Rue</label>
                <input type="text" name="address-street" class="form-control"
                       value="<?= htmlspecialchars($address['street'] ?? '') ?>"
                       placeholder="<?=$address['street'] ?? ''?>">
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
            <a href="/user-profile" class="btn btn-default">Annuler</a>
        </div>
    </form>
</div>
