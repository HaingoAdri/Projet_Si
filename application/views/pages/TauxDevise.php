<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
    <div class="col-lg-6">
          <div class="card">
              <div class="card-header">Ajout Taux d'equivalence en <?php echo $liste[0]->devise; ?></div>
              <div class="card-body card-block">
              <form action="<?php echo site_url(); ?>Devises/ajoutTauxDevise" method="post" class="">
              <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Date</label>
                      <input id="cc-exp" name="date" type="date" class="form-control cc-exp"  placeholder="Valeur" required>
                  </div>
                  </div>
                  <br>
                  <div class="col-4">
                      <label for="x_card_code" class="control-label mb-1">Devise</label>
                      <div class="input-group">
                          <select name="idDevise" id="select" class="form-control" required>
                              <option>Devise</option>
                              <?php for($i=1; $i<count($liste); $i++) { ?>
                              <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->devise; ?></option>
                              <?php } ?>
                          </select>      
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Prix</label>
                          <input id="cc-exp" name="taux" type="number" class="form-control cc-exp"  placeholder="Prix" required>
                      </div>
                  </div>
              </div>
              <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Ajout</button></div>
              </form>
              </div>
          </div>
        </div>
    </div>

    <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Liste(s) Taux d'equivalence</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Date</th>
                                <th>Devise</th>
                                <th>Taux en <?php echo $liste[0]->devise; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0; $i<count($taux); $i++) { ?>
                            <tr>
                                <td class="serial"><?php echo $i+1; ?>.</td>
                                <td><?php echo $taux[$i]->date; ?></td>
                                <td><?php echo $taux[$i]->devise; ?></td>
                                <td><?php echo $taux[$i]->taux; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> 
            </div>
    </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>