<section class="py-5">
    <div class="container">

        <h1 class="text-center mb-4">Déclarer un incident</h1>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <h2 class="mb-4 text-center">Signaler un incident</h2>

                        <form action="#" method="POST">

                            <div class="mb-3">
                                <label for="type" class="form-label">Type d'incident</label>
                                <select name="type" id="type" class="form-select" required>
                                    <option value="">-- Sélectionner --</option>
                                    <option value="vol">Vol</option>
                                    <option value="agression">Agression</option>
                                    <option value="accident">Accident</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea
                                        name="description"
                                        id="description"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Décrivez l'incident"
                                        required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="lieu" class="form-label">Lieu</label>
                                <input
                                        type="text"
                                        name="lieu"
                                        id="lieu"
                                        class="form-control"
                                        placeholder="Lieu de l'incident"
                                        required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn-lg">
                                    Soumettre
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
