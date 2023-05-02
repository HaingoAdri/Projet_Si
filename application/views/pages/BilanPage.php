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
                    <h5 class="card-title">Chercher le bilan du:</h5>
                        <form  method="post" action="<?php echo site_url(); ?>EtatsFinanciers/showResultat" class="">

                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-10">
                                <input type="date" name="dateEntre" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Regarder</button>
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