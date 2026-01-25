<div class="container mt-4">
    <div class="row align-items-center mb-4">
        <div class="col-md-3 text-center mb-3">
            <img src="<?= $hero['avatar'] ?? '/assets/img/default-hero.png' ?>"
                 class="img-fluid rounded-circle shadow"
                 alt="Avatar du héros"
                 style="max-width:180px;">
        </div>

        <div class="col-md-9">
            <h1 class="fw-bold">
                <?= htmlspecialchars($hero['hero_name'] ?? 'Héros inconnu') ?>
            </h1>

            <p class="text-muted mb-1">
                Identité civile : <?= htmlspecialchars($hero['firstname'] ?? '—') ?>
            </p>
            <?php if (($hero['is_active'] ?? 0) == 1): ?>
                <span class="badge bg-success">Héros actif</span>
            <?php else: ?>
                <span class="badge bg-warning text-dark">En attente de validation</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mb-4">

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">
                    🦸 Pouvoirs
                </div>
                <div class="card-body">
                    <?php if (!empty($hero['powers'])): ?>
                        <p><?= nl2br(htmlspecialchars($hero['powers'])) ?></p>
                    <?php else: ?>
                        <p class="text-muted">Aucun pouvoir renseigné</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">
                    📍 Zone d’intervention
                </div>
                <div class="card-body">
                    <?= htmlspecialchars($hero['area'] ?? 'Non précisée') ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Description -->
    <div class="card shadow-sm mb-4">
        <div class="card-header fw-bold">
            📖 Description
        </div>
        <div class="card-body">
            <?php if (!empty($hero['description'])): ?>
                <p><?= nl2br(htmlspecialchars($hero['description'])) ?></p>
            <?php else: ?>
                <p class="text-muted">Aucune description fournie</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row text-center mb-4">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Incidents pris en charge</small>
                    <h3 class="fw-bold"><?= (int)($stats['incidents'] ?? 0) ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Interventions réussies</small>
                    <h3 class="fw-bold text-success"><?= (int)($stats['success'] ?? 0) ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Note citoyenne</small>
                    <h3 class="fw-bold"><?= $stats['rating'] ?? '—' ?>/5</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Actions -->
    <div class="row mb-5">

        <div class="col-md-6 mb-3">
            <a href="/incident-declaration?hero=<?= $hero['id'] ?? '' ?>"
               class="btn btn-danger w-100">
                🚨 Signaler un incident à ce héros
            </a>
        </div>

        <div class="col-md-6 mb-3">
            <a href="/hero-list" class="btn btn-outline-secondary w-100">
                ⬅ Retour à la liste des héros
            </a>
        </div>

    </div>

</div>

