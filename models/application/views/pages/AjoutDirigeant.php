<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ajout d'un nouveau Dirigeant</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-7">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Dirigeant</h5>
                        <form action="<?php echo site_url(); ?>Dirigeants/ajoutUnNouveauDirigeant" method="post">
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input name="date" type="date" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input name="nom" type="text" class="form-control" placeholder="Ton nom ..." required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Prenom</label>
                                <div class="col-sm-10">
                                    <input name="prenom" type="text" class="form-control" placeholder="Ton Prenom ..." required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" placeholder="Ton Email ..." required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Mot de passe</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" placeholder="Ton Mot de passe ..." required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-15">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
    $this->load->view("pages/templates/footer");
?>