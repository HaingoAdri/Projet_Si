<?php
  $this->load->view("pages/templates/header");
?>

<div class="content">

    <div class="animated fadeIn">
                <div class="card">  
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title" v-if="headerText">Type de Journal</strong>
                    </div>
                    <div class="card-body">

                        <!-- Button trigger modal -->
                    <?php for($i=0; $i<count($liste); $i++) { ?>
                      <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                            <?php echo $liste[$i]->intitule; ?>
                      </button>
                    <?php } ?>
                  </div>
              </div>
    </div>
   
    <div class="animated fadeIn">
        <!-- <div class="col-lg-6"> -->
          <div class="card">
              <div class="card-header">Inserer Journal</div>
              <!-- <div class="card-body card-block"> -->
                 <form action="<?php echo site_url(); ?>journal/ajoutJournal" method="post" class="">
                    <!-- <div class="row form-group"> -->
                    <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th >Date</th>
                                            <th >Code</th>
                                            <th >Num Compte</th>
                                            <th >Num de Journal</th>
                                            <th >Nom Compte Tiers</th>
                                            <th >Libelle</th>
                                            <th >Montant</th>
                                            <th >Taux</th>
                                            <th >Devise</th>
                                            <th >Debit</th>
                                            <th >Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <input type="date"  name="date" placeholder="Text" class="form-control">
                                            </td>
                                            <td>
                                            <select name="code"  class="form-control">
                                                <?php for($i=0; $i<count($liste); $i++){?>
                                                    <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->intitule; ?></option>
                                                <?php }?>
                                            </select></td>
                                            <td><input type="number"  name="compte" placeholder="PCG" class="form-control"></td>
                                            <td><input type="text"  name="insert" placeholder="num" class="form-control"></td>
                                            <td><input type="Text"  name="nom" placeholder="nom Tiers" class="form-control"></td>
                                            <td><input type="Text"  name="cause" placeholder="nom Tiers" class="form-control"></td>
                                            <th><input type="number"  name="montant" placeholder="montant" class="form-control"></th>
                                            <td><input type="number"  name="taux" placeholder="taux" class="form-control"></td>
                                            <td>
                                                <select name="devis" id="select" class="form-control">
                                                    <?php for($j=0; $j<count($listes); $j++){?>
                                                        <option value="<?php echo $listes[$j]['id']; ?>"><?php echo $listes[$j]['devise']; ?></option>
                                                    <?php }?>
                                                </select></td>
                                            <td><input type="number"  name="debit" placeholder="debit" class="form-control"></td>
                                            <td><input type="number"  name="credit" placeholder="credit" class="form-control"></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Ajout</button>
                            </div>
                            
                    </div>
                 </form>
              <div class="form-actions form-group">
                <input type="file" name="file">
              </div>
              </div>
              <div class="card">
              <div class="card-header">Voir Journal</div>
             
                    <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th >Date</th>
                                            <th >Code</th>
                                            <th >Num Compte</th>
                                            <th >Num de Journal</th>
                                            <th >Nom Compte Tiers</th>
                                            <th >Libelle</th>
                                            <th >Montant</th>
                                            <th >Taux</th>
                                            <th >Devise</th>
                                            <th >Debit</th>
                                            <th >Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i=0; $i<count($listeJ); $i++){?>
                                                <tr>
                                                    
                                                    <td><?php echo $listeJ[$i]['date']; ?></td>
                                                    <td><?php echo $listeJ[$i]['intitule']; ?></td>
                                                    <td><?php echo $listeJ[$i]['compte'];?></td>
                                                    <td><?php echo $listeJ[$i]['num'];?></td>
                                                    <td><?php echo $listeJ[$i]['libelle']; ?></td>
                                                    <td><?php echo $listeJ[$i]['cause']; ?></td>
                                                    <td><?php echo $listeJ[$i]['montant']; ?></td>
                                                    <th><?php echo $listeJ[$i]['taux']; ?></th>
                                                    <td><?php echo $listeJ[$i]['devise']; ?></td>
                                                    <td><?php echo $listeJ[$i]['debit']; ?></td>
                                                    <td><?php echo $listeJ[$i]['credit']; ?></td>
                                            </tr>   
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                          
                    </div>
                 <!-- </form> -->
              </div>
        </div>
    </div>
<div class="content">

    <div class="animated fadeIn">
        <!-- <div class="col-lg-6"> -->
          
        </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>