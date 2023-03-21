<?php
  $this->load->view("pages/templates/header");
?>
<div class="content">
    <div class="content">
    <div class="animated fadeIn">
        <div class="row">      
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <section class="contact-clean">
                            <form action="<?php echo site_url(); ?>CompteGeneral/ModifierUnCompte" method="post">
                                <h2 class="text-center">Modifier un compte</h2>
                                <input class="form-control" type="text" name="id" value="<?php echo $Compte->id; ?>" hidden>
                                <div class="form-group">
                                    <label>Compte</label>
                                    <input class="form-control" type="number" value="<?php echo $Compte->numero; ?>" name="numero">
                                    </div>
                                    <div class="form-group">
                                        <label>Intitule</label>
                                        <input class="form-control" type="text" value="<?php echo $Compte->intitule; ?>" name="intitule">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php
    $this->load->view("pages/templates/footer");
?>