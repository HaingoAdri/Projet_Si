<?php
  $this->load->view("pages/templates/header");
?>
<style>
    .position {
        margin: 0px 0px 0px 200px;
    }
</style>
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
                <?php for($i=0; $i<count($liste); $i++) { ?>
                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                    <?php echo $liste[$i]->intitule; ?>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <div class="animated fadeIn" class="rota">
        <div class="importation">
            <?php $this->load->view("pages/ImportationJournal"); ?>
        </div>
        <div class="card">  
                <div class="card-header">Inserer Journal</div>
                <br>
              <!-- <div class="card-body card-block"> -->
              <form action="<?php echo site_url(); ?>journal/ajoutJournal" method="post" class="">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="card card-body">
                                <h5 class="card-title">Ajouter les nouveaux donnees du journaux</h5>
                                <div class="form-floating mb-3">
                                    <select name="exo" class="form-select" id="exo" aria-label="Floating label select example" >
                                        <option selected>Exercice</option>
                                        <?php for($i=0; $i<count($listeE); $i++) { ?>
                                            <option value="<?php echo $listeE[$i]['id']; ?>">EXERCICE 1: ((<?php echo $listeE[$i]['debut']; ?>) - (<?php echo $listeE[$i]['fin']; ?>))</option>
                                        <?php } ?>
                                    </select>
                                    <label for="exo">Quel Exercice??</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="devis" class="form-select" id="devise" aria-label="Floating label select example">
                                        <option value="0" selected>Devise</option>
                                        <?php for($i=0; $i<count($listes); $i++) { 
                                            if($listes[$i]->exist == 0) {    ?>
                                            <option value="<?php echo $listes[$i]->id; ?>"><?php echo $listes[$i]->devise; ?></option>
                                        <?php }  } ?>
                                    </select>
                                    <label for="devise">Quel Devise ??</label>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Combien de Taux ??</label>
                                    <th><input type="number"  name="taux" placeholder="taux" id="montant" class="form-control calcul"></th>
                                </div>            
                            </div>
                        </div>
                        <!-- <div class="col-lg-1"></div> -->
                        
                        
                    </div>
                    <div class="card-body">
                                <table class="table table-striped" id="tables">
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
                                            <td><input type="date"  name="date[]" placeholder="Text" class="form-control date-input" id="date[]"  onchange="onDateChanged(this)"></td>
                                            <td>
                                                <div class="form-floating mb-3">
                                                    <select name="code[]" class="form-select" id="selection" aria-label="Floating label select example">
                                                        <option selected>Code</option>
                                                        <?php for($i=0; $i<count($liste); $i++){?>
                                                        <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->intitule; ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <label for="selection">Code journal</label>
                                                </div>
                                            </td>
                                            <td><input type="text"  name="insert[]" placeholder="num" class="form-control "></td>
                                            <td><input type="number"  name="compte[]" placeholder="PCG" class="form-control clear" onchange="onNumberChanged(this)"></td>
                                            <td><input type="Text"  name="nom[]" placeholder="annexe/Tiers" class="form-control clear"></td>
                                            <td><input type="Text"  name="cause[]" placeholder="Action a faire" class="form-control "></td>
                                            <td><input type="text" value="0" name="montant[]" placeholder="montant "id="montant" class="form-control calcul" ></td>
                                            <td><input type="text"  value="0" name="debit[]" placeholder="debit" class="form-control" id="debit_mont" ></td>
                                            <td><input type="text" value="0" name="credit[]" placeholder="credit" class="form-control" id="credit_mont" ></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                            </div>
                            <div class="form-actions form-group row" id="detail" style="display: none;">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="card">  
                                        <div class="card-header form-actions form-group row">
                                            <input type="number" name="test" value="0" hidden>
                                            <h5 class="card-title">Detail du nouveau charge</h5>
                                            <div class="col-lg-3 ">
                                                <h6 for="typeCharge" class="card-title">Type du charge:</h6>
                                                <p><input type="radio" id="typeCharge1" name="typeCharge" value="1"><button class="btn btn-default clear" type="button"> Incorporable</button></p>
                                                <p><input type="radio" id="typeCharge2" name="typeCharge" value="2"><button class="btn btn-default clear" type="button"> Non corporable</button></p>
                                                <p><input type="radio" id="typeCharge3" name="typeCharge" value="3"><button class="btn btn-default clear" type="button"> Suppletive</button></p>
                                                <h6 for="nature" class="card-title">Nature:</h6>
                                                <p><input type="radio" id="nature1" name="nature" value="1"><button class="btn btn-default clear" type="button">Fixe</button></p>
                                                <p><input type="radio" id="nature2" name="nature" value="2"><button class="btn btn-default clear" type="button">Variable</button></p>
                                            </div>
                                            <div class="col-lg-3" id="produit">
                                                <h6 for="typeCharge" class="card-title">Ajout pourcentage de(s) Produit(s): </h6>
                                            </div>
                                            <div class="col-lg-4" id="centre">
                                                <h6 for="typeCharge" class="card-title">Ajout pourcentage de(s) Centre(s): </h6>
                                            </div>
                                            <div class="col-lg-2 ">
                                                <h6 for="unite" class="card-title">Unite d'oeuvre:</h6>
                                                <div class="input-group">
                                                    <p><input class="form-control clear" type="text" id="unite" name="unite" placeholder="Unite"></p>
                                                </div>
                                                <h6 for="cout" class="card-title">Cout d'unite:</h6>
                                                <div class="input-group">
                                                    <p><input class="form-control clear" type="text" id="cout" name="cout" placeholder="Cout unite"></p>
                                                </div>
                                                <h6 for="quantite" class="card-title">Quantite:</h6>
                                                <div class="input-group">
                                                    <p><input class="form-control clear" type="text" id="quantite" name="quantite" placeholder="Quantite"></p>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                         <button class="btn btn-primary" type="button" id="enregistrer">Enregistrer</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions form-group" >
                                <h3 id="dd" style="color:red; display:none;"></h3>
                                <button type="submit" class="btn btn-secondary btn-sm boutonAjout" id="btn1">Ajout</button>
                            </div>
                           
                    </div>

                </form>
                <button class="btn btn-md btn-primary" id="ajout" type="button"  style="margin: -15px 0px 20px 1100px; height: 45px !important">Ajouter nouvelle ligne</button>
                <button class="btn btn-md btn-primary" id="suppr" type="button" style="margin: -15px 0px 20px 0px; height: 45px !important">Supprimer ligne</button>
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
//Selection d'un fichier
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById('file-input');
        const fileName = document.getElementById('file-name');
        const fileNameContainer = document.getElementById('file-name-container');

        fileInput.addEventListener('change', () => {
            fileName.textContent = "Le fichier selectionne est " + fileInput.files[0].name;
            fileNameContainer.classList.remove('d-none');
        });
    });
