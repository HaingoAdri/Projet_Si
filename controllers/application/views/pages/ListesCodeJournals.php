<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Les Exercices de cette entreprise</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <th>#</th>
                            <th>Code</th>
                            <th>Intitule</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php for($i=0; $i<count($codes); $i++) { ?>
                            <tr>
                                <td class="serial"><?php echo $i+1; ?>.</td>
                                <td><?php echo $codes[$i]->code; ?></td>
                                <td><?php echo $codes[$i]->intitule; ?></td>
                                <td><a href="<?php echo site_url();?>/CodeGrandLivre/afficheGrandLivre/<?php echo $codes[$i]->code;?>/<?php echo $debut;?>/<?php echo $fin;?>">Voir Grand Livre</a></td>
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