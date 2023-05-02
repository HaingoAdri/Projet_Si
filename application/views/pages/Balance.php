<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Choisir une exercice </h5>
                            <div class="form-floating mb-3">
                                <select name="idExercice" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                    <option value="-1" selected disabled>Exercice</option>
                                    <?php for($i=0; $i<count($exercice); $i++) { ?>
                                        <option value="<?php echo $exercice[$i]->id; ?>"><?php echo $exercice[$i]->debut; ?> à <?php echo $exercice[$i]->fin; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="floatingSelect">Liste(s) Exercice(s)</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" onclick="listeBalance()">Voir la balance</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row" id="balance" style="display:none">
                <div class="col-lg-12">
                    <div class="card">
                        <h3 class="card-title text-center">BALANCE DES COMPTES</h3>
                        <div class="card-body">
                            <p class="text-center"><STRONG>Complete</STRONG></p>
                            <div style="float: right; margin: -90px 0px 5px 0px;">
                                <p id="debut"></p>
                                <p id="fin"></p>
                                <p id="devise"></p>
                            </div>
                        </div>
                        <p style="margin: -70px 0px 5px 15px;"><STRONG><?php echo $_SESSION['nom']; ?></STRONG></p>
                    </div>
                </div>
            </div>
            <div class="row" id="liste" style="display:none" >
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Balance</h5>
                            <table class="table" border=1>
                                <thead>
                                <tr>
                                    <th scope="col">Compte</th>
                                    <th scope="col">Intitule</th>
                                    <th scope="col">Debit</th>
                                    <th scope="col">Credit</th>
                                    <th scope="col">Solde Debiteur</th>
                                    <th scope="col">Solde Crediteur</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

<script>
    function listeBalance() {
        const idExercice = document.getElementsByName("idExercice")[0].value;
        console.log("idexercice = " + idExercice);
        if (idExercice != -1) {
            const formData = new FormData();
            formData.append("idExercice", idExercice);
            const request = new XMLHttpRequest();
            request.open("POST", "<?php echo site_url(); ?>BalanceExercice/balance", true);
            request.onload = function() {
                if (request.status >= 200 && request.status < 400) {
                    console.log("Requête réussie");
                    const reponse = request.responseText;
                    document.getElementById("tbody").textContent = "";
                    var tbody = document.getElementById("tbody");
                    console.log(reponse);
                    var donnees = JSON.parse(reponse);
                    var liste = donnees.liste;
                    var exercice = donnees.exercice;
                    var deviseRetenu = donnees.devise;
                    for(var i = 0; i< liste.length;i++){
                        console.log(" mitety ");
                        var elementTR = document.createElement("tr");
                        var elementTD1 = document.createElement("th");
                        elementTD1.textContent = liste[i].compte;
                        var elementTD2 = document.createElement("td");
                        elementTD2.textContent = liste[i].intitule;
                        var elementTD3 = document.createElement("td");
                        elementTD3.textContent = liste[i].debit;
                        var elementTD4 = document.createElement("td");
                        elementTD4.textContent = liste[i].credit;
                        var elementTD5 = document.createElement("td");
                        elementTD5.textContent = liste[i].soldeDebiteur;
                        var elementTD6 = document.createElement("td");
                        elementTD6.textContent = liste[i].soldeCrediteur;
                        elementTR.appendChild(elementTD1);
                        elementTR.appendChild(elementTD2);
                        elementTR.appendChild(elementTD3);
                        elementTR.appendChild(elementTD4);
                        elementTR.appendChild(elementTD5);
                        elementTR.appendChild(elementTD6);
                        tbody.appendChild(elementTR);
                        
                    }
                    const debut = document.getElementById("debut");
                    debut.innerHTML = "Periode du " + exercice.debut;
                    const fin = document.getElementById("fin");
                    fin.innerHTML = "au " + exercice.fin;
                    const devise = document.getElementById("devise");
                    devise.innerHTML = "Tenue de compte: " + deviseRetenu[0].devise;
                    const table = document.getElementById("liste");
                    table.style.display = "block";
                    const balance = document.getElementById("balance");
                    balance.style.display = "block";
                    
                } else {
                    console.log("Erreur sur la requête");
                }
            }
            request.onerror = function() {
                console.log("La requête a échoué");
            }
            request.send(formData);
        }
    }
</script>

<?php
    $this->load->view("pages/templates/footer");
?>