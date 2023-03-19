<?php
  $this->load->view("pages/templates/header");
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="card-body card-block">
            <div class="row">
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>A propos de l'entreprise</strong> 
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Date de Creation:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $_SESSION['dateDeCreation']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Nom:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $_SESSION['nom']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Objet:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $_SESSION['objet']; ?></p>
                                        </div>
                                    </div>
                                    <?php for($i=0; $i<count($listeAdresse); $i++) { 
                                        if($listeAdresse[$i]['exist']==0) {
                                    ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label"><?php echo$listeAdresse[$i]['type']; ?>:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $listeAdresse[$i]['valeur']; ?></p>
                                        </div>
                                    </div>
                                    <?php } }  ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">La devise tenu du compte:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $devise[0]->devise; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Capital:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $_SESSION['capital']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Status d'etat:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $status->type; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Numero du Status:</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $status->numero; ?></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong>A propos du Dirigeant</strong> 
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Date:</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?php echo $dirigeant->date; ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Nom:</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?php echo $dirigeant->nom; ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Prenom:</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?php echo $dirigeant->prenom; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
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