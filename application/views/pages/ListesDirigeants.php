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
                                <th>Date</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0; $i<count($liste); $i++) { ?>
                            <tr>
                                <td class="serial"><?php echo $i+1; ?>.</td>
                                <td><?php echo $liste[$i]['date']; ?></td>
                                <td><?php echo $liste[$i]['nom']; ?></td>
                                <td><?php echo $liste[$i]['prenom']; ?></td>
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