<?php
  $this->load->view("pages/templates/header");
?>

<script>
    function checkInputLength(){
        const input = document.getElementById("numero").value;
        if(input.length >= 5){
            console.log("Oui aki anh");
            document.getElementById("numero").classList.remove("is-invalid");
            document.getElementById("numero").classList.add("is-valid");
        }else {
            console.log("Non be mitsiny");
            document.getElementById("numero").classList.add("is-invalid");
        }
    }
</script>

<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Ajout Nouveau Compte Tiers</h5>
                        <form  method="post" action="<?php echo site_url()?>CompteTiers/ajoutNouveauCompteTiers" class="">
                        <div class="form-floating mb-3">
                            <select name="idType" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                <option selected>Compte</option>
                                <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <option value="<?php echo $liste[$i]->id; ?>"><?php echo $liste[$i]->numero; ?> <?php echo $liste[$i]->intitule; ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingSelect">Compte Tiers</label>
                        </div>

                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Numero</label>
                            <div class="col-sm-10">
                                <input type="text" id="numero" name="numero" class="form-control" placeholder="Numero du compte tiers"  oninput="checkInputLength()"  required>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Intitule</label>
                            <div class="col-sm-10">
                                <input type="text" name="intitule" class="form-control" placeholder="Intitule du compte tier" required>
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
                    <h5 class="card-title">Plan Tiers</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Type</th>
                                <th>Numero</th>
                                <th>Intitule du compte</th>
                                <th>Modifier</th>
                                <th>Exist</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0; $i<count($planTiers); $i++) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $planTiers[$i]->compte ?></th>
                                        <td><?php echo $planTiers[$i]->numero; ?></td>
                                        <td><?php echo $planTiers[$i]->intitule; ?></td>
                                        <td><a href="<?php echo site_url(); ?>CompteTiers/modifier/<?php echo $planTiers[$i]->id; ?>"><button type="button" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></button></a></td>
                                        <?php if(($planTiers[$i]->exist)=="0") { ?>
                                            <td><a href="<?php echo site_url(); ?>CompteTiers/supprimer/<?php echo $planTiers[$i]->id; ?>"><button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></button></a></td>
                                        <?php } else { ?>
                                            <td><a href="<?php echo site_url(); ?>CompteTiers/restaurer/<?php echo $planTiers[$i]->id;; ?>"><button type="button" class="btn btn-outline-info"><i class="bi bi-reply"></i></button></a></td>
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