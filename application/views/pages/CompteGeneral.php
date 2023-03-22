<?php
  $this->load->view("pages/templates/header");
?>
    <div class="content">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Compte General</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">      
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body ">
                            <section class="contact-clean">
                                <form action="<?php echo site_url(); ?>CompteGeneral/ajoutNouveauCompte" method="post">
                                    <h2 class="text-center">Ajouter nouveau un compte</h2>
                                    <br>
                                    <div class="form-group">
                                        <label>Compte</label>
                                        <input class="form-control" type="number" name="numero" placeholder="Entrer Numero Du Compte">
                                    </div>
                                    <div class="form-group">
                                        <label>Intitule</label>
                                        <input class="form-control" type="text" value="" name="intitule" placeholder="Entrer Intitule Du Compte">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Ajouter</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Plan Comptable</strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Compte</th>
                                        <th>Intitule du compte</th>
                                        <th>Modifier</th>
                                        <th>Exist</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($liste); $i++) { ?>
                                    <tr>
                                        <td class="serial"><?php echo $i+1; ?>.</td>
                                        <td><?php echo $liste[$i]->numero; ?></td>
                                        <td><?php echo $liste[$i]->intitule; ?></td>
                                        <td><a href="<?php echo site_url(); ?>CompteGeneral/modifier/<?php echo $liste[$i]->id; ?>"><span class="badge badge-primary">Modifier</span></a></td>
                                        <?php if(($liste[$i]->exist)=="0") { ?>
                                        <td><a href="<?php echo site_url(); ?>CompteGeneral/supprimer/<?php echo $liste[$i]->id; ?>"><span class="badge badge-pending">Supprimer</span></a></td>
                                        <?php } else { ?>
                                        <td><a href="<?php echo site_url(); ?>CompteGeneral/restaurer/<?php echo $liste[$i]->id;; ?>"><span class="badge  badge-complete">Restaurer</span></a></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#planComptableTable').DataTable({
                'processing': true,
                'serverSide':true,
                'serverMethod':'post',
                'ajax':{
                    'url':'<?=base_url()?>CompteGeneral/listPlanComptable'
                },
                'columns':[
                    {data:'numero'},
                    {data:'intitule'},
                ]
            });
        });
    </script>
<?php
    $this->load->view("pages/templates/footer");
?>