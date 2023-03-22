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
                            <form action="<?php echo site_url(); ?>CodeJournal/ModifierUnCode" method="post">
                                <h2 class="text-center">Modifier un code journal</h2>
                                <input class="form-control" type="text" name="id" value="<?php echo $code->id; ?>" hidden>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input class="form-control" type="text" value="<?php echo $code->code; ?>" name="code">
                                    </div>
                                    <div class="form-group">
                                        <label>Intitule</label>
                                        <input class="form-control" type="text" value="<?php echo $code->intitule; ?>" name="intitule">
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