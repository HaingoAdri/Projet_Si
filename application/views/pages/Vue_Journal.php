<?php
  $this->load->view("pages/templates/header");
?>

<div class="content">
    <br>
    <br>
    <br>
    <br>
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
         <div class="card">  
                <div class="card-header">Inserer Journal</div>
              <!-- <div class="card-body card-block"> -->
              <form action="<?php echo site_url(); ?>journal/ajoutJournal" method="post" class="">
                    <div class="card-body">
                        
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Quel exercice ??</label>
                                        <select name="exo"  class="form-control piece-select" id="selection">
                                            <?php for($i=0; $i<count($listeE); $i++){?>
                                                <option value="<?php echo $listeE[$i]['id']; ?>">EXERCICE 1: ((<?php echo $listeE[$i]['debut']; ?>) - (<?php echo $listeE[$i]['fin']; ?>))</option>
                                            <?php }?>
                                        </select>
                                    
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Quel Devise ??</label>
                                        <select name="devis"  class="form-control piece-select" id="selection">
                                            <?php for($i=0; $i<count($listes); $i++){?>
                                                <option value="<?php echo $listes[$i]['id']; ?>"><?php echo $listes[$i]['devise']; ?></option>
                                            <?php }?>
                                        </select>
                                    
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Combien de Taux ??</label>
                                        <th><input type="number"  name="taux" placeholder="taux" id="montant" class="form-control calcul"></th>
                                    
                                    </div>
                            
                    </div>

                    <!-- <div class="row form-group"> -->
                    <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th >Date</th>
                                            <th >Code Jounaux</th>
                                            <th >Num de facture</th>
                                            <th >PCG</th>
                                            <th >CA/CT</th>
                                            <th >Libelle</th>
                                            <th >Montant</th>
                                            <th >Debit</th>
                                            <th >Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="line-container">
                                        <tr  id="tbody">
                                            <td>
                                            <input type="date"  name="date[]" placeholder="Text" class="form-control">
                                            </td>
                                            <td>
                                            <select name="code[]"  class="form-control piece-select" id="selection">
                                                <?php for($i=0; $i<count($liste); $i++){?>
                                                    <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->intitule; ?></option>
                                                <?php }?>
                                            </select></td>
                                            <td><input type="text"  name="insert[]" placeholder="num" class="form-control "></td>
                                            <td><input type="number"  name="compte[]" placeholder="PCG" class="form-control clear"></td>
                                            <td><input type="Text"  name="nom[]" placeholder="annexe/Tiers" class="form-control clear"></td>
                                            <td><input type="Text"  name="cause[]" placeholder="Action a faire" class="form-control "></td>
                                            <th><input type="text" value="0" name="montant[]" placeholder="montant "id="montant" class="form-control calcul" ></th>
                                            <td><input type="text"  value="0" name="debit[]" placeholder="debit" class="form-control" id="debit_mont" ></td>
                                            <td><input type="text" value="0" name="credit[]" placeholder="credit" class="form-control" id="credit_mont" ></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                            </div>
                            <div class="form-actions form-group" >
                                <h3 id="dd" style="color:red; display:none;"></h3>
                                <button type="submit" class="btn btn-secondary btn-sm" id="btn1" style="display:block;">Ajout</button>
                            </div>
                           
                    </div>

                </form>
                <button class="btn btn-md btn-primary" id="ajout" type="button">Ajouter nouvelle ligne</button>
                <button class="btn btn-md btn-primary" id="suppr" type="button">Supprimer ligne</button>
              </div>
             
            <div class="card">
             
                <div class="card-header">Voir Journal</div>
                
                        <div class="card-body">
                            <table class="table table-striped tbl">
                                <thead>
                                    <tr>
                                            <th >Date</th>
                                            <th >Code Jounaux</th>
                                            <th >Exercice</th>
                                            <th >PCG</th>
                                            <th >Num de facture</th>
                                            <th >CA/CT</th>
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
                                        <td><?php echo $listeJ[$i]['exo']; ?></td>
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
         </div>
             
        </div>
        
       
  
    </div>
<?php
    $this->load->view("pages/templates/footer");
?>
<script defer>
    document.querySelector("#ajout").addEventListener("click", () => {
        ajout()
    })
    document.querySelector("#suppr").addEventListener("click", () => {
        deleteLigne()
    })

   function ajout(){
        var container = document.getElementById("line-container");
       var line = document.getElementById("tbody");
       var newLine = line.cloneNode(true);
       var originalSelect = line.querySelector("#selection").value;
        var cloneSelect = newLine.querySelector("#selection");
       
            if (originalSelect == 1) {
                cloneSelect.selected = true;    
                var inputs = newLine.getElementsByClassName("clear");
                for (let index = 0; index < inputs.length; index++) {
                    inputs[index].value = "";
                }
                var l = parseFloat(line.querySelector("#montant").value);
                var ll =newLine.querySelector("#montant");
                ll.value = l*0.2

                var lo = newLine.querySelector("#credit_mont");
                var f = parseFloat(ll.value);
                var val = l+f;
                lo.value = val;

                var d = newLine.querySelector("#debit_mont");
                d.value = val;

                console.log(ll.value)
            }
            else {
                cloneSelect.selected = true;    
                var inputs = newLine.getElementsByClassName("clear");
                for (let index = 0; index < inputs.length; index++) {
                    inputs[index].value = "";
                }
                var l = parseFloat(line.querySelector("#montant").value);
                var ll =newLine.querySelector("#montant");
                ll.value = Math.floor(l-(l/1.2));

                var lo = newLine.querySelector("#credit_mont");
                lo.value = l/1.2;

                var d = newLine.querySelector("#debit_mont");
                d.value = l;


            }
       container.appendChild(newLine);
   }

   function deleteLigne(){
       document.getElementById("line-container").deleteRow(1);
   }
   function valider(){
   
       var line = document.getElementById("line-container");
       var newLine = line.cloneNode(true);

       const ll = newLine.rows[newLine.rows.length - 1];

       var debit = parseFloat(ll.querySelector("#debit_mont").value);
       var credit = parseFloat(ll.querySelector("#credit_mont").value);
        console.log(debit);
        console.log(credit);
       
       if(debit === credit){
           var btn = document.getElementById("btn1");
           btn.style.display = 'block';
           var btns = document.getElementById("dd");
           btns.style.display = 'none';
       }
       else{
            var btn = document.getElementById("btn1");
           btn.style.display = 'none';
           var btns = document.getElementById("dd");
           btns.innerHTML = 'Il faut que le debit et credit sois pareils et taper les donner pour que ca soit compatible';
           btns.style.display = 'block';
       }
   }
</script>