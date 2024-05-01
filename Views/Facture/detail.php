<?php

    $contro = new FactureController();
    $haveArticleOff = $contro->haveArticleOff($idRedacteur, $moisFacture);
    if($haveArticleOff == "true") $haveNombreMots = $contro->offNombreMots($idRedacteur, $moisFacture);

    // echo '<pre>'; print_r($have); exit;

?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <a href="factures.html~moisFactureRetour~<?= $moisFacture ?>"><button class="btn btn-primary btn-sm btn-block retourBtn" data-toggle="tooltip" data-placement="bottom" title="Retour vers la facture"><i class="fas fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
        </div>
        
        <?php if($haveArticleOff == "false"): ?>
        <div class="col-sm-2">
            <button class="btn btn-primary btn-sm btn-block" id="addArticleOff"><i class="fas fa-plus"></i> Article hors ligne</button>
        </div>
        <?php else: ?>
        <div class="col-sm-2">
            <a href="del-article-off.html~idRedacteur~<?= $idRedacteur ?>~nomRedacteur~<?= $nomRedacteur ?>~moisFacture~<?= $moisFacture ?>~totalRedaction~<?= $nbr['redaction'] ?>~totalMots~<?= $nbr['mots'] ?>~moisFactureText~<?= $moisFactureText ?>"><button class="btn btn-danger btn-sm btn-block" id="delArticleOff"><i class="fas fa-trash"></i> Article hors ligne</button></a>
        </div>
        <?php endif; ?>

        <script>
            $(document).on('click', '#addArticleOff', function(){
                $('#addOfflineArticle').modal('show');
            });
        </script>

        <!-- article hors ligne modal -->
        <div class="modal fade" id="addOfflineArticle">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Article hors ligne</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: white;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="add-article-off.html" method="post" id="form">
                        <div class="modal-body mt-3">
                            <input type="hidden" class="form-control" name="values[idRedacteur]" value="<?= $idRedacteur ?>" id="idRedacteurOff" required>
                            <input type="hidden" class="form-control" name="values[nomRedacteur]" value="<?= $nomRedacteur ?>" id="nomRedacteur" required>
                            <input type="hidden" class="form-control" name="values[moisFacture]" value="<?= $moisFacture ?>" id="moisFacture" required>
                            <input type="hidden" class="form-control" name="values[totalRedaction]" value="<?= $nbr['redaction'] ?>" id="totalRedaction" required>
                            <input type="hidden" class="form-control" name="values[totalMots]" value="<?= $nbr['mots'] ?>" id="totalMots" required>
                            <input type="hidden" class="form-control" name="values[moisFactureText]" value="<?= $moisFactureText ?>" id="moisFactureText" required>
                            <div class="form-group">
                                <label for="fichier">Nombre de mots</label>
                                <input type="number" class="form-control" name="values[nombreMots]" id="nombreMots" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="submit" id="corrigerForm" value="Ajouter" class="btn btn-block btn-outline-primary">
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <div class="col-sm-2">
            <?php
            // echo $moisFactureText; exit;
            ?>
            <button class="btn btn-primary btn-sm btn-block pdfBtn" data-toggle="tooltip" data-placement="bottom" title="Télécharger la facture"><i class="fas fa-download" aria-hidden="true"></i> Télécharger</button>
        </div>
        <script>
            $('.pdfBtn').on('click', function() {
                var mois = <?php echo json_encode($moisFactureText) ?>;
                var redacteur = <?php echo json_encode($nomRedacteur) ?>;
                const invoice = document.getElementById('facture');
                var opt = {
                    margin:       0.3,
                    filename:     'Facture du mois de '+mois+' de '+redacteur+'.pdf',
                    image:        { type: 'png', quality: 0.98 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait', fontName: 'Times new roman'}
                };
                html2pdf().from(invoice).set(opt).save();
            });
        </script>
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="facture" class="card table-responsive">
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <div>
                            <div class="text-center">
                                <h4 class="font-weight-bold">Facture de la période du <?php echo $moisFactureText ?></h4>
                                <span class="badge text-md">Redacteur : <a href="#"><?php echo $nomRedacteur ?></a></span><br>
                                <span class="badge text-md">Nombre de rédactions : <a href="#"><?php echo $haveArticleOff == "true" ? $nbr['redaction']." + rédaction hors ligne" : $nbr['redaction']  ?></a></span><br>
                                <span class="badge text-md">Nombre de mots : <a href="#"><?php echo $haveArticleOff == "true" ? $nbr['mots'] + $haveNombreMots : $nbr['mots']  ?></a></span><br>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th class="text-left" scope="col">Titre de l'article</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th scope="col">Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $total = 0;
                                foreach ($redactions as $redaction) {
                                    $manager = new ArticleManager();
                                    $article = $manager->find($redaction->getIdArticle());
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $redaction->getIdArticle() ?></th>
                                    <td class="text-left">
                                        <?php
                                            echo '<span class="badge">'.$article->getTitre().'</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $total = $total + $article->getNbrMots();
                                            echo '<span class="badge">'.$article->getNbrMots().'</span>';
                                        ?>
                                    </td>
                                    <td scope="col"><span class="badge badge-sm badge-success">Validé</span></td>
                                </tr>
                            <?php
                                }
                            ?>
                            <?php
                                if($haveArticleOff == "true"):
                            ?>
                            <tr>
                                <th scope="row">###</th>
                                <td class="text-left">
                                    <?php
                                        echo '<span class="badge">Rédaction hors ligne</span>';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $total = $total + $haveNombreMots;
                                        echo '<span class="badge">'.$haveNombreMots.'</span>';
                                    ?>
                                </td>
                                <td scope="col"><span class="badge badge-sm badge-success">Validé</span></td>
                            </tr>
                            <?php
                                endif;
                            ?>
                            <tr>
                                <th scope="row">Total</th>
                                <td>
                                    -
                                </td>
                                <td>
                                    -
                                </td>
                                <td scope="col">
                                    <?php
                                        echo '<span class="badge badge-info">'.$total.' Mots</span>';
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>


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