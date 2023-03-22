<?php
  $this->load->view("pages/templates/header");
?>
    <div class="content">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Code journal</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">      
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Ajout Nouveau Code Journal</div>
                        <div class="card-body card-block">
                            <form  method="post" action="<?php echo site_url()?>CodeJournal/ajoutNouveauCode" class="">
                                <div class="form-group">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Code</label>
                                            <input type="text" name="code"  placeholder="Inserer nouveau code journal" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Intitule</label>
                                            <input type="text" name="intitule"  placeholder="Intitule du nouveau code journal" class="form-control" required>
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
                            <strong class="card-title">Code Journaux</strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Code</th>
                                        <th>Intitule du code</th>
                                        <th></th>
                                        <th>Exist</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <td class="serial"><?php echo $i+1; ?>.</td>
                                        <td><?php echo $liste[$i]->code; ?></td>
                                        <td><?php echo $liste[$i]->intitule; ?></td>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/Modifier/<?php echo $liste[$i]->id; ?>"><span class="badge badge-primary">Modifier</span></a></td>
                                        <?php if(($liste[$i]->exist)=="0") { ?>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/supprimer/<?php echo $liste[$i]->id; ?>"><span class="badge badge-pending">Supprimer</span></a></td>
                                        <?php } else { ?>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/restaurer/<?php echo $liste[$i]->id;; ?>"><span class="badge  badge-complete">Restaurer</span></a></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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