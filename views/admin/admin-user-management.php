<section>
<h1 class="mb-4">Gestion des Utilisateurs</h1>
            <?php if ($message && $messageType === 'success'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo htmlspecialchars($message); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" class="row g-2">
                        <div class="col-12 col-md-9">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Rechercher par nom ou email..."
                                   value="<?php echo htmlspecialchars($search); ?>">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-2"></i> Rechercher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (count($users) > 0): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="text-muted small"><?php echo $user['id']; ?></td>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($user['name']); ?></td>
                                    <td class="text-muted small"><?php echo htmlspecialchars($user['email']); ?></td>
                                    <td>
                                        <?php
                                        $role = $user['role'];
                                        if ($role === 'Citoyen') {
                                            $badgeClass = 'bg-primary';
                                        } elseif ($role === 'Héros') {
                                            $badgeClass = 'bg-warning';
                                        } else {
                                            $badgeClass = 'bg-danger';
                                        }
                                        ?>
                                        <span class="badge <?php echo $badgeClass; ?>">
                                                <?php echo htmlspecialchars($role); ?>
                                            </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button class="btn btn-sm btn-info text-white"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal"
                                                    onclick="openEditModal(<?php echo $user['id']; ?>, '<?php echo htmlspecialchars($user['name']); ?>', '<?php echo $user['role']; ?>')">
                                                <i class="fas fa-edit"></i> Modifier
                                            </button>
                                            <form method="POST" class="d-inline"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir bannir cet utilisateur?');">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-ban"></i> Bannir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-search"></i> Aucun utilisateur trouvé
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <nav class="mt-4" aria-label="pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
            </nav>
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i> Modifier l'utilisateur
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="user_id" id="userId">

                    <div class="mb-3">
                        <label for="userName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="userName" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="userRole" class="form-label">Rôle</label>
                        <select class="form-select" name="role" id="userRole" required>
                            <option value="">Sélectionner un rôle</option>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
