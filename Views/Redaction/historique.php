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
        
        <div class="row">
            <div class="col-12">
                <div class="card elevation-3">
                    <div class="card-header bg-primary">
                        <h1 class="card-title">Rédactions validées</h1>
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
                        </style>
                        <table id="table_redaction" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Article</th>
                                <th scope="col">Nombre de mots</th>
                                <th scope="col">Fichier</th>
                                <th scope="col">Date de rédaction</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Date de validation</th>
                                <th hidden scope="col">Correction</th>
                                <th hidden scope="col">ID Rédaction</th>
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
                                    <a href="<?php echo $redaction->getFichier(); ?>"><i class="fas fa-file" aria-hidden="true"></i></a>
                                </td>
                                <td><?php echo $redaction->getDateRedaction() ?></td>
                                <td>
                                    <?php 
                                        if($redaction->getEtat() == 1) {
                                            echo '<span class="badge badge-success">Validé</span>';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $redaction->getDateValidation() ?></td>
                                <td hidden><?php echo $redaction->getCorrection() ?></td>
                                <td hidden><?php echo $redaction->getIdRedaction() ?></td>
                                <td>
                                    <a href="detail-redaction.html~id~<?= $redaction->getIdRedaction() ?>~retour~2" data-tog="tooltip" data-placement="bottom" title="Détails de la redaction" class="btn btn-xs btn-info text-white detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i></a>
                                    <?php if(!empty($redaction->getCorrection())): ?>
                                        <button type="button" data-tog="tooltip" data-placement="bottom" title="Voir corrections" class="btn btn-xs btn-warning text-white updateBtn" data-toggle="modal" data-target="#updateModal"><i class="fas fa-eye" aria-hidden="true"></i></button>
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
                                <th scope="col">Date de validation</th>
                                <th hidden scope="col">Correction</th>
                                <th hidden scope="col">ID Rédaction</th>
                                <th scope="col">Actions</th>
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


$(function () {
    $('[data-tog="tooltip"]').tooltip()
});

</script>