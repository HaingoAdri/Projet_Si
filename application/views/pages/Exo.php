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
                    <h5 class="card-title">Choix Exercices</h5>
                        <form  method="post" action="<?php echo site_url(); ?>exercice/insertExo" class="">

                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Debut</label>
                            <div class="col-sm-10">
                                <input type="date" name="debut" class="form-control" required>
                            </div>
                        </div>
                        <?php if(isset($erreur)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erreur; ?>
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
        </div>

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Voir Exercices</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Debut</th>
                                <th>Fin</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($liste); $i++){?>
                                    <tr>
                                        <th scope="row"><?php echo $liste[$i]['id']; ?></th>
                                        <td><?php echo $liste[$i]['debut']; ?></td>
                                        <td><?php echo $liste[$i]['fin']; ?></td>
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