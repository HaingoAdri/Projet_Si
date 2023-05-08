<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">
    <section class="section">

        <div class="row">
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listes Des exercices</h5>
                        <div class="form-floating mb-3">
                            <select name="exercice" class="form-select" id="exercice" aria-label="Floating label select example">
                            <option selected>Les Exercices</option>
                                <?php for($i=0; $i<count($exercices); $i++) { ?>
                                    <option value="<?php echo $exercices[$i]['id']; ?>"><?php echo $exercices[$i]['debut']; ?> - <?php echo $exercices[$i]['fin']; ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingSelect">Liste des exercices</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listes Des Comptes</h5>
                        <div class="form-floating mb-3">
                            <select name="exercice" class="form-select" id="compte" aria-label="Floating label select example">
                            <option selected>Les Comptes</option>
                                <?php for($i=0; $i<count($comptes); $i++) { ?>
                                    <option value="<?php echo $comptes[$i]->numero; ?>"><?php echo $comptes[$i]->intitule; ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingSelect">Liste Des Comptes</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row" id="row"></div>


        <div class="row">
            <div class="col-lg-11">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Le Grand Livre</h5>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Numero du compte</th>
                                <th>Intitule du compte</th>
                                <th>Date de l'operation</th>
                                <th>Journal Utilise</th>
                                <th>Debit</th>
                                <th>Credit</th>
                            </tr>
                            </thead>
                            <tbody id="tableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    <script>
        // Sélection des éléments de sélection par leur ID
        var exerciceElement = document.getElementById('exercice');
        var compteElement = document.getElementById('compte');

        exerciceElement.addEventListener('change', afficherContenu);
        compteElement.addEventListener('change', afficherContenu);

        function afficherContenu() {
    if (exerciceElement.value !== 'Les Exercices' && compteElement.value !== 'Les Comptes') {
        console.log(exerciceElement.value +" et "+compteElement.value);
        var table = null;
        recupExercice(exerciceElement.value, function(result) {
            table = result;
            console.log("tableeee "+table.debut);
            recupData(compteElement.value,table.debut,table.fin);
        });
    } else {
        console.log("Il n'y a riennnnnn");
    }
}

function recupExercice(idexercice, result){
    const resultat = {};

    const request = new XMLHttpRequest();
    const url = "<?php echo site_url(); ?>Exercice/oneExo/"+idexercice;
    request.open("GET", url, true);
    request.onload = function() {
        if( request.status >= 200 && request.status < 400 ){
            console.log("La requête a réussi ouuuuuu!");
            const response = request.responseText;
            // const r = response.substr(response , 0);
            console.log("reponse = ", response);
            if (response.startsWith("{") && response.endsWith("}")) { // Vérifier que la réponse est au format JSON
                const data = JSON.parse(response);
                resultat.debut = data.exercice.debut;
                resultat.fin = data.exercice.fin;
                console.log(resultat.debut);
                console.log(resultat.fin);
                console.log("tafiditra :"+resultat);
                result(resultat);
            } else {
                console.log("La réponse n'est pas au format JSON");
            }
        }
        else{
            console.log("Erreur sur la requête de recupExercice");
        }
    };
    request.onerror = function() {
        console.log("La requête a échoué");
    };
    request.send();
}


        
        function recupData(compte, debut, fin) {
            const request = new XMLHttpRequest();
            const url = "<?php echo site_url(); ?>CodeGrandLivre/afficheGrandLivre/"+compte+"/"+debut+"/"+fin;
            request.open("GET", url, true);
            request.onload = function() {
                if( request.status >= 200 && request.status < 400 ){
                    console.log("La requête a réussi !");
                    const response = request.responseText.trim();
                    // const r = response.substr(response , 0);
                    console.log("reponse = ", response);
                    if (response.startsWith("{") && response.endsWith("}")) { // Vérifier que la réponse est au format JSON
                        const data = JSON.parse(response);
                        const details = data.details;
                        const debug_message = data.debug_message;
                        // const liste = data.details;
                        const SommeDebitCredit = data.sumDC;
                        const resteSolde = data.resteSolde;
                        console.log("debug_message = ", debug_message);
                        // console.log("liste = ", liste);
                        console.log("Je suis laaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
                        createTable(details);
                        createPetiteTable(SommeDebitCredit, resteSolde);

                    } else {
                        console.log("La réponse n'est pas au format JSON");
                    }
                }
                else{
                    console.log("Erreur sur la requette de recupData");
                }
            };
            request.onerror = function() {
                console.log("La requete a echoue");
            };
            request.send();
        }

        function createTable(accounts) {
            var tableBody = document.getElementById("tableBody");

            tableBody.innerHTML = "";

            accounts.forEach(function(account, index) {
                var row = document.createElement("tr");

                var numeroCell = document.createElement("td");
                var intituleCell = document.createElement("td");
                var dateCell = document.createElement("td");
                var journalCell = document.createElement("td");
                var debitCell = document.createElement("td");
                var creditCell = document.createElement("td");

                numeroCell.textContent = account['num'];
                intituleCell.textContent = account["compte"];
                dateCell.textContent = account['date'];
                journalCell.textContent = account['intitule']
                debitCell.textContent = account['debit'];
                creditCell.textContent = account['credit'];

                row.appendChild(numeroCell);
                row.appendChild(intituleCell);
                row.appendChild(dateCell);
                row.appendChild(journalCell);
                row.appendChild(debitCell);
                row.appendChild(creditCell);

                tableBody.appendChild(row);
            });
        }

        function createPetiteTable(accounts, reste) {
            var rowExemple = document.getElementById("row");
            rowExemple.innerHTML = "";

            var lg2 = document.createElement("div");
            lg2.classList.add("col-lg-2");
            var lg6 = document.createElement("div");
            lg6.classList.add("col-lg-6");
            var card = document.createElement("div");
            card.classList.add("card");
            var cardBody = document.createElement("div");
            cardBody.classList.add("card-body");
            var table = document.createElement("table");
            table.classList.add("table");
            
            // Thead
            var thead = document.createElement("thead");

            var rowHead = document.createElement("tr");
            var thTheme = document.createElement("th");
            var thDebit = document.createElement("th");
            var thCredit = document.createElement("th");

            thTheme.textContent = "";
            thDebit.textContent = "Debit";
            thCredit.textContent = "Credit";

            rowHead.appendChild(thTheme);
            rowHead.appendChild(thDebit);
            rowHead.appendChild(thCredit);

            thead.appendChild(rowHead);

            //Tbody
            var tbody = document.createElement("tbody");

            var rowBody1 = document.createElement("tr");
            var tdTheme1 = document.createElement("td");
            var tdDebit1 = document.createElement("td");
            var tdCredit1 = document.createElement("td");

            tdTheme1.textContent = "Totaux";
            tdDebit1.textContent = accounts.sumd;
            tdCredit1.textContent = accounts.sumc;

            rowBody1.appendChild(tdTheme1);
            rowBody1.appendChild(tdDebit1);
            rowBody1.appendChild(tdCredit1);

            var rowBody2 = document.createElement("tr");
            var tdTheme2 = document.createElement("td");
            var tdDebit2 = document.createElement("td");
            var tdCredit2 = document.createElement("td");

            tdTheme2.textContent = "Reste Solde";
            if(reste < 0){
                tdDebit2.textContent = (reste*(-1));
                tdCredit2.textContent = 0;
            }else{
                tdDebit2.textContent = 0;
                tdCredit2.textContent = reste;
            }
            

            rowBody2.appendChild(tdTheme2);
            rowBody2.appendChild(tdDebit2);
            rowBody2.appendChild(tdCredit2);

            tbody.appendChild(rowBody1);
            tbody.appendChild(rowBody2);

            table.appendChild(thead);
            table.appendChild(tbody);
            cardBody.appendChild(table);
            card.appendChild(cardBody);
            lg6.appendChild(card);

            rowExemple.appendChild(lg2);
            rowExemple.appendChild(lg6);
        }
    </script>

<?php
    $this->load->view("pages/templates/footer");
?>