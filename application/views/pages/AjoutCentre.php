<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Ajouter un nouveau Centre</h5>
                        <form  action="<?php echo site_url(); ?>Centre/AjoutNouveauCentre" method="post">
                        <div class="row mb-3">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Intitule</label>
                            <div class="col-sm-10">
                                <input type="text" name="intitule" class="form-control"  placeholder="Entrer Intitule Du Centre">
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="idtypecentre" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="" selected>Type de Centre</option>
                                <?php for($i=0; $i<count($listetypeCentre); $i++) { ?>
                                    <option value="<?php echo $listetypeCentre[$i]['idtypecentre']; ?>"><?php echo $listetypeCentre[$i]['intitule']; ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingSelect">Type de Centre</label>
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


            <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11">

                <div class="card">
                    <div class="card-body">
                            <div class="col-md-4">
                                <h5 class="card-title">Les Centres</h5>
                            </div>
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Intitule</th>
                                <th>Type de centre</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i+1; ?></th>
                                        <td><?php echo $liste[$i]->Intitule; ?></td>
                                        <td><?php echo $liste[$i]->typecentre; ?></td>
                                        <td><a href=""><button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></a></td>
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