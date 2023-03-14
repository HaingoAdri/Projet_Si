<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Afficher Compte</title>
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
                                <h1>Afficher compte</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">      
                <div class="col-lg-6">
                    <!-- <div class="card"> -->
                        <!-- <div class="card-header">Afficher compte</div> -->
                        <div class="card-body card-block">
                            
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom_Categories</th>
                                            <th scope="col">Num_compte</th>
                                            <th scope="col">Nom_Compte</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=0; $i<count($comptes); $i++) { ?>
                                            <tr>
                                                <th><?php echo $comptes[$i]['id_compte']; ?></th>
                                                <th><?php echo $comptes[$i]['nom_categorie']; ?></th>
                                                <th><?php echo $comptes[$i]['num_compte']; ?></th>
                                                <td><?php echo $comptes[$i]['nom_compte']; ?></td>
                                               
                                                <td>
                                                    <form method="post" action="<?php echo base_url('compte/suppr'); ?>">
                                                        <input type ="hidden" name="id" value="<?php echo $comptes[$i]['id_compte']; ?>">
                                                        <button type="submit"  class="btn btn-danger btn-sm">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?php echo site_url('compte/index ')?>">Retour Ajout Compte</a>
                                <!-- <br> -->
                                <hr>
                                <h3>Modifier Compte</h3>
                                <!-- <div class="card-body card-block"> -->
                                    <form  method="post" action="<?php echo site_url('compte/modif'); ?>" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number"  name="id_comp" placeholder="Id_compte" class="form-control" required> 
                                            </div> 
                                        </div>  
                                        <div class="form-group">  
                                            <div class="input-group">
                                                <input type="text"  name="cat" placeholder="Categories" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number"  name="num_Co" placeholder="Num de compte" class="form-control" required>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text"  name="nom_Co" placeholder="Nom Compte" class="form-control" required>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Ajouter</button></div>
                                    </form>
                                <!-- </div> -->
                </div>
                        </div>  
                    </div>
                </div>
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
