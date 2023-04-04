<?php
  $this->load->view("pages/templates/header");
?>
<style>
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        border-radius: 4px;
        color: #555;
        font-size: 16px;
    }

    .custom-file-upload:hover {
        background-color: #009BDE;
        color: white;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload i {
        margin-right: 5px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById('file-input');
        const fileName = document.getElementById('file-name');
        const fileNameContainer = document.getElementById('file-name-container');

        fileInput.addEventListener('change', () => {
            fileName.textContent = "Le fichier selectionne est " + fileInput.files[0].name;
            fileNameContainer.classList.remove('d-none');
        });
    });


</script>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Ajouter un nouveau compte</h5>
                        <form  action="<?php echo site_url(); ?>CompteGeneral/ajoutNouveauCompte" method="post">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Compte</label>
                            <div class="col-sm-10">
                                <input type="text" name="numero" class="form-control" placeholder="Entrer Numero Du Compte">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Intitule</label>
                            <div class="col-sm-10">
                                <input type="text" name="intitule" class="form-control"  placeholder="Entrer Intitule Du Compte">
                            </div>
                        </div>
                        <?php if(isset($erreurAjoutSimple)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erreurAjoutSimple; ?>
                            </div>                        
                        <?php  } ?>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Ajouter de(s) nouveau(x) compte(s)</h5>
                        <form  action="<?php echo site_url(); ?>CompteGeneral/lireFichier" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="custom-file-upload">
                                <input type="file" name="file" id="file-input" size="20" />
                                <i class="fa fa-cloud-upload"></i> Choisissez un fichier
                            </label>
                        </div>
                        <div class="alert alert-success d-none" id="file-name-container" role="alert">
                            <p id="file-name"></p>
                        </div>
                        <?php if(isset($erreur)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erreur; ?>
                            </div>                        
                        <?php  } ?>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                            <div class="col-md-4">
                                <h5 class="card-title">Plan du Compte General</h5>
                            </div>
                            <div class="col-md-8">
                                <form method="post" action="<?php echo site_url()?>CompteGeneral/searchajout" class="">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search"/>
                                        <button type="submit" class="btn btn-outline-secondary">search</button>
                                    </div>
                                </form>
                            </div>
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Compte</th>
                                <th>Intitule du compte</th>
                                <th>Modifier</th>
                                <th>Exist</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i+1; ?></th>
                                        <td><?php echo $liste[$i]->numero; ?></td>
                                        <td><?php echo $liste[$i]->intitule; ?></td>
                                        <td><a href="<?php echo site_url(); ?>CompteGeneral/modifier/<?php echo $liste[$i]->id; ?>"><button type="button" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></button></a></td>
                                        <?php if(($liste[$i]->exist)=="0") { ?>
                                            <td><a href="<?php echo site_url(); ?>CompteGeneral/supprimer/<?php echo $liste[$i]->id; ?>"><button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></a></td>
                                        <?php } else { ?>
                                            <td><a href="<?php echo site_url(); ?>CompteGeneral/restaurer/<?php echo $liste[$i]->id;; ?>"><button type="button" class="btn btn-outline-info"><i class="bi bi-reply"></i></button></a></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
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