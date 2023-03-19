<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Liste(s) de(s) dirigeant(s) successif(s)</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Devise</th>
                                <th>Exist</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0; $i<count($liste); $i++) { ?>
                            <tr>
                                <td class="serial"><?php echo $i+1; ?>.</td>
                                <td><?php echo $liste[$i]->devise; ?></td>
                                <?php if(($liste[$i]->exist)=="0" && $i!=0) { ?>
                                <td><a href="<?php echo site_url(); ?>Devises/supprimer/<?php echo $liste[$i]->id; ?>"><span class="badge badge-pending">Supprimer</span></a></td>
                                <?php } else if(($liste[$i]->exist)=="1" && $i!=0){ ?>
                                <td><a href="<?php echo site_url(); ?>Devises/restaurer/<?php echo $liste[$i]->id;; ?>"><span class="badge  badge-complete">Restaurer</span></a></td>
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
<?php
    $this->load->view("pages/templates/footer");
?>