<?php
  $this->load->view("pages/templates/header");
?>
<main id="main" class="main">

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <h2><?php echo $_SESSION['nom']; ?></h2>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#entreprise">Entreprise</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dirigeant">Dirigeant</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active entreprise" id="entreprise">
                            <h5 class="card-title">Details de l'entreprise</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Date de creation</div>
                                <div class="col-lg-9 col-md-8"><?php echo $_SESSION['dateDeCreation']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nom</div>
                                <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nom']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Objet</div>
                                <div class="col-lg-9 col-md-8"><?php echo $_SESSION['objet']; ?></div>
                            </div>

                            <?php for($i=0; $i<count($listeAdresse); $i++) { 
                                if($listeAdresse[$i]['exist']==0) {
                            ?>
                            <div class="row">
                                <div class="col col-md-3"><label class=" form-control-label"><?php echo$listeAdresse[$i]['type']; ?></label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?php echo $listeAdresse[$i]['valeur']; ?></p>
                                    </div>
                                </div>
                            <?php } }  ?>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Devise Tenue du compte</div>
                                <div class="col-lg-9 col-md-8"><?php echo $devise[0]->devise; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Capital</div>
                                <div class="col-lg-9 col-md-8"><?php echo $_SESSION['capital']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Statut d'Etat</div>
                                <div class="col-lg-9 col-md-8"><?php echo $status->type; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Numero de statut</div>
                                <div class="col-lg-9 col-md-8"><?php echo $status->numero; ?></div>
                            </div>


                        </div>

                        <div class="tab-pane fade dirigeant pt-3" id="dirigeant">

                        <h5 class="card-title">Details du Dirigeant Actuel</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Date </div>
                                <div class="col-lg-9 col-md-8"><?php echo $dirigeant->date; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nom </div>
                                <div class="col-lg-9 col-md-8"><?php echo $dirigeant->nom; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Prenom </div>
                                <div class="col-lg-9 col-md-8"><?php echo $dirigeant->prenom; ?></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
    $this->load->view("pages/templates/footer");
?>