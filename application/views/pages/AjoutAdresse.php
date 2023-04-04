<?php
  $this->load->view("pages/templates/header");
?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Type d'adresse</h5>
                    <form action="<?php echo site_url(); ?>adresses/insertType" method="post">
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                            <input name="type" class="form-control" placeholder="Nouveau type" required>
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

            <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Nouvelle adresse</h5>
                    <form action="<?php echo site_url(); ?>adresses/insertAdresse" method="post" class="">
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                        <input type="date" name="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="idType" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selecte>Type</option>
                        <?php for($i=0; $i<count($liste); $i++) { ?>
                            <option value="<?php echo $liste[$i]['id']; ?>"><?php echo $liste[$i]['type']; ?></option>
                        <?php } ?>
                        </select>
                        <label for="floatingSelect">Type d'adresse</label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Valeur</label>
                        <div class="col-sm-10">
                        <input type="text" name="valeur" class="form-control" required>
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
        </section>
</main>
<?php
    $this->load->view("pages/templates/footer");
?>