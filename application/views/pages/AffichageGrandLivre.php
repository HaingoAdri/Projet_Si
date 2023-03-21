<?php
  $this->load->view("pages/templates/header");
?>


<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <center><strong class="card-title">Affichage</strong></center>
                    <p>Periode du: <strong>010113</strong> au <strong>311213</strong></p>
                </div>
                <div class="table-stats order-table">
                    <table class="table ">
                        <thead>
                                <th>Code</th>
                                <th>Date</th> 
                                <th>Num Piece</th>
                                <th>Reference Piece</th>
                                <th>Libelle Ecriture</th>
                                <th>Debit</th>
                                <th>Credit</th>  
                        </thead>
                        <tbody>
                            <tr>
                                <td>BO<td>
                                <td>040113</td>
                                <td>1</td>
                                <td>BOA01/001</td>
                                <td>CQN 823/RABE</td>
                                <td>300 300,00</td>
                                <td class="text-right">0,00</td>
                            </tr>
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