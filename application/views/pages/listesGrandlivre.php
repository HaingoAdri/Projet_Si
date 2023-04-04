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
                    <h5 class="card-title">Les Exercices de cette entreprise</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Debut d'exercice</th>
                                <th>Fin d'Exercice</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php for($i=0; $i<count($exercices); $i++) { ?>
                            <tr>
                                <td class="serial"><?php echo $i+1; ?>.</td>
                                <td><?php echo $exercices[$i]['debut']; ?></td>
                                <td><?php echo $exercices[$i]['fin']; ?></td>
                                <td><a href="<?php echo site_url();?>/CodeGrandLivre/affichecodes/<?php echo $exercices[$i]['debut'];?>/<?php echo $exercices[$i]['fin'];?>">Voir les Codes</a></td>
                            </tr>
                            <?php } ?>

                                <?php for($i=0; $i<count($exercices); $i++) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i+1; ?></th>
                                        <td><?php echo $exercices[$i]['debut']; ?></td>
                                        <td><?php echo $exercices[$i]['fin']; ?></td>
                                        <td><a href="<?php echo site_url();?>/CodeGrandLivre/affichecodes/<?php echo $exercices[$i]['debut'];?>/<?php echo $exercices[$i]['fin'];?>">Voir les Codes</a></td>
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