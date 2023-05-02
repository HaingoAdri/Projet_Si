<div class="col-lg-5" style="width: 130%;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Importer des nouveaux journaux</h5>
            <form  action="<?php echo site_url(); ?>journal/lireFichier" method="post" enctype="multipart/form-data">
                <input type="number" name="idExercice" id="idExercice" value="0" hidden>
                <input type="number" name="idDevise" id="idDevise" value="0" hidden>
                <div class="row mb-3">
                    <label class="custom-file-upload">
                        <input type="file" name="file" id="file-input" size="20" />
                        <i class="fa fa-cloud-upload"></i> Choisissez un fichier
                    </label>
                </div>
                <div class="alert alert-success d-none" id="file-name-container" role="alert">
                    <p id="file-name"></p>
                </div>
                <?php if(isset($_GET['erreurLire'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['erreurLire']; ?>
                </div>                        
                <?php  } ?>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 90%;">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>