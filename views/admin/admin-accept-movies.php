<section >
    <div>
        <nav >
            <ol>
                <li >
                    <a href="#">Web 4 Heroes</a>
                </li>
                <li >
                    <a href="#">Admin</a>
                </li>
                <li >
                    Validation des films
                </li>
            </ol>
        </nav>

        <h1 >Validation des Films</h1>

        <div>
            <div>

                <div >
                    <div>

                        <h2 class="h4 mb-3">Films en attente</h2>

                        <div >
                            <table >

                                <thead >
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
                                            <div></div>
                                        </td>
                                        <td><?= htmlspecialchars($film['titre']) ?></td>
                                        <td><?= htmlspecialchars($film['heros']) ?></td>
                                        <td><?= htmlspecialchars($film['date']) ?></td>
                                        <td>
                                            <span >
                                                En attente
                                            </span>
                                        </td>
                                        <td >
                                            <button>
                                                Valider
                                            </button>
                                            <button >
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
            <div>

                <div>
                    <div>

                        <h2>Statistiques</h2>

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
