<?php
  $this->load->view("pages/templates/header");
?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajout devise</h5>
                    <form action="<?php echo site_url(); ?>Devises/ajouterNouveauDevise" method="post" class="">
                    <div class="form-floating mb-3">
                        <select name="idDevise" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Devise</option>
                            <?php for($i=0; $i<count($liste); $i++) { ?>
                                <option value="<?php echo $liste[$i]['id']; ?>"><?php echo $liste[$i]['devise']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="floatingSelect">Devise</label>
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
    </selection>
</maim>
<?php
    $this->load->view("pages/templates/footer");
?>