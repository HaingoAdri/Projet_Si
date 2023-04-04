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
                    <h5 class="card-title">Ajout Taux d'equivalence en <?php echo $liste[0]->devise; ?></h5>
                        <form action="<?php echo site_url(); ?>Devises/ajoutTauxDevise" method="post" class="">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                            <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="idDevise" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Devise</option>
                            <?php for($i=1; $i<count($liste); $i++) { ?>
                                <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->devise; ?></option>
                            <?php } ?>
                            </select>
                            <label for="floatingSelect">Devise</label>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Prix</label>
                            <div class="col-sm-10">
                            <input type="number" name="taux" class="form-control">
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
                    <h5 class="card-title">Liste(s) Taux d'equivalence</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Devise</th>
                                <th scope="col">Taux en <?php echo $liste[0]->devise; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($taux); $i++) { ?>
                                <tr>
                                    <th scope="row"><?php echo $i+1; ?></th>
                                    <td><?php echo $taux[$i]->date; ?></td>
                                    <td><?php echo $taux[$i]->devise; ?></td>
                                    <td><?php echo $taux[$i]->taux; ?></td>
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