<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-6">
          <div class="card">
              <div class="card-header">Ajout Devise</div>
              <div class="card-body card-block">
              <form action="<?php echo site_url(); ?>Devises/ajouterNouveauDevise" method="post" class="">
              <div class="row">
              <div class="col-6">
              <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="input" class=" form-control-label">Devise: </label></div>
                        <div class="col-6 col-md-9">
                                <div class="input-group">
                                <select name="idDevise" id="select" class="form-control" required>
                                    <option>Devise</option>
                                    <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <option value="<?php echo $liste[$i]['id']; ?>"><?php echo $liste[$i]['devise']; ?></option>
                                    <?php } ?>
                                </select>      
                                </div>                        
                        </div>
                    </div>
                    <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Ajouter</button></div>
              </div>
              </form>
              </div>
          </div>
        </div>
    </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>