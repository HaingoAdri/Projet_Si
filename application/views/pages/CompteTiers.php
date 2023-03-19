<?php
  $this->load->view("pages/templates/header");
?>
    <div class="content">        
            <div class="animated fadeIn">
                <div class="row">      
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Ajout Nouveau Compte Tiers</div>
                        <div class="card-body card-block">
                            <form  method="post" action="<?php echo site_url()?>CompteGeneral/ajoutNouveauClient" class="">
                                <div class="col-4">
                                    <label for="x_card_code" class="control-label mb-1">Compte Tiers</label>
                                    <div class="input-group">
                                        <select name="idType" id="select" class="form-control" required>
                                            <option>Compte</option>
                                            <?php for($i=0; $i<count($liste); $i++) { ?>
                                            <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->numero; ?> <?php echo $liste[$i]->intitule; ?></option>
                                            <?php } ?>
                                        </select>      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Intitule</label>
                                            <input type="text" name="intitule"  placeholder="Intitule du compte client" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Inserer</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Plan Tiers</strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Numero</th>
                                        <th>Intitule du compte</th>
                                        <th>Exist</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <td class="serial"><?php echo $i+1; ?>.</td>
                                        <td><?php echo $liste[$i]->numero; ?></td>
                                        <td><?php echo $liste[$i]->intitule; ?></td>
                                        <?php if(($liste[$i]->exist)=="0") { ?>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/supprimer/<?php echo $liste[$i]->id; ?>"><span class="badge badge-pending">Supprimer</span></a></td>
                                        <?php } else { ?>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/restaurer/<?php echo $liste[$i]->id;; ?>"><span class="badge  badge-complete">Restaurer</span></a></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?> -->
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
                </div>
            </div>
    </div>

<?php
    $this->load->view("pages/templates/footer");
?>