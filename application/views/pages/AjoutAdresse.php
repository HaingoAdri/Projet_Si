<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-6">
          <div class="card">
              <div class="card-header">Ajout Nouveau Type Adresse</div>
              <div class="card-body card-block">
              <form action="<?php echo site_url(); ?>adresses/insertType" method="post" class="">
                <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="input" class=" form-control-label">Type: </label></div>
                      <div class="col-6 col-md-6"><input name="type" id="input" rows="3" placeholder="Type" class="form-control" required></textarea></div>
                  </div>
                  <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Ajout</button></div>
                </div>
            </form>
              </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
              <div class="card-header">Ajout Adresse</div>
              <div class="card-body card-block">
              <form action="<?php echo site_url(); ?>adresses/insertAdresse" method="post" class="">
              <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Date</label>
                      <input id="cc-exp" name="date" type="date" class="form-control cc-exp"  placeholder="Valeur" required>
                  </div>
                  </div>
                  <br>
                  <div class="col-4">
                      <label for="x_card_code" class="control-label mb-1">Type Adresse</label>
                      <div class="input-group">
                          <select name="idType" id="select" class="form-control" required>
                              <option>Type</option>
                              <?php for($i=0; $i<count($liste); $i++) { ?>
                              <option value="<?php echo $liste[$i]['id']; ?>"><?php echo $liste[$i]['type']; ?></option>
                              <?php } ?>
                          </select>      
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Valeur</label>
                          <input id="cc-exp" name="valeur" type="text" class="form-control cc-exp"  placeholder="Valeur" required>
                      </div>
                  </div>
              </div>
              <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Ajout</button></div>
              </form>
              </div>
          </div>
        </div>
    </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>