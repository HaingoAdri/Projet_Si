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
                    <h5 class="card-title">Ajout Nouveau Code Journal</h5>
                        <form method="post" action="<?php echo site_url()?>CodeJournal/ajoutNouveauCode" class="">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" class="form-control" placeholder="Inserer nouveau code journal">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Intitule</label>
                            <div class="col-sm-10">
                                <input type="text" name="intitule" class="form-control" placeholder="Intitule du nouveau code journal">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
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
                    <h5 class="card-title">Code Journaux</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">#Id Code</th>
                                <th scope="col">Code</th>
                                <th scope="col">Intitule du code</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Exist</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($liste); $i++) { ?>
                                <tr>
                                    <th scope="row"><?php echo $i+1; ?></th>
                                    <th scope="row"><?php echo $liste[$i]->id; ?></th>
                                    <td><?php echo $liste[$i]->code; ?></td>
                                    <td><?php echo $liste[$i]->intitule; ?></td>
                                    <td><a href="<?php echo site_url(); ?>CodeJournal/Modifier/<?php echo $liste[$i]->id; ?>"><button type="button" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></button></a></td>
                                    <?php if(($liste[$i]->exist)=="0") { ?>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/supprimer/<?php echo $liste[$i]->id; ?>"><button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></a></td>
                                    <?php } else { ?>
                                        <td><a href="<?php echo site_url(); ?>CodeJournal/restaurer/<?php echo $liste[$i]->id; ?>"><button type="button" class="btn btn-outline-info"><i class="bi bi-reply"></i></button></a></td>
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