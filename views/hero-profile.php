<div >
    <div >
        <div>
            <div >
                <img src="<?= $hero['hero_path'] ?? '' ?>"
                     alt="Avatar">
            </div>
            <div >
                <div >
                    <div>
                        <h1 ><?= htmlspecialchars($hero['hero_name'] ?? 'Héros') ?></h1>
                        <p >
                            <i ></i>
                            <?= htmlspecialchars($hero['firstname'] ?? '-') ?>
                            <?= htmlspecialchars($hero['lastname'] ?? '-') ?>
                        </p>
                        <p >
                            <i ></i>
                            <?= htmlspecialchars($hero['email'] ?? '-') ?>
                        </p>
                    </div>
                    <a href="/edit-profile" >
                        <i></i> Personnaliser
                    </a>
                </div>
                <?php if (($hero['is_active'] ?? 0) == 1): ?>
                    <span >Héros actif</span>
                <?php else: ?>
                    <span > En attente de validation</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div >
        <div >
            <div >
                <small >Incidents gérés</small>
                <h3><?= (int)($statut['incidents'] ?? 0) ?></h3>
            </div>
        </div>
        <div >
            <div >
                <small >Interventions réussies</small>
                <h3 ><?= (int)($statut['success'] ?? 0) ?></h3>
            </div>
        </div>
        <div >
            <div >
                <small >Note citoyenne</small>
                <h3><?= $statut['rating'] ?? '—' ?>/5 <i ></i></h3>
            </div>
        </div>
    </div>
    <ul >
        <li  role="presentation">
            <button  id="profile-tab" type="button" role="tab">
                <i></i> Mon Profil
            </button>
        </li>
        <li  role="presentation">
            <button  type="button" role="tab">
                <i ></i> Incidents
            </button>
        </li>
        <li  role="presentation">
            <button  type="button" role="tab">
                <i class="bi bi-film"></i> Ma Vidéothèque
            </button>
        </li>
    </ul>
    <div >
        <div>
            <h3 ><i></i> Paramètres du Profil</h3>

            <div >
                <div>
                    <div>
                        <div>
                            <i></i> Super-Pouvoir
                        </div>
                        <div>
                            <p><?= htmlspecialchars($hero['power'] ?? 'Non précisée') ?></p>
                            <a href="/edit-profile" >Modifier</a>
                        </div>
                    </div>
                </div>

                <div >
                    <div >
                        <div>
                            <i ></i> Description
                        </div>
                        <div >
                            <?php if (!empty($hero['description'])): ?>
                                <p><?= nl2br(htmlspecialchars($hero['description'])) ?></p>
                            <?php else: ?>
                                <p>Aucune description fournie</p>
                            <?php endif; ?>
                            <a href="/edit-profile" >Modifier</a>
                        </div>
                    </div>
                </div>
            </div>

            <div >
                <i ></i>
                <strong>Conseil :</strong> Mettez à jour votre profil régulièrement pour que les citoyens puissent vous connaître et vous faire confiance.
            </div>

            <a href="edit-profile" >
                <i ></i> Personnaliser Complètement Mon Profil
            </a>
        </div>
        <div  role="tabpanel">
            <h3 ><i ></i> Mes Incidents</h3>

            <div>
                <a href="incident-declaration" >
                    <i ></i> Signaler un nouvel incident
                </a>
            </div>
            <?php if (!empty($incidents)): ?>
                <div>
                    <?php foreach ($incidents as $incident): ?>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <h5><?= htmlspecialchars($incident['title'] ?? 'Incident') ?></h5>
                                        <?php
                                        $statusClass = match($incident['status'] ?? 'pending') {
                                            'success' => 'bg-success',
                                            'in_progress' => 'bg-info',
                                            'failed' => 'bg-danger',
                                            default => 'bg-secondary'
                                        };
                                        $statusLabel = match($incident['status'] ?? 'pending') {
                                            'success' => '✓ Réussi',
                                            'in_progress' => '⟳ En cours',
                                            'failed' => '✗ Échoué',
                                            default => '⏳ En attente'
                                        };
                                        ?>
                                        <span <?= $statusClass ?>><?= $statusLabel ?></span>
                                    </div>
                                    <p><?= htmlspecialchars(substr($incident['description'] ?? '', 0, 100)) ?>...</p>

                                    <div>
                                        <small >
                                            <i ></i>
                                            <?= date('d/m/Y H:i', strtotime($incident['created_at'] ?? 'now')) ?>
                                        </small>
                                    </div>

                                    <?php if (($incident['status'] ?? 'pending') !== 'success' && ($incident['status'] ?? 'pending') !== 'failed'): ?>
                                        <div  role="group">
                                            <a href="/incident/<?= $incident['id'] ?>">
                                                <i ></i > Détails
                                            </a>
                                            <button <?= $incident['id'] ?>>
                                                <i ></i> Intervenir
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <a href="/incident/<?= $incident['id'] ?>">
                                            <i ></i> Voir Détails
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div<?= $incident['id'] ?>>
                            <div>
                                <div >
                                    <div>
                                        <h5 >Intervenir sur l'incident</h5>
                                        <button type="button" ></button>
                                    </div>
                                    <form method="POST" action="/intervene">
                                        <div class="modal-body">
                                            <input type="hidden" name="incident_id" value="<?= $incident['id'] ?>">
                                            <div >
                                                <label >État de l'intervention</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="">-- Choisir --</option>
                                                    <option value="in_progress">En cours</option>
                                                    <option value="success">Réussi</option>
                                                    <option value="failed">Échoué</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Commentaire (optionnel)</label>
                                                <textarea  name="comment" rows="3" placeholder="Décrivez votre intervention..."></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button">Annuler</button>
                                            <button type="submit">Confirmer l'intervention</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div>
                    <i></i>
                    <p >Aucun incident actuellement. Les citoyens peuvent vous en signaler un.</p>
                </div>
            <?php endif; ?>
        </div>
        <div>
            <h3 ><i></i> Ma Vidéothèque</h3>

            <div>
                <a href="/add-film" >
                    <i></i> Ajouter un film
                </a>
            </div>
            <?php if (!empty($filmography)): ?>
                <div>
                    <?php foreach ($filmography as $film): ?>
                        <div>
                            <div >
                                <img src="<?= $film['poster_url'] ?? '' ?>"
                                     alt="<?= htmlspecialchars($film['title']) ?>"
                                     >
                                <div >
                                    <h5 ><?= htmlspecialchars($film['title']) ?></h5>
                                    <p ><?= htmlspecialchars($film['year'] ?? 'Année inconnue') ?></p>
                                    <p ><?= htmlspecialchars(substr($film['description'] ?? '', 0, 80)) ?>...</p>
                                    <div >
                                        <a href="/film/<?= $film['id'] ?>">
                                            <i ></i> Voir
                                        </a>
                                        <a href="/edit-film/<?= $film['id'] ?>">
                                            <i></i> Éditer
                                        </a>
                                        <a href="/delete-film/<?= $film['id'] ?>" onclick="return confirm('Supprimer ce film ?')">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div>
                    <i></i>
                    <p class="mb-3">Votre vidéothèque est vide. Ajoutez des films qui vous mettent en vedette !</p>
                    <a href="/add-film">
                        <i ></i> Ajouter mon premier film
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
