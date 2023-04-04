<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription</title>
    <meta name="description" content="Inscription">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body>
    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Inscription</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <form action="inscription/inscription" method="post" class="col-12" style="display: flex;">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Formulaire du Compagnie</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Date de Creation</label>
                                    <input type="date" id="vat" name="dateCreation" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Compagnie</label>
                                    <input type="text" id="company" name="nomEntreprise" placeholder="Entrer le nom de votre compagnie" class="form-control" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Objet</label></div>
                                    <div class="col-12 col-md-9"><textarea name="objet" id="textarea-input" rows="3" placeholder="Objet..." class="form-control" required></textarea></div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="x_card_code" class="control-label mb-1">Status d'Etat</label>
                                        <div class="input-group">
                                            <select name="status" id="select" class="form-control" required>
                                                <option>Status</option>
                                                <?php for($i=0; $i<count($typeStatus); $i++) { ?>
                                                <option value=<?php echo $typeStatus[$i]['id']; ?>><?php echo $typeStatus[$i]['type']; ?></option>
                                                <?php } ?>
                                            </select>      
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Numero</label>
                                            <input id="cc-exp" name="numeroStatus" type="text" class="form-control cc-exp"  placeholder="Numero du Status d'Etat" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Capital</label>
                                            <input id="cc-exp" name="capital" type="number" class="form-control cc-exp"  placeholder="Capital" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Devise Tenu Compte</label>
                                        <div class="input-group">
                                            <select name="deviseTenuCompte" id="select" class="form-control" required>
                                                <option>Devise</option>
                                                <?php for($i=0; $i<count($listeDevise); $i++) { ?>
                                                <option value=<?php echo $listeDevise[$i]['id']; ?>><?php echo $listeDevise[$i]['devise']; ?></option>
                                                <?php } ?>
                                            </select>      
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="postal-code" class=" form-control-label">Date Lieu</label>
                                            <input type="date" id="postal-code" name="dateLieu" placeholder="Postal Code" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Lieu</label>
                                            <input type="text" id="city" placeholder="Entrer le lieu" name="lieu" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Adresse</label>
                                            <input type="text" id="city" placeholder="Entrer l'Adresse" name="adresse" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Telephone</label>
                                            <input type="number" id="city" placeholder="Numero de telephone" name="telephone" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Dirigeant du Compagnie</strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Dirigeant</h3>
                                        </div>
                                        <hr>
                                        <!-- <form action="#" method="post" novalidate="novalidate"> -->
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Date</label>
                                                <input id="cc-name" name="date" type="date" class="form-control cc-name valid" data-val="true" placeholder="Entrer le date du dirigeant" required >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Nom</label>
                                                <input id="cc-name" name="nom" type="text" class="form-control cc-name valid" data-val="true" placeholder="Entrer le nom du dirigeant" required >
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Prenom</label>
                                                <input id="cc-name" name="prenom" type="text" class="form-control cc-name valid" data-val="true" placeholder="Entrer le prenom du dirigeant" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                <input id="cc-name" name="email" type="email" class="form-control cc-name valid" data-val="true" placeholder="Entrer le email du dirigeant" required>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Mot de Passe</label>
                                                <input id="cc-name" name="password" type="password" class="form-control cc-name valid" data-val="true" placeholder="Entrer le Mot de Passe" required >
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">S'inscrire</button>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="register-link m-t-15 text-center">
                                <p>Already have account ? <a href="login"> Sign in</a></p>
                        </div>
                        </div> 

                    </div>
                    </form>
                </div>
            </div>
        </div>

                    


    </div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/assets/js/main.js"></script>


</body>
</html>
