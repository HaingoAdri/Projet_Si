<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Afficher Code</title>
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
                                <h1>Afficher code</h1>
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
                    <div class="card">
                        <div class="card-header">Afficher code</div>
                        <div class="card-body card-block">
                            
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom_Code</th>
                                            <th scope="col">Modifier</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=0; $i<count($code); $i++) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $code[$i]['id']; ?></th>
                                                <td><?php echo $code[$i]['nom']; ?></td>
                                                <td>
                                                    <form method="post" action="<?php echo base_url('code/modif'); ?>">
                                                        <input type="hidden" name="id_c" value="<?php echo $code[$i]['id']; ?>">
                                                        <div class="form-group">
                                                            <input type="text" name="name_code"  placeholder="Inserer nom code journaux" class="form-control" required>
                                                        </div>
                                                        <button type="submit"  class="btn btn-info btn-sm">Modifier</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" action="<?php echo base_url('code/suppr'); ?>">
                                                        <input type="hidden" name="id" value="<?php echo $code[$i]['id']; ?>">
                                                        <button type="submit"  class="btn btn-danger btn-sm">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="card-header"><a href="<?php echo site_url('code/index')?>" class="btn btn-Info btn-sm">Ajout Code</a></div>
                    </div>
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
