<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10 mb-1">
        <h1 class="m-0 text-dark">
            <?= $titrePage; ?>
            <div class="" id="compte_a_rebours"></div>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-2">
        <?php if($retour == 1): ?>
            <a href="redaction.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 2): ?>
            <a href="historique.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php endif; ?>
      </div>
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card elevation-3">
              <div class="card-body">
                <p><h4 class="bg-info p-2 rounded">Article</h4>
                <?php $article = (new ArticleManager())->find($redaction->getIdArticle()) ?>
                <div class="callout"><h3><?= $article->getTitre() ?></h3></div>
                <div><h4 class="bg-info p-2 rounded">Fichier</h4></div>
                <div class="callout">
                    <a class="text-center text-info" download href="<?php echo STORAGES.$redaction->getFichier(); ?>">
                        <p><i class="fas fa-file-word" style="font-size: xxx-large;" aria-hidden="true"></i></p>
                        <p>Télécharger le fichier</p>
                    </a>
                </div>
                <?php if( $redaction->getRed() && !empty($redaction->getRed())): ?>
                    <div><h4 class="bg-info p-2 rounded">Rédaction à optimiser</h4></div>
                    <div><?= $redaction->getRed() ?></div>
                <?php endif; ?>
                <div><h4 class="bg-info p-2 rounded">Rédaction</h4></div>
                <div class="callout">
                    <div>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td><h6 class="font-weight-bold">Etat</h6>
                                <p class="text-lg">
                                    <?php 
                                        if($redaction->getEtat() == 0) {
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
                                    <?php if($article->getUrgence() == 1): ?>
                                        <span class="ml-2 badge badge-warning">Urgent</span>
                                    <?php endif; ?> 
                                </p></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="font-weight-bold mr-2">Actions : </h6>
                                    <?php if($redaction->getEtat() == 3): ?>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Raisons refus" class="btn btn-xs btn-info text-white refuserBtn" data-toggle="modal" data-target="#refuserModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"> Raison refus</i></button>
                                    <?php elseif($redaction->getEtat() == 2): ?>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn" data-toggle="modal" data-target="#correctionModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"> Correction</i></button>
                                    <?php endif; ?>
                                    <?php if($redaction->getEtat() == 2): ?>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Soumettre après correction" class="btn btn-xs btn-success text-white soumettreBtn" data-toggle="modal" data-target="#resoumettreModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-paper-plane" aria-hidden="true"></i> Soumettre à nouveau</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h6 class="font-weight-bold">Date</h6>
                                <p class="text-lg"><?= $redaction->getDateRedaction() ?></p></td>
                            </tr>
                            <tr>
                                <td><h6 class="font-weight-bold">Taux de plagiat</h6>
                                <p class="text-lg"><?= $redaction->getTauxPlagia()."%" ?></p></td>
                            </tr>
                            <tr>
                                <td><h6 class="font-weight-bold">Site de vérification du taux</h6>
                                <p class="text-lg"><?= $redaction->getSiteTaux() ?></p></td>
                            </tr>
                            <?php if($redaction->getReferences() !== null): ?>
                            <tr>
                                <td><h6 class="font-weight-bold">Articles et sites de référence</h6>
                                <p class="text-lg"><?= $redaction->getReferences() ?></p></td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
                <div><h4 class="bg-info p-2 rounded">Infos article</h4></div>
                <div class="callout">
                    <div">
                        <p><h5 class="font-weight-normal">Nombre de mots : <span class="badge badge-info" ><?= $article->getNbrMots()." Mots" ?></span></h5></p>
                        <p><h5 class="font-weight-normal">Nombre d'heures : <span class="badge badge-info" ><?= $article->getDelai()." Heures" ?></span></h5></p>
                        <p><h5 class="font-weight-normal">Date de création : <span class="badge badge-info" ><?= date('d/m/Y', strtotime($article->getCreatedAt())) ?></span></h5></p>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer row">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

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

    <script>
        $(function () {
            $('.textarea').summernote()
        })
        
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>