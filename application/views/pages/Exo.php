<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-6">
          <div class="card">
              <div class="card-header">Ajout Exercice</div>
              <div class="card-body card-block">
              <form action="<?php echo site_url(); ?>exercice/insert" method="post" class="">
                <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="input" class=" form-control-label">Date debut: </label></div>
                      <div class="col-6 col-md-6"><input name="debut" type="date" rows="3" placeholder="Type" class="form-control" required></textarea></div>
                  </div>
                  <div class="col col-md-3">
                      <label for="input" class=" form-control-label">Date fin: </label></div>
                      <div class="col-6 col-md-6"><input name="fint" type="date" rows="3" placeholder="Type" class="form-control" required></textarea></div>
                  </div>
                  <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Ajout</button></div>
                </div>
            </form>
              </div>
          </div>
        </div>
       
    </div>
    
          <div class="card">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th >id</th>
                             <th >Date debut</th>
                             <th >Date Fin</th>
                                     
                         </tr>
                     </thead>
                    <tbody>
                         <?php for($i=0; $i<count($liste); $i++){?>
                                 <tr>
                                     <td><?php echo $liste[$i]['id']; ?></td>
                                     <td><?php echo $liste[$i]['debut']; ?></td>
                                     <td><?php echo $liste[$i]['fin'];?></td>
                                             
                                 </tr>   
                        <?php } ?>
                    </tbody>
                 </table>
          </div>
                   
   
    </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>