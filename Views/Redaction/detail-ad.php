<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10">
        <h1 class="m-0 text-dark">
            <?= $titrePage; ?>
            <div class="" id="compte_a_rebours"></div>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-2">
        <?php if($retour == 1): ?>
            <a href="redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 2): ?>
            <a href="urgent-redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 3): ?>
            <a href="avalide-redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 4): ?>
            <a href="nonvalide-redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 5): ?>
            <a href="valide-redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 6): ?>
            <a href="refuse-redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php elseif($retour == 15): ?>
            <a href="redactions-cli.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
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
                    <div><?= nl2br($redaction->getRed()) ?></div>
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
                                    <?php
                                        $mod = isset($_SESSION['idModerateur']) ? $_SESSION['idModerateur'] : '';
                                        $red = $redaction->getIdRedaction();
                                        $valider = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Soumettre rédaction corrigée" class="btn btn-xs btn-success text-white corrigerBtn mr-1"><i class="fas fa-check" aria-hidden="true"></i> Valider</button>';
                                        // $valider = '<a href="valider-redaction.html~idRedaction~'.$red.'~idModerateur~'.$mod.'~retour~'.$retour.'" data-toggle="tooltip" data-placement="bottom" title="Valider" class="btn btn-xs btn-success text-white validerBtn mr-1"><i class="fas fa-check" aria-hidden="true"></i> Valider</a>';
                                        $other = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Invalider" class="btn btn-xs btn-warning text-white invaliderBtn mr-1"><i class="fas fa-edit" aria-hidden="true"></i> Invalider</button>'.
                                                    '<button type="button" data-toggle="tooltip" data-placement="bottom" title="refuser" class="btn btn-xs btn-danger text-white refuserBtn mr-1"><i class="fas fa-times" aria-hidden="true"></i> Refuser</button>';
                                        $detail = '';
                                        if($redaction->getEtat() == 2) 
                                            $detail = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i> Correction</button>';
                                        else if($redaction->getEtat() == 3)
                                            $detail = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Raisons refus" class="btn btn-xs btn-info text-white raisonsBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i> Raisons refus</button>';

                                        if($redaction->getEtat() == 0 || $redaction->getEtat() == null) //etat initial
                                            $rendre = $valider.' '.$other.' '.$detail;
                                        else if($redaction->getEtat() == 1 || $redaction->getEtat() == 3) //validé ou refusé
                                            $rendre = $detail;
                                        else if($redaction->getEtat() == 2)  //non validé
                                            $rendre = $other.' '.$detail;

                                        $userProfil = $_SESSION['profil'];
                                        $idUsers = $_SESSION['idUser'];
                
                                        if($retour == 1):   //tout
                                            echo ($userProfil == 1 || $userProfil == 2) && $idUsers != '94' ? $detail : $rendre;
                                        elseif($retour == 2 || $retour == 3 || $retour == 4 || $retour == 6):   //urgente, avalider, non valides
                                            echo $userProfil == 1 ? $detail : $rendre;
                                        elseif($retour == 5):   //validess
                                            echo $rendre;
                                        endif;
                                    ?>
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

    <!-- corrigerModal -->
    <div class="modal fade" id="corrigerModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Soumission du fichier corrigé</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: white;" aria-hidden="true">&times;</span>
                </button>
            </div>
                <!-- <form action="resoumettre-redaction.html" method="post" enctype="multipart/form-data" id="form"> -->
                <form action="correction-redaction.html" method="post" enctype="multipart/form-data" id="form">
                    <div class="modal-body mt-3">
                        <input type="hidden" name="values[retour]" value="<?= $retour ?>">
                        <input type="hidden" class="form-control" name="values[idRedaction]" value="<?= $redaction->getIdRedaction() ?>" id="idRedactionCorriger" required>
                        <input type="hidden" class="form-control" name="values[idModerateur]" value="<?= isset($_SESSION['idModerateur']) ? $_SESSION['idModerateur'] : '' ?>" id="idModerateurInvalider" required>
                        <div class="form-group">
                            <label for="fichier">Fichier</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="values[fichier]" id="fichier_s" required>
                                <label class="custom-file-label" for="fichier" data-browse="Parcourir">Choisir un fichier...</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="submit" id="corrigerForm" value="Soumettre" class="btn btn-block btn-outline-success">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- correctionModal -->
    <div class="modal fade" id="correctionModal">
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
                        <p id="correctionParagraph"><?= $redaction->getCorrection() ?></p>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- raisonsModal -->
    <div class="modal fade" id="raisonsModal">
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
                        <p id="raisonsParagraph"><?= $redaction->getRaisons() ?></p>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- invaliderModal -->
    <div class="modal fade" id="invaliderModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Invalidation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="corriger-redaction.html" method="post" id="">
                    <div class="modal-body mt-3">
                        <input type="hidden" name="values[retour]" value="<?= $retour ?>">
                        <input type="hidden" class="form-control" name="values[idRedaction]" value="<?= $redaction->getIdRedaction() ?>" id="idRedactionInvalider" required>
                        <input type="hidden" class="form-control" name="values[idModerateur]" value="<?= isset($_SESSION['idModerateur']) ? $_SESSION['idModerateur'] : '' ?>" id="idModerateurInvalider" required>
                        <div class="form-group">
                            <label for="correction">Correction</label>
                            <textarea name="values[correction]" class="textarea" id="correctionInvalider" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="invaliderForm" class="btn btn-block btn-outline-warning">Invalider</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- refuserModal -->
    <div class="modal fade" id="refuserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Réfus d'article</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: white;" aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="refuser-redaction.html" method="post" id="">
                    <div class="modal-body mt-3">
                        <input type="hidden" name="values[retour]" value="<?= $retour ?>">
                        <input type="hidden" class="form-control" name="values[idRedaction]" value="<?= $redaction->getIdRedaction() ?>" id="idRedactionRefuser" required>
                        <input type="hidden" class="form-control" name="values[idModerateur]" value="<?= isset($_SESSION['idModerateur']) ? $_SESSION['idModerateur'] : '' ?>" id="idModerateurRefuser" required>
                        <div class="form-group">
                            <label for="correction">Raisons</label>
                            <textarea name="values[raisons]" class="textarea" id="raisonsRefuser" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="refuserForm" class="btn btn-block btn-outline-danger">Refuser</button>
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

    <script>

        // $(document).ready(function () {
        //     $(document).on('click', '.validerBtn', function(){
        //         validerRedaction(<?php //$redaction->getIdRedaction() ?>, <?php //$_SESSION['idModerateur'] ?>);
        //     }); 
        // });

        $(document).on('click', '.corrigerBtn', function(){
            $('#corrigerModal').modal('show');
        });

        $(document).ready(function () {
            $(document).on('click', '.invaliderBtn', function(){
                $('#invaliderModal').modal('show');
            });
        });

        $(document).ready(function () {
            $(document).on('click', '.refuserBtn', function(){
                $('#refuserModal').modal('show');
            }); 
        })

        $(document).ready(function () {
            $(document).on('click', '.correctionBtn', function(){
                $('#correctionModal').modal('show');
            }); 
        });

        $(document).ready(function () {
            $(document).on('click', '.raisonsBtn', function(){
                $('#raisonsModal').modal('show');
            }); 
        });


        function validerRedaction(redaction, moderateur) {

            $.ajax({
                url: "valider-redaction.html~idRedaction~"+redaction+"~idModerateur~"+moderateur,
                type: "GET",
                data: {
                    redaction: redaction,
                    moderateur: moderateur,
                },
                cache: false,
                success: function(data){

                    $('#table_redactions').DataTable().ajax.reload(null, false);

                    //En cas de succès envoyer une alert
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Rédaction validée avec succès!'
                    });

                    //on fait une redirection vers la même page

                }
            }); 
        }

        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                trigger: 'hover'
            })
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