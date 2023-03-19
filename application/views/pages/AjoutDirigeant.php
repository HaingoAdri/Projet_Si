<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ajout d'un nouveau Dirigeant</strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Dirigeant</h3>
                                        </div>
                                        <hr>
                                        <form action="<?php echo site_url(); ?>Dirigeants/ajoutUnNouveauDirigeant" method="post" novalidate="novalidate">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Date</label>
                                                <input id="cc-name" name="date" type="date" class="form-control cc-name valid" data-val="true" placeholder="Entrer le date du dirigeant" required >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Nom</label>
                                                <input id="cc-name" name="nom" type="text" class="form-control cc-name valid" data-val="true" placeholder="Entrer le nom du dirigeant" required >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Prenom</label>
                                                <input id="cc-name" name="prenom" type="text" class="form-control cc-name valid" data-val="true" placeholder="Entrer le prenom du dirigeant" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                <input id="cc-name" name="email" type="email" class="form-control cc-name valid" data-val="true" placeholder="Entrer le email du dirigeant" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Mot de Passe</label>
                                                <input id="cc-name" name="password" type="password" class="form-control cc-name valid" data-val="true" placeholder="Entrer le Mot de Passe" required >
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> 

                    </div>
    </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>