//changer l'idExercice dans le formulaire de l'importation du fichier 
    var idExercice = document.getElementById("exo");
    idExercice.addEventListener("change", function() {
        var selectedOption = idExercice.options[idExercice.selectedIndex];
        var selectedOptionId = selectedOption.value;
        console.log("ID de l'option sélectionnée idExercice : " + selectedOptionId);
        var inputIdExercice = document.getElementById("idExercice");
        inputIdExercice.value = selectedOptionId;
    });
//change le taux dans le formulaire
    function onDateChanged(input) {
        var newDate = input.value;
        console.log(newDate);
        var idDevise = document.getElementById("devise");
        var selectedOption = idDevise.options[idDevise.selectedIndex];
        var selectedOptionId = selectedOption.value;
        var taux = document.getElementById("montant");
        if(idDevise != 0) {
            const formData = new FormData();
            formData.append("idDevise", selectedOptionId); 
            formData.append("date", newDate);
            const request = new XMLHttpRequest();
            request.open("POST", "<?php echo site_url(); ?>Journal/taux", true);
            request.onload = function() {
                if( request.status >= 200 && request.status < 400 ){
                    const reponse = request.responseText;
                    var liste = JSON.parse(reponse);
                    console.log(liste);
                    taux.value = liste.taux;
                    console.log("taux = " + taux.value);
                }
                else{
                    console.log("Erreur sur la requette aki anh");
                }
            }
            request.onerror = function() {
                console.log("La requette a echoue");
            }
            request.send(formData);
        }
    }

