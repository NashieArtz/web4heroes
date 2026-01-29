<section class="home-container">
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="fw-bold ">Votre Sécurité, Notre Mission</h1>
            <p>Rejoignez la communauté et signalez les incidents en temps réel.</p>
            <button class="btn-register  fs-3 rounded-pill px-4">
                <a href="/incident-create" class="">Signaler un incident</a>
            </button>
        </div>
    </section>
    <section class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card-hero">
                    <h4 class="small">Signaler</h4>
                    <p class="small">Informez-nous des dangers pour une intervention rapide.</p>
                    <a href="/incident-create" class="text-danger"><strong> > </strong></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-hero">
                    <h4 class="small">Suivre</h4>
                    <p class="small">Restez informé de l'état des incidents près de chez vous.</p>
                    <a href="/incident-list" class="text-danger"><strong> > </strong></a>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card-hero w-100">
                    <h4 class="small">Héros</h4>
                    <p class="small">Découvrez nos héros et leurs actions pour la ville.</p>

                    <a href="/heroes-list" class="text-danger mt-auto"><strong> > </strong>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="container text-center mb-5">
        <h2 class="mb-4">Incidents</h2>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        <div class="rounded text-white d-flex flex-column justify-content-between p-4"
                             style="width: 400px; min-height: 300px;
                                background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/public/assets/img/incident-haute.png') center/cover;">

                            <p class="text-start small fw-bold">HAUTE</p>

                            <div class="py-5">
                                <h3 class="h4 m-0">Lieu de l'incident</h3>
                            </div>

                            <a class="btn-register" href="incident-list">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <div class="rounded text-white d-flex flex-column justify-content-between p-4"
                             style="width: 400px; min-height: 300px;
                                background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/public/assets/img/incident-moyenne.png') center/cover;">

                            <p class="text-start small fw-bold">MOYENNE</p>

                            <div class="py-5">
                                <h3 class="h4 m-0">Autre Lieu</h3>
                            </div>
                            <a class="btn-register" href="incident-list">Voir plus</a>>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <div class="rounded text-white d-flex flex-column justify-content-between p-4"
                             style="width: 400px; min-height: 300px;
                                background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/public/assets/img/incident-basse.png') center/cover;">

                            <p class="text-start small fw-bold">BASSE</p>

                            <div class="py-5">
                                <h3 class="h4 m-0">Autre Lieu</h3>
                            </div>
                            <a class="btn-register" href="incident-list">Voir plus</a>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </section>
</section>
