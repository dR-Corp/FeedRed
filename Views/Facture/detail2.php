<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <a href="factures.html~moisFactureRetour~<?= $moisFacture ?>"><button class="btn btn-primary btn-sm btn-block retourBtn" data-toggle="tooltip" data-placement="bottom" title="Retour vers la facture"><i class="fas fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
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
                                <span class="badge text-md">Modérateur : <a href="#"><?php echo $nomModerateur ?></a></span><br>
                                <span class="badge text-md">Nombre de corrections : <a href="#"><?php echo $nbrValidation ?></a></span><br>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th class="text-left" scope="col">Titre de l'article</th>
                                    <th scope="col">Date de validation</th>
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
                                            echo '<span class="badge">'.$redaction->getDateValidation().'</span>';
                                        ?>
                                    </td>
                                    <td scope="col"><span class="badge badge-sm badge-success">Validé</span></td>
                                </tr>
                            <?php
                                }
                            ?>
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