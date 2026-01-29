<div class="container-fluid">
    <div class="row">
        <section class="col-12 col-lg-10 offset-lg-1 p-4">
            <div class="card mb-4">
                <div class="card-body bg-dark text-white">
                    <h4 class="mb-1">
                         En cours
                    </h4>
                    <small>
                        Signalé le 2026-01-28 à 18:34:05 ?>
                    </small>
                    <p class="mt-2 mb-0">
                        Notre équipe de modérateurs examine votre signalement.
                        Un super-héros interviendra dès que possible
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card mb-3">
                        <div class="card-header"> Localisation</div>
                        <div class="card-body">
                            <p><strong>Description :</strong><br>Gros méchant sur le pavé</p>
                            <p><strong>Lieu : 33 Rue de l'inconnu, 30003, Paris, France</strong><br></p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header"> Type d’incident</div>
                        <div class="card-body">
                            <p>Attaque de Vilain</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"> Photos</div>
                        <div class="card-body d-flex gap-2 flex-wrap">
                            <?php if (!empty($photos)): ?>
                                <?php foreach ($photos as $photo): ?>
                                    <img
                                            src="https://placehold.co/600x400/cc0000/white?text=INCIDENT+SIGNALÉ"
                                            class="rounded"
                                            style="width:60px;height:60px;object-fit:cover"
                                            alt="Photo incident"
                                    >
                                <?php endforeach; ?>
                            <?php else: ?>
                                <small class="text-muted">Aucune photo</small>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-8">
                    <div class="card mb-3">
                        <div class="card-header"> Description</div>
                        <div class="card-body">
                            <p><?= nl2br(htmlspecialchars($incident['description'])) ?></p>
                            <small class="text-muted">
                                Signalement par Jean Paul Louviers
                            </small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"> Historique</div>
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>2026-01-19 à 19:25:28</strong>
                                    — Herobrine apparu vers Main Street ?>
                                </li>
                        </ul>
                    </div>

                </div>
            </div>

        </section>

    </div>
</div>
