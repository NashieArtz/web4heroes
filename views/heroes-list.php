<h1 class="mb-4 text-center">Liste des Héros</h1>
        <form class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <label class="form-label">Genre</label>
                        <select name="genre" class="form-select">
                            <option value="">Tous les genres</option>
                            <option value="action">Action</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Héros</label>
                        <select name="hero" class="form-select">
                            <option value="">Tous les héros</option>
                            <option value="spiderman">Spider-Man</option>
                        </select>
                    </div>

                </div>
            </div>
        </form>
        <div class="row g-4">
            <?php foreach ($movies as $movie): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">

                        <img
                            src=""
                            class="card-img-top"
                            alt="<?= htmlspecialchars($movie['title']) ?>">

                        <div class="card-body text-center">
                            <h5 class="card-title mb-1">
                                <?= htmlspecialchars($movie['title']) ?>
                            </h5>
                            <p class="text-muted mb-1">
                                <?= htmlspecialchars($movie['year']) ?>
                            </p>
                            <span class="badge bg-primary">
                                <?= htmlspecialchars($movie['hero']) ?>
                            </span>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
