<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Listes des devises</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Devise</th>
                                <th scope="col">Exist</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i+1; ?></th>
                                        <td><?php echo $liste[$i]->devise; ?></td>
                                        <?php if($liste[$i]->exist==0 && $i!=0) { ?>
                                            <td><a href="<?php echo site_url(); ?>Devises/supprimer/<?php echo $liste[$i]->id; ?>"><button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></a></td>
                                        <?php } else if($liste[$i]->exist==1 && $i!=0) { ?>
                                            <td><a href="<?php echo site_url(); ?>Devises/restaurer/<?php echo $liste[$i]->id;; ?>"><button type="button" class="btn btn-outline-info"><i class="bi bi-reply"></i></button></a></td>
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