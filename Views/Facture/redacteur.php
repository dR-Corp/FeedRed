<?php

    $contro = new FactureController();
    $haveArticleOff = $contro->haveArticleOff($idRedacteur, $moisFacture);
    if($haveArticleOff == "true") $haveNombreMots = $contro->offNombreMots($idRedacteur, $moisFacture);

?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-9">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
            <form method="POST" action="facture-red.html" id="mois_facture_form">
                <select class="costum-select w-100" name="mois_facture_select" id="mois_facture_select">
                    <?php foreach($mois_factures as $mois_facture): ?>
                        <option <?php if((!empty($mois_facture_select) && $mois_facture_select==$mois_facture['dateDebut']) ){ echo 'selected';} ?> value="<?php echo $mois_facture['dateDebut'] ?>"><?php echo $mois_facture['libelle'] ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <script>
                $('#mois_facture_select').on('change', function() {
                    $('#mois_facture_form').submit();
                })
            </script>
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
                                <span class="badge text-md">Nombre de rédactions : <a href="#"><?php echo $haveArticleOff == "true" ? $nbr['redaction']." + rédaction hors ligne" : $nbr['redaction'] ?></a></span><br>
                                <span class="badge text-md">Nombre de mots : <a href="#"><?php echo $haveArticleOff == "true" ? $nbr['mots'] + $haveNombreMots : $nbr['mots'] ?></a></span><br>
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