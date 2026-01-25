<section class="py-4">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Web 4 Heroes</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Validation des films
                </li>
            </ol>
        </nav>

        <h1 class="mb-4">Validation des Films</h1>

        <div class="row g-4">
            <div class="col-12 col-lg-9">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="h4 mb-3">Films en attente</h2>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">

                                <thead class="table-dark">
                                <tr>
                                    <th>Affiche</th>
                                    <th>Titre</th>
                                    <th>Héros</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($films_en_attente as $film): ?>
                                    <tr>
                                        <td>
                                            <div class="bg-secondary rounded" style="width:50px;height:70px;"></div>
                                        </td>
                                        <td><?= htmlspecialchars($film['titre']) ?></td>
                                        <td><?= htmlspecialchars($film['heros']) ?></td>
                                        <td><?= htmlspecialchars($film['date']) ?></td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                En attente
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-success me-2">
                                                Valider
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                Rejeter
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-3">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="h5 mb-3">Statistiques</h2>

                        <p>
                            En attente :
                            <strong><?= count($films_en_attente) ?></strong>
                        </p>

                        <p>
                            Validés ce mois :
                            <strong>12</strong>
                        </p>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
