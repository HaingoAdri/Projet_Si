<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">

    <section class="section" id="actif">
        <br  style="margin-top:5%;">

        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#actif">Actif</a></li>
                                    <li class="breadcrumb-item"><a href="#passif">Passif</a></li>
                                    <li class="breadcrumb-item active"><a href="#resultat">Resultat</a></li>
                                </ol>
                            </nav>
                        </div>

                        <span><span class="card-title">SOCIETE :</span> <?php echo $_SESSION["nom"]; ?></span>
                        <br>
                        <span><span class="card-title">ADRESSE :</span>
                        <?php if($listeAdresse[0]['exist']==0) {?><?php echo $listeAdresse[0]['valeur']; ?><?php } ?>
                        </span>
                        <br>
                        <span><span class="card-title">CAPITAL :</span> <?php echo $_SESSION["capital"]; ?></span>
                        <br>
                        <span><span class="card-title">CIF :</span></span>
                        <br>
                        <span><span class="card-title">STAT :</span><?php echo $status->type; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div class="card text-center">
                    <h3 class="card-title"> BILAN ACTIF</h3>
                    <div class="card-body" style="margin-top:-3%">
                        EXERCICE CLOS AU <strong><?php echo $finTemporaire; ?></strong>.
                        <br>
                        <span> Unite monetaire: <span class="card-title">ARIARY</span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col col-6">ACTIF</th>
                                    <th class="col col-2">COMPTE</th>
                                    <th class="col col-2" style="text-align:center" colspan="3">December-12</th>
                                    <th class="col col-2">December-20</th>
                                </tr>
                                <tr>
                                    <th class="col col-6"></th>
                                    <th class="col col-2"></th>
                                    <th class="col col-2" style="text-align:center" colspan="3">MONTANT</th>
                                    <th class="col col-2"></th> 
                                </tr>
                                <tr>
                                    <th class="col col-6"></th>
                                    <th class="col col-2"></th>
                                    <th class="col col-1">Brut</th>
                                    <th class="col col-1">Amort./Prov.</th>
                                    <th class="col col-1">Net</th>
                                    <th class="col col-2"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th class="col col-6">ACTIFS NON COURANT</th>
                                    <td class="col col-2"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">Immobilisations Incorporelles</td>
                                    <td class="col col-2">20</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">Immobilisations Corporelles</td>
                                    <td class="col col-2">21</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">Immobilisations Biologiques</td>
                                    <td class="col col-2">22</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">Immobilisations En Cours</td>
                                    <td class="col col-2">23</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">Immobilisations Financieres</td>
                                    <td class="col col-2">25</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">Impots Differes</td>
                                    <td class="col col-2">13</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <th class="col col-6">TOTAL ACTIFS NON COURANTs</th>
                                    <td class="col col-2"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <th class="col col-6">ACTIFS COURANTs</th>
                                    <td class="col col-2"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">STOCKS ET EN COURS</td>
                                    <td class="col col-2">3</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">CREANCES ET EMPLOIS ASSIMILES</td>
                                    <td class="col col-2">4...</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <td class="col col-6">TRESORERIE ET EQUIVALENTS DE TRESORERIE</td>
                                    <td class="col col-2">5...</td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <th class="col col-6">TOTAL ACTIFS COURANTS</th>
                                    <td class="col col-2"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                                <tr>
                                    <th class="col col-6">TOTAL DES ACTIFS</th>
                                    <td class="col col-2"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-1"></td>
                                    <td class="col col-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="section" id="passif">
        <br  style="margin-top:5%;">

        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#actif">Actif</a></li>
                                    <li class="breadcrumb-item"><a href="#passif">Passif</a></li>
                                    <li class="breadcrumb-item active"><a href="#resultat">Resultat</a></li>
                                </ol>
                            </nav>
                        </div>
                        <span><span class="card-title">SOCIETE :</span> <?php echo $_SESSION["nom"]; ?></span>
                        <br>
                        <span><span class="card-title">ADRESSE :</span>
                        <?php if($listeAdresse[0]['exist']==0) {?><?php echo $listeAdresse[0]['valeur']; ?><?php } ?>
                        </span>
                        <br>
                        <span><span class="card-title">CAPITAL : </span> <?php echo $_SESSION["capital"]; ?></span>
                        <br>
                        <span><span class="card-title">CIF :</span></span>
                        <br>
                        <span><span class="card-title">STAT : </span><?php echo $status->type; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div class="card text-center">
                    <h3 class="card-title"> BILAN PASSIF</h3>
                    <div class="card-body" style="margin-top:-3%">
                        EXERCICE CLOS AU <strong><?php echo $finTemporaire; ?></strong>.
                        <br>
                        <span> Unite monetaire: <span class="card-title">ARIARY</span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th style="text-align:center">December-12</th>
                                    <th>December-20</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>COMPTE</th>
                                    <th>MONTANT</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>CAPITAUX PROPRES</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Capital Emis</td>
                                    <td>101</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Reserves Legales</td>
                                    <td>105</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Resultats en instance d'affectation</td>
                                    <td>128.</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Resultat Net</td>
                                    <td>120</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Autres Capitaux Propres</td>
                                    <td>11</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>TOTAL DES CAPITAUX PROPRES</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>PASSIFS NON-COURANTS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Impots differes</td>
                                    <td>13</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Emprunts/dettes a LMT part+1an</td>
                                    <td>161</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;">TOTAL PASSIFS NON-COURANTS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>PASSIFS COURANTS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Emprunts/dettes a LMT part-1an</td>  
                                    <td>161</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Dettes court terme</td>  
                                    <td>165</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fournisseurs et comptes rattaches</td>  
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Avances recues des clients</td>  
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Autres dettes</td>  
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Comptes de tresorerie</td>  
                                    <td>5</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;">TOTAL PASSIFS COURANTS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>TOTAL DES CAPITAUX PROPRES ET PASSIFS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="resultat">
        <br  style="margin-top:5%;">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="pagetitle">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#actif">Actif</a></li>
                                    <li class="breadcrumb-item"><a href="#passif">Passif</a></li>
                                    <li class="breadcrumb-item active"><a href="#resultat">Resultat</a></li>
                                </ol>
                            </nav>
                        </div>

                        <span><span class="card-title">SOCIETE :</span> <?php echo $_SESSION["nom"]; ?></span>
                        <br>
                        <span><span class="card-title">ADRESSE :</span>
                        <?php if($listeAdresse[0]['exist']==0) {?><?php echo $listeAdresse[0]['valeur']; ?><?php } ?>
                        </span>
                        <br>
                        <span><span class="card-title">CAPITAL :</span> <?php echo $_SESSION["capital"]; ?></span>
                        <br>
                        <span><span class="card-title">CIF :</span></span>
                        <br>
                        <span><span class="card-title">STAT : </span><?php echo $status->type; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-lg-center">
            <div class="col-lg-8">
                <div class="card text-center">
                    <h3 class="card-title"> COMPTE DE RESULTAT</h3>
                    <span style="margin-top: -4%;">(Par nature)</span>
                    <div class="card-body">
                        Periode du <strong><?php echo $debut; ?></strong> au <strong><?php echo $finTemporaire; ?></strong>.
                        <br>
                        <span> Unite monetaire: <span class="card-title">ARIARY</span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th></th>
                                <th>Note</th>
                                <th>December-N</th>
                                <th>December-N-1</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chiffres d'affaires</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum70']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Production Stockee</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum71']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <th>I. PRODUCTION DE L'EXERCICE</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['productionExercice']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td>Achats Consommes</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum60']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Services Exterieurs et autres consommations</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum61_62']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <th>II. CONSOMMATION DE L'EXERCICE</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['consommationExercice']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                    <th>III. VALEUR AJOUTEE D'EXPLOITATION (I-II)</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['valeurAjouteeExploitation']; ?></th>
                                    <th class="alignright"></th>
                                </tr>
                                <tr>
                                    <td>Charges de personnels</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum64']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Impots, Taxes et versements assimiles</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum63']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <th>IV. EXCEDENT BRUT D'EXPLOITATION</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['excedentBrutExploitation']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                    <td>Autres Produits Operationnels</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum75']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Autres Charges Operationnels</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum65']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Dotations aux ammortissements, aux provisions et pertes de valeur</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum68']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Reprise sur provisions et pertes de valeurs</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum78']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <th>V. RESULTAT OPERATIONNEL</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['resultatOperationnel']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                    <td>Produits financiers</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum76']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Charges financieres</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum66']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <th>VI. RESULTAT FINANCIER</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['resultatFinancier']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                    <th>VII. RESULTAT AVANT IMPOTS(V + VI)</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['resultatAvantImpot']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                    <td>Impots exigibles sur resultats</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $totalResultats['impotExisibleSurResultat']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Impots differes (Variations)</td>
                                    <td></td>
                                    <td class="alignright"></td>
                                    <td class="alignright"></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center">TOTAL DES PRODUITS DES ACTIVITES ORDINAIRES</th>
                                    <th></th>
                                    <th class="alignright">0</th>
                                    <th class="alignright"></th>
                                </tr>
                                <tr>
                                    <th style="text-align:center">TOTAL DES CHARGES DES ACTIVITES ORDINAIRES</th>
                                    <th></th>
                                    <th class="alignright">0</th>
                                    <th class="alignright"></th>
                                </tr>
                                <tr>
                                    <th>VIII. RESULTAT NET DES ACTIVITES ORDINAIRES</th>
                                    <th></th>
                                    <th class="alignright">0</th>
                                    <th class="alignright"></th>
                                </tr>
                                <tr>
                                    <td>Elements extraordinaires(produits)</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum77']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <td>Elements extraordinaires (charges)</td>
                                    <td></td>
                                    <td class="alignright"><?php echo $resultatSimple['sum67']; ?></td>
                                    <td class="alignright">0</td>
                                </tr>
                                <tr>
                                    <th>IX. RESULTAT EXTRAORDINAIRE</th>
                                    <th></th>
                                    <th class="alignright"><?php echo $totalResultats['resultatExtraordinaire']; ?></th>
                                    <th class="alignright">0</th>
                                </tr>
                                <tr>
                                    <th>X. RESULTAT NET DE L'EXERCICE</th>
                                    <th></th>
                                    <th class="alignright"></th>
                                    <th class="alignright"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
    $this->load->view("pages/templates/footer");
?>