//ajouter un detail d'un detail
    function onNumberChanged(input) {
        var numero = input.value;
        var number = numero.toString();
        if(number[0] == 6) {
            var idExercice = document.getElementById("exo");
            var selectedOption = idExercice.options[idExercice.selectedIndex];
            var selectedOptionId = selectedOption.value;
            const formData = new FormData();
            formData.append("numero", numero); 
            formData.append("idExercice", selectedOptionId); 
            const request = new XMLHttpRequest();
            request.open("POST", "<?php echo site_url(); ?>Journal/detailExist", true);
            request.onload = function() {
                if( request.status >= 200 && request.status < 400 ){
                    const reponse = request.responseText;
                    var boolean = JSON.parse(reponse);
                    console.log("boolean = " + boolean);
                    if(boolean == false) {
                        ajoutProduitCentre();
                        var form_detail = document.getElementById("detail");
                        form_detail.style.display = "block";
                        form_detail.classList.add("position");
                    }
                }
                else{
                    console.log("Erreur sur la requette aki anh amle detail");
                }
            }
            request.onerror = function() {
                console.log("La requette a echoue");
            }
            request.send(formData);
            
        }
    }

//enregistrer les details dans la base
    var enregistrer = document.getElementById("enregistrer");
    enregistrer.addEventListener("click", function() {
        var container = document.getElementById("line-container");
        const derniereLigne = container.lastElementChild;
        var toutesLesCellules = derniereLigne.querySelectorAll('td');
        const cellule = toutesLesCellules[6];
        const input = cellule.querySelector('input');
        var cE = document.getElementById("cout");
        var qE = document.getElementById("quantite");
        input.value = parseFloat(cE.value) * parseFloat(qE.value); 
    // enregistrer et vider la formulaire du detail
        var exercice = document.getElementById("exo");
        var selectedOption = exercice.options[exercice.selectedIndex];
        var idExercice = selectedOption.value;
        let idType = 0;
        let idNature = 0;
        const radios = document.getElementsByName('typeCharge');
        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                idType = radios[i].value;
                radios[i].checked = false;
                break;
            }
        }
        const radiosNature = document.getElementsByName('nature');
        for (let i = 0; i < radiosNature.length; i++) {
            if (radiosNature[i].checked) {
                idNature = radiosNature[i].value;
                radiosNature[i].checked = false;
                break;
            }
        }
        console.log("Nature = " + idNature);
        const valeurProduit = [];
        const valeurCentre = [];
        const valeurPourProduit = [];
        const valeurPourCentre = [];
        const listeIdProduit = document.querySelectorAll('input[name="idProduit"]');
        const listeIdCentre = document.querySelectorAll('input[name="idCentre"]');
        const pourProduit = document.querySelectorAll('input[name="pourproduit"]');
        const pourCentre = document.querySelectorAll('input[name="pourcentre"]');
        for(var i =0; i<listeIdProduit.length; i++) {
            valeurProduit.push(listeIdProduit[i].value);
            valeurPourProduit.push(pourProduit[i].value);
            pourProduit[i].value = 0;
        }
        for(var i=0; i<listeIdCentre.length; i++) {
            valeurCentre.push(listeIdCentre[i].value);
            valeurPourCentre.push(pourCentre[i].value);
            pourCentre[i].value = 0;
        }
        console.log(valeurProduit);
        console.log(valeurCentre);
        console.log(valeurPourProduit);
        console.log(valeurPourCentre);
        const uniteE = document.getElementById("unite");
        const unite = uniteE.value;
        uniteE.value = "";
        const coutE = document.getElementById("cout");
        const cout = coutE.value;
        coutE.value = "";
        const quantiteE = document.getElementById("quantite");
        const quantite = quantiteE.value;
        quantiteE.value = "";
        const listeCompte = document.querySelectorAll('input[name="compte[]"]');
        const compte = listeCompte[listeCompte.length - 1].value;
        var form_detail = document.getElementById("detail");
        form_detail.style.display = "none";
        const formData = new FormData();
            formData.append("compte", compte); 
            formData.append("idExercice", idExercice); 
            formData.append("type", idType); 
            formData.append("nature", idNature); 
            formData.append("unite", unite); 
            formData.append("valeurProduit", JSON.stringify(valeurProduit)); 
            formData.append("valeurCentre", JSON.stringify(valeurCentre)); 
            formData.append("valeurPourProduit", JSON.stringify(valeurPourProduit)); 
            formData.append("valeurPourCentre", JSON.stringify(valeurPourCentre)); 
            const request = new XMLHttpRequest();
            request.open("POST", "<?php echo site_url(); ?>Journal/enregistrer", true);
            request.onload = function() {
                if( request.status >= 200 && request.status < 400 ){
                    const reponse = request.responseText;
                    var boolean = JSON.parse(reponse);
                    console.log("Enregistrer ki anh ", boolean);
                }
                else{
                    console.log("Erreur sur la requette aki anh");
                }
            }
            request.onerror = function() {
                console.log("La requette a echoue");
            }
            request.send(formData);
    });

    function ajoutProduitCentre() {
        console.log("Atyy");
        var produit = document.getElementById("produit");
        var centre = document.getElementById("centre");
        if (produit.childElementCount === 1 && centre.childElementCount === 1)  {
            const formData = new FormData();
            const request = new XMLHttpRequest();
            request.open("POST", "<?php echo site_url(); ?>Journal/listeProduitCentre", true);
            request.onload = function() {
                if( request.status >= 200 && request.status < 400 ){
                    console.log("ato izy");
                    const reponse = request.responseText;
                    var liste = JSON.parse(reponse);
                    var listeProduit = liste.produit;
                    var listeCentre = liste.centre;
                    for(var i=0; i<listeProduit.length; i++) {
                        var nouveau = '<p><div class="input-group"><span class="input-group-btn"><input type="number" name="idProduit" value="'+listeProduit[i].idProduit+'" hidden><button class="btn btn-default" type="button">'+listeProduit[i].Intitule+ '</button></span><input type="text" class="form-control clear" name="pourproduit" id="produit'+ (i+1) +'" value="0" placeholder="Pourcentage %"></div></p>';
                        produit.insertAdjacentHTML('beforeend', nouveau);
                    }
                    for(var j=0; j<listeCentre.length; j++) {
                        var nouveau = '<p><div class="input-group"><span class="input-group-btn"><input type="number" name="idCentre" value="'+listeCentre[j].idCentre+'" hidden><button class="btn btn-default" type="button">'+listeCentre[j].Intitule+'</button></span><input type="text" class="form-control clear" name="pourcentre" id="centre'+ (j+1) +'" value="0" placeholder="Pourcentage %"></div></p>';
                        centre.insertAdjacentHTML('beforeend', nouveau);
                    }
                }
                else{
                    console.log("Erreur sur la requette aki anh");
                }
            }
            request.onerror = function() {
                console.log("La requette a echoue");
            }
            request.send(formData);
        }
    }


