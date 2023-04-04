<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Listes des adresses</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Valeur</th>
                                <th scope="col">Exist</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i+1; ?></th>
                                        <td><?php echo $liste[$i]['date']; ?></td>
                                        <td><?php echo $liste[$i]['type']; ?></td>
                                        <td><?php echo $liste[$i]['valeur']; ?></td>
                                        <?php if($liste[$i]['exist']==0) { ?>
                                            <td><a href="<?php echo site_url(); ?>Adresses/supprimer/<?php echo $liste[$i]['id']; ?>"><button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></a></td>
                                        <?php } else { ?>
                                            <td><a href="<?php echo site_url(); ?>Adresses/restaurer/<?php echo $liste[$i]['id']; ?>"><button type="button" class="btn btn-outline-info"><i class="bi bi-reply"></i></button></a></td>
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