<?php
  $this->load->view("pages/templates/header");
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <center><strong class="card-title">Interrogation Generale: <?php echo $nomCodeJournal['code'];?> <?php echo $nomCodeJournal['intitule'];?> </strong></center>
                    <p>Periode du: <strong><?php echo $debut; ?></strong> au <strong><?php echo $fin; ?></strong></p>
                </div>
                <div class="table-stats order-table">
                    <table class="table ">
                            <tr>
                                <th>#</th>
                                <th width="40%">Themes</th>
                                <th width="30%">Debit</th> 
                                <th width="30%">Credit</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>Totaux<td>
                                    <td><?php echo $sumDC['sumd']; ?></td>
                                    <td><?php echo $sumDC['sumc']; ?></td>
                                </tr>
                                <tr>
                                    <td>Soldes<td>
                                    <td><?php if($resteSolde < 0) { echo $resteSolde; }else{ echo "0,00";} ?></td>
                                    <td><?php if($resteSolde > 0) { echo $resteSolde; } else { echo "0,00";} ?></td>
                                </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <center><strong class="card-title">Affichage</strong></center>
                    <p>Periode du: <strong><?php echo $debut; ?></strong> au <strong><?php echo $fin; ?></strong></p>
                </div>
                <div class="table-stats order-table">
                    <table class="table ">
                        <thead>
                                <th>Code Journal</th>
                                <th>Date</th> 
                                <th>Num Piece</th>
                                <th>Reference Piece</th>
                                <th>Libelle Ecriture</th>
                                <th>Debit</th>
                                <th>Credit</th>  
                        </thead>
                        <tbody>
                            <?php for($i=0; $i < count($details); $i++){ ?>
                                <tr>
                                    <td><?php echo $details[$i]['id']; ?><td>
                                    <td><?php echo $details[$i]['date']; ?></td>
                                    <td><?php echo $details[$i]['num']; ?></td>
                                    <td><?php echo $details[$i]['id']; ?></td>
                                    <td><?php echo $details[$i]['libelle']; ?></td>
                                    <td><?php echo $details[$i]['debit']; ?></td>
                                    <td class="text-right"><?php echo $details[$i]['credit']; ?></td>
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