//changer l'idEdevise dans le formulaire de l'importation du fichier 
    var idDevise = document.getElementById("devise");
    idDevise.addEventListener("change", function() {
        var selectedOption = idDevise.options[idDevise.selectedIndex];
        var selectedOptionId = selectedOption.value;
        console.log("ID de l'option sélectionnée idDevise : " + selectedOptionId);
        var inputIdDevise = document.getElementById("idDevise");
        inputIdDevise.value = selectedOptionId;
    });

//---------------------------------------------------------------------------------------------------

//Ajout journal    
    document.querySelector("#ajout").addEventListener("click", () => {
        ajout()
    })
    document.querySelector("#suppr").addEventListener("click", () => {
        deleteLigne()
    })

   function ajout(){
        const from_detail = document.getElementById('detail');
        const styles = window.getComputedStyle(from_detail);
        if (styles.display === 'none') {
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
                        newLine.querySelector("input[type='date']").classList.add("date-input");
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
                        newLine.querySelector("input[type='date']").classList.add("date-input");

                    }
            container.appendChild(newLine);
        }
   }

   function deleteLigne(){
        const from_detail = document.getElementById('detail');
        const styles = window.getComputedStyle(from_detail);
        if (styles.display === 'none') {
            document.getElementById("line-container").deleteRow(1);
        }
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