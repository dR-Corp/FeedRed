<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0 text-dark">
                <?= $titrePage; ?>
                <div class="" id="compte_a_rebours"></div>
            </h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php if($article && !empty($article)): ?>
        <div class="row">
          <div class="col-12">
                <!-- Default box -->
            <div class="card elevation-3">
              <div class="card-header bg-primary">
                <h1 class="card-title">Rédaction en cours</h1>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body row">
                <div class="col-sm-10 text-lg">
                    <?= $article->getTitre() ?>
                    <?php if($article->getUrgence() == 1): ?>
                        <span class="ml-2 badge badge-warning">Urgent</span>
                    <?php endif; ?>
                </div>
                <div class="col-sm-2">
                    <span class="badge badge-info badge-md mr-2 mt-2" ><?= $article->getNbrMots() ?> mots</span>
                    <span class="badge badge-info badge-md mt-2"><?= $article->getDelai()."H" ?></span>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer row">
                <div class="mr-2">
                    <a href="vue-article.html~id~<?= $article->getIdArticle() ?>"><button class="btn btn-info btn-sm btn-block mb-1"><i class="fas fa-eye" aria-hidden="true"></i> Voir</button></a>
                </div>
                <div class="mr-2">
                    <button class="btn btn-success btn-sm btn-block mb-1" data-toggle="modal" data-target="#soumettreModal"><i class="fas fa-paper-plane" aria-hidden="true"></i> Soumettre</button>
                </div>
                <div class="mr-2">
                    <a href="laisser-article.html~idArticle~<?= $article->getIdArticle() ?>~idRedacteur~<?= $_SESSION['idRedacteur'] ?>"><button class="btn btn-warning btn-sm btn-block mb-1"><i class="fas fa-trash" aria-hidden="true"></i> Laisser</button></a>
                </div>
                <div class="col-sm-6"></div>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-12">
                <div class="card elevation-3">
                    <div class="card-header" style="background-color: #044687; color: white;">
                        <h1 class="card-title">Aucune rédaction en cours</h1>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card elevation-3">
                    <div class="card-header bg-primary">
                        <h1 class="card-title">Rédactions soumises</h1>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                            /* .mobile-th, .mobile-td {
                                visibility: hidden;
                            } */
                            .mobile-table {
                                visibility: hidden;
                                display: none;
                            }
                            
                            @media screen and (max-width: 500px) {
                                .mobile-table {
                                    visibility: visible;
                                    display: block;
                                }
                                .desktop-table {
                                    visibility: hidden;
                                    display: none;
                                }
                            }
                        </style>
                        <table id="table_redaction" class="table table-bordered table-striped desktop-table">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Article</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th scope="col">Fichier</th>
                                    <th scope="col">Date de rédaction</th>
                                    <th scope="col">Etat</th>
                                    <th hidden scope="col">Correction</th>
                                    <th hidden scope="col">ID Rédaction</th>
                                    <th scope="col">Taux de Plagiat</th>
                                    <th scope="col">Site de vérification du taux</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $num = 0;
                                foreach ($redactions as $redaction) {
                                    $num++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $num ?></th>
                                    <td>
                                        <?php
                                            $art = (new ArticleManager())->find($redaction->getIdArticle());
                                            echo $art->getTitre();
                                        ?>
                                    </td>
                                    <td><?php echo $redaction->getNbrMots() ?></td>
                                    <td class="text-center">
                                        <a download href="<?php echo STORAGES.$redaction->getFichier(); ?>"><i class="fas fa-file" aria-hidden="true"></i></a>
                                    </td>
                                    <td><?php echo $redaction->getDateRedaction() ?></td>
                                    <td>
                                        <?php 
                                            if($redaction->getEtat() == 0 || $redaction->getEtat() == 4) {
                                                echo '<span class="badge badge-info" >En cours d\'examination</span>';
                                            }
                                            else if($redaction->getEtat() == 1) {
                                                echo '<span class="badge badge-success">Validé</span>';
                                            }
                                            else if($redaction->getEtat() == 2) {
                                                echo '<span class="badge badge-warning">Non validé</span>';
                                            }
                                            else if($redaction->getEtat() == 3) {
                                                echo '<span class="badge badge-danger">Refusé</span>';
                                            }
                                        ?>
                                        
                                        <?php if($art->getUrgence() == 1): ?>
                                            <span class="ml-2 badge badge-warning">Urgent</span>
                                        <?php endif; ?> 
                                    </td>
                                    <td hidden><?= $redaction->getCorrection() ?></td>
                                    <td hidden><?= $redaction->getIdRedaction() ?></td>
                                    <td><?= $redaction->getTauxPlagia() ?></td>
                                    <td><?= $redaction->getSiteTaux() ?></td>
                                    <td>
                                        <a href="detail-redaction.html~id~<?= $redaction->getIdRedaction() ?>~retour~1" data-tog="tooltip" data-placement="bottom" title="Détails de la redaction" class="btn btn-xs btn-info text-white detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i></a>
                                        <?php if($redaction->getEtat() == 3): ?>
                                            <button type="button" data-tog="tooltip" data-placement="bottom" title="Raisons refus" class="btn btn-xs btn-info text-white refuserBtn" data-toggle="modal" data-target="#refuserModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                        <?php elseif($redaction->getEtat() == 2): ?>
                                            <button type="button" data-tog="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn" data-toggle="modal" data-target="#correctionModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                        <?php endif; ?>
                                        <?php if($redaction->getEtat() == 2): ?>
                                            <button type="button" data-tog="tooltip" data-placement="bottom" title="Soumettre après correction" class="btn btn-xs btn-success text-white soumettreBtn" data-toggle="modal" data-target="#resoumettreModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- correctionModal -->
                                <div class="modal fade" id="correctionModal<?= $redaction->getIdRedaction() ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title">Corrections</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-3">
                                                <div class="container text-center">
                                                    <p><?= $redaction->getCorrection() ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- refuserModal -->
                                <div class="modal fade" id="refuserModal<?= $redaction->getIdRedaction() ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title">Raisons</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-3">
                                                <div class="container text-center">
                                                    <p><?= $redaction->getRaisons() ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- resoumettreModal -->
                                <div class="modal fade" id="resoumettreModal<?= $redaction->getIdRedaction() ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h4 class="modal-title">Soumission après correction</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span style="color: white;" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <form action="resoumettre-redaction.html" method="post" enctype="multipart/form-data" id="form">
                                                <div class="modal-body mt-3">
                                                    <input type="hidden" class="form-control" name="values[idRedaction]" value="<?= $redaction->getIdRedaction() ?>" id="idRedaction_s" required>
                                                    <input type="hidden" class="form-control" name="values[idArticle]" value="<?= $redaction->getIdArticle() ?>" id="idArticle_s" required>
                                                    <input type="hidden" class="form-control" name="values[idRedacteur]" value="<?= $redaction->getIdRedacteur() ?>" id="idRedacteur_s" required>
                                                    <div class="form-group">
                                                        <label for="nbrMots">Nombre de mots</label>
                                                        <input type="number" class="form-control" name="values[nbrMots]" id="nbrMots_s" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tauxPlagia">Taux de plagia</label>
                                                        <input type="text" class="form-control" name="values[tauxPlagia]" id="tauxPlagia_s" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="siteTaux">Site de vérification du taux</label>
                                                        <input type="text" class="form-control" name="values[siteTaux]" id="siteTaux_s" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="references">Articles et sites de références</label>
                                                        <textarea class="textarea" id="references" name="values[references]" value="" placeholder="Description" style="width: 100%; max-height: 400px; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fichier">Fichier</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="values[fichier]" id="fichier_s" required>
                                                            <label class="custom-file-label" for="fichier" data-browse="Parcourir">Choisir un fichier...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <input type="submit" value="Soumettre" name="soumettre" class="btn btn-block btn-outline-success">
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Article</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th scope="col">Fichier</th>
                                    <th scope="col">Date de rédaction</th>
                                    <th scope="col">Etat</th>
                                    <th hidden scope="col">Correction</th>
                                    <th hidden scope="col">ID Rédaction</th>
                                    <th scope="col">Taux de Plagiat</th>
                                    <th scope="col">Site de vérification du taux</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                        <table id="table_redaction" class="table table-bordered table-striped mobile-table">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Article</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $num = 0;
                                foreach ($redactions as $redaction) {
                                    $num++;
                            ?>
                                <tr>
                                    <th style="vertical-align: middle;" scope="row"><?php echo $num ?></th>
                                    <td>
                                        <?php
                                            $art = (new ArticleManager())->find($redaction->getIdArticle());
                                            echo $art->getTitre();
                                        ?>
                                        <br>
                                        <?php 
                                            if($redaction->getEtat() == 0 || $redaction->getEtat() == 4) {
                                                echo '<span class="badge badge-info" >En cours d\'examination</span>';
                                            }
                                            else if($redaction->getEtat() == 1) {
                                                echo '<span class="badge badge-success">Validé</span>';
                                            }
                                            else if($redaction->getEtat() == 2) {
                                                echo '<span class="badge badge-warning">Non validé</span>';
                                            }
                                            else if($redaction->getEtat() == 3) {
                                                echo '<span class="badge badge-danger">Refusé</span>';
                                            }
                                        ?>
                                        <?php if($art->getUrgence() == 1): ?>
                                            <span class="ml-2 badge badge-warning">Urgent</span>
                                        <?php endif; ?>
                                        <span class="">
                                            <a href="detail-redaction.html~id~<?= $redaction->getIdRedaction() ?>~retour~1" data-tog="tooltip" data-placement="bottom" title="Détails de la redaction" class="btn btn-xs btn-info text-white detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i> Détail</a>
                                            <?php if($redaction->getEtat() == 3): ?>
                                                <button type="button" data-tog="tooltip" data-placement="bottom" title="Raisons refus" class="btn btn-xs btn-info text-white refuserBtn" data-toggle="modal" data-target="#refuserModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"></i> Raisons refus</button>
                                            <?php elseif($redaction->getEtat() == 2): ?>
                                                <button type="button" data-tog="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn" data-toggle="modal" data-target="#correctionModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"> Corrections</i></button>
                                            <?php endif; ?>
                                            <?php if($redaction->getEtat() == 2): ?>
                                                <button type="button" data-tog="tooltip" data-placement="bottom" title="Soumettre après correction" class="btn btn-xs btn-success text-white soumettreBtn" data-toggle="modal" data-target="#resoumettreModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-paper-plane" aria-hidden="true"></i> Soumettre correction</button>
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                </tr>
                                <!-- correctionModal -->
                                <div class="modal fade" id="correctionModal<?= $redaction->getIdRedaction() ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title">Corrections</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-3">
                                                <div class="container text-center">
                                                    <p><?= $redaction->getCorrection() ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- refuserModal -->
                                <div class="modal fade" id="refuserModal<?= $redaction->getIdRedaction() ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title">Raisons</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-3">
                                                <div class="container text-center">
                                                    <p><?= $redaction->getRaisons() ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- resoumettreModal -->
                                <div class="modal fade" id="resoumettreModal<?= $redaction->getIdRedaction() ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h4 class="modal-title">Soumission après correction</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span style="color: white;" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <form action="resoumettre-redaction.html" method="post" enctype="multipart/form-data" id="form">
                                                <div class="modal-body mt-3">
                                                    <input type="hidden" class="form-control" name="values[idRedaction]" value="<?= $redaction->getIdRedaction() ?>" id="idRedaction_s" required>
                                                    <input type="hidden" class="form-control" name="values[idArticle]" value="<?= $redaction->getIdArticle() ?>" id="idArticle_s" required>
                                                    <input type="hidden" class="form-control" name="values[idRedacteur]" value="<?= $redaction->getIdRedacteur() ?>" id="idRedacteur_s" required>
                                                    <div class="form-group">
                                                        <label for="nbrMots">Nombre de mots</label>
                                                        <input type="number" class="form-control" name="values[nbrMots]" id="nbrMots_s" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tauxPlagia">Taux de plagia</label>
                                                        <input type="text" class="form-control" name="values[tauxPlagia]" id="tauxPlagia_s" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="siteTaux">Site de vérification du taux</label>
                                                        <input type="text" class="form-control" name="values[siteTaux]" id="siteTaux_s" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="references">Articles et sites de références</label>
                                                        <textarea class="textarea" id="references" name="values[references]" value="" placeholder="Description" style="width: 100%; max-height: 400px; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fichier">Fichier</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="values[fichier]" id="fichier_s" required>
                                                            <label class="custom-file-label" for="fichier" data-browse="Parcourir">Choisir un fichier...</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <input type="submit" value="Soumettre" name="soumettre" class="btn btn-block btn-outline-success">
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Article</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

      </div>
    </section>
    <!-- /.content -->

<!-- les modales -->

<!-- soumettreModal -->
<div class="modal fade" id="soumettreModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h4 class="modal-title">Soumission</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="soumettre-redaction.html" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body mt-3">
                    <input type="hidden" class="form-control" name="values[idArticle]" value="<?= $article ? $article->getIdArticle() : "" ?>" id="idArticle" required>
                    <input type="hidden" class="form-control" name="values[idRedacteur]" value="<?= $_SESSION['idRedacteur'] ?>" id="idRedacteur" required>
                    <div class="form-group">
                        <label for="nbrMots">Nombre de mots</label>
                        <input type="number" class="form-control" name="values[nbrMots]" id="nbrMots" required>
                    </div>
                    <div class="form-group">
                        <label for="tauxPlagia">Taux de plagia</label>
                        <input type="text" class="form-control" name="values[tauxPlagia]" id="tauxPlagia" required>
                    </div>
                    <div class="form-group">
                        <label for="siteTaux">Site de vérification du taux</label>
                        <input type="text" class="form-control" name="values[siteTaux]" id="siteTaux" required>
                    </div>
                    <div class="form-group">
                        <label for="references">Articles et sites de références</label>
                        <textarea class="textarea" id="references" name="values[references]" value="" placeholder="Description" style="width: 100%; max-height: 400px; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fichier">Fichier</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="values[fichier]" id="fichier" required>
                            <label class="custom-file-label" for="fichier" data-browse="Parcourir">Choisir un fichier...</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="Soumettre" name="soumettre" class="btn btn-block btn-outline-success">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- fin modales -->

<script>

$(function () {
    $("#table_redaction").DataTable({
        "responsive": false,
        "autoWidth": false,
        "language" : {
            
            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing":     "Traitement...",
            "sSearch":         "Rechercher :",
            "sZeroRecords":    "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst":    "Premier",
                "sLast":     "Dernier",
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    } 
            }
        }
    });
});

$(document).ready(function () {
    bsCustomFileInput.init();
});

// $(document).ready(function () {
//     $('.updateBtn').on('click', function(){

//         $('#updateModal').modal('show');
    
//         // Get the table row data.
//         $tr = $(this).closest('tr');
    
//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         $('#m_idArticle').val(data[6]);
//         $('#m_titre').val(data[0]);
//         $('#m_description').val(data[1]);
//         $('#m_nbrMots').val(data[2]);
//         $('#m_delai').val(data[5]);

//         //document.getElementById("form_id").action = "up-article.html/id/"+data[6];

//     }); 
// });

// $(document).ready(function () {
//     $('.deleteBtn').on('click', function(){

//         $('#deleteModal').modal('show');
    
//         // Get the table row data.
//         $tr = $(this).closest('tr');
    
//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();
//         document.getElementById("delete_id").href = "del-article.html~id~"+data[6];

//     }); 
// });

$(function () {
    $('.textarea').summernote()
})

$(function () {
    $('[data-tog="tooltip"]').tooltip()
});

function selectionner(selectId, optionValToSelect) {

    var selectElement = document.getElementById(selectId);
    var selectOptions = selectElement.options;
    for (var opt, j = 0; opt = selectOptions[j]; j++) {
        if (opt.value == optionValToSelect) {
            selectElement.selectedIndex = j;
            break;
        }
    }
}

</script>