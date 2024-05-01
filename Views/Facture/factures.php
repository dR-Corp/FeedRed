<script>
    $(function () {
        $("#table_factures").DataTable({
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
</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-7">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
            <form method="POST" action="factures.html" id="mois_facture_form">
                <select class="custom-select w-100" name="mois_facture_select" id="mois_facture_select">
                    <?php foreach($periodes as $periode): ?>
                        <!-- <option value="<?= $periode['idPeriode'] ?>"><?= $periode['libelle'] ?></option> -->
                        <option <?php if((!empty($mois_facture_select) && $mois_facture_select==$periode['dateDebut']) || (!empty($moisFactureRetour) && $moisFactureRetour==$periode['dateDebut']) ){ echo 'selected';} ?> value="<?php echo $periode['dateDebut'] ?>"><?php echo $periode['libelle'] ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <script>
                $('#mois_facture_select').on('change', function() {
                    $('#mois_facture_form').submit();
                })
            </script>
        </div>

        <?php
            if(!empty($mois_facture_select)) {
                $moisFacture = $mois_facture_select;
                $periode = (new RedactionManager)->getPeriodeByDateDebut($moisFacture);
            }
            else if(!empty($moisFactureRetour)) {
                $moisFacture = $moisFactureRetour;
                $periode = (new RedactionManager)->getPeriodeByDateDebut($moisFacture);
            }
            else {
                //ici on va plutot get la date de debut de la periode en cours
                //après biensur avoir get la periode elle meme
                $periode = (new RedactionManager)->getActivePeriode();
                $moisFacture = $periode['dateDebut'];
            }
        ?>

        <?php if($periode['encours'] == 0): ?>
            <div class="col-sm-2">
                <!-- <a href="exporter-fiche.html"> -->
                    <button class="btn btn-success btn-block exportBtn">Exporter fiche</button>
                <!-- </a> -->
            </div>
        <?php else: ?>
        <div class="col-sm-2">
            <a href="fin-periode.html"><button class="btn btn-primary btn-block">Fin de période</button></a>
        </div>
        <?php endif; ?>
        <!-- <div class="col-sm-2">
            <form method="POST" action="factures.html" id="mois_facture_form">
                <select class="custom-select w-100" name="mois_facture_select" id="mois_facture_select">
                    <?php foreach($mois_factures as $mois_facture): ?> 
                        <option <?php if((!empty($mois_facture_select) && $mois_facture_select==$mois_facture['debutMois']) || (!empty($moisFactureRetour) && $moisFactureRetour==$mois_facture['debutMois']) ){ echo 'selected';} ?> value="<?php echo $mois_facture['debutMois'] ?>"><?php echo $mois_facture['moisAnnee'] ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <script>
                $('#mois_facture_select').on('change', function() {
                    $('#mois_facture_form').submit();
                })
            </script>
        </div> -->

    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive card-primary">
                    <div class="card-header">
                        Rédacteurs
                    </div>
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <table id="table_factures" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th class="text-left" scope="col">Redacteur</th>
                                    <th scope="col">Nombre de rédactions validées</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th hidden scope="col">ID redacteur</th>
                                    <th hidden scope="col">PARAMS</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                                $contro = new FactureController();
                                
                                foreach ($redacteurs as $redacteur) {
                                    $manager = new RedactionManager();
                                    $redactions = $manager->findRedacteurNbrMotsRediges($redacteur->getIdRedacteur(), $moisFacture);
                                    
                                    $haveArticleOff = $contro->haveArticleOff($redacteur->getIdRedacteur(), $moisFacture);
                                    if($haveArticleOff == "true") $haveNombreMots = $contro->offNombreMots($redacteur->getIdRedacteur(), $moisFacture);

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $redacteur->getIdRedacteur() ?></th>
                                    <td class="text-left">
                                        <?php
                                            // echo $haveArticleOff;
                                            // $red = (new RedacteurManager())->find($redaction->getIdRedacteur());
                                            $use = (new UsersManager())->find($redacteur->getIdUser());
                                            $nom = $use->getNom();
                                            $prenom = $use->getPrenom();
                                            echo '<a href="detail-users.html~id~'.$redacteur->getIdUser().'"><span class="badge">'.$nom.' '.$prenom.'</span></a>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $redo = $haveArticleOff == "true" ? $redactions['nbrRedactions'] .' + rédaction hors ligne' : $redactions['nbrRedactions'];
                                            echo '<span class="badge">'. $redo .'</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $nombro = $haveArticleOff == "true" ?  $redactions['nbrMots'] + $haveNombreMots : $redactions['nbrMots'];
                                            echo '<span class="badge">'. $nombro .'</span>';
                                        ?>
                                    </td>
                                    <td hidden><?php echo $redacteur->getIdRedacteur() ?></td>
                                    <td>
                                        <a href="factures-detail.html~id~<?= $redacteur->getIdRedacteur() ?>~moisFacture~<?= $moisFacture ?>~totalMots~<?= $redactions['nbrMots'] ?>~totalRedaction~<?= $redactions['nbrRedactions'] ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-primary detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>
                                        
                                        <?php if($periode['encours'] == 0 && !(new RedactionManager)->factureIsValidate($periode['idPeriode'], $redacteur->getIdRedacteur()) ): ?>
                                            <button 
                                                type="button" 
                                                data-tog="tooltip" 
                                                data-placement="bottom" 
                                                title="Valider" 
                                                class="btn btn-xs btn-success checkBtn" 
                                            >
                                                <i class="fas fa-check" aria-hidden="true"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                    <td hidden>
                                    <?php 
                                        echo $params = json_encode([
                                            'idRedacteur' => $redacteur->getIdRedacteur(),
                                            'idPeriode' => $periode['idPeriode'],
                                            'nbrArticles' => $redo,
                                            'nbrMots' => $nombro,
                                        ]);
                                    ?>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th class="text-left" scope="col">Redacteur</th>
                                    <th scope="col">Nombre de rédactions validées</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th hidden scope="col">ID redacteur</th>
                                    <th hidden scope="col">PARAMS</th>
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
        
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive card-primary">
                    <div class="card-header">
                        Modérateurs
                    </div>
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <table id="table_factures" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th class="text-left" scope="col">Modérateurs</th>
                                    <th scope="col">Nombre de corrections</th>
                                    <th hidden scope="col">ID redacteur</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($moderateurs as $moderateur) {
                                    $manager = new RedactionManager();
                                    $nbrValidation = $manager->findModerateurNbrValidation($moderateur->getIdModerateur(), $moisFacture);
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $moderateur->getIdModerateur() ?></th>
                                    <td class="text-left">
                                        <?php
                                            // $red = (new RedacteurManager())->find($redaction->getIdRedacteur());
                                            $use = (new UsersManager())->find($moderateur->getIdUser());
                                            $nom = $use->getNom();
                                            $prenom = $use->getPrenom();
                                            echo '<a href="detail-users.html~id~'.$moderateur->getIdUser().'"><span class="badge">'.$nom.' '.$prenom.'</span></a>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo '<span class="badge">'.$nbrValidation.'</span>';
                                        ?>
                                    </td>
                                    <!-- <td hidden><?php echo $moderateur->getIdModerateur() ?></td> -->
                                    <td>
                                        <a href="factures-detail2.html~id~<?= $moderateur->getIdModerateur() ?>~moisFacture~<?= $moisFacture ?>~totalRedaction~<?= $nbrValidation ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-primary detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th class="text-left" scope="col">Modérateurs</th>
                                    <th scope="col">Nombre de corrections</th>
                                    <th hidden scope="col">ID redacteur</th>
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

$(document).ready(function () {

    $(document).on('click', '.checkBtn', function() {

        var currentRow = $(this).closest('tr');
        var data = $('#table_factures').DataTable().row(currentRow).data()
        params = JSON.parse(data[6]);
        validerFacture(params, $(this));

    });

    $(document).on('click', '.exportBtn', function() {

        periode = <?= json_encode($periode) ?>;
        exporterFiche(periode);

    }); 

    function validerFacture(params, element) {
        
        $.ajax({
            url: "valider-facture.html",
            type: "POST",
            data: {
                params: params
            },
            cache: false,
            success: function(data){
                element.hide();
                // //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Facture validée !'
                });
                      
            }
        });
    }

    function exporterFiche(periode) {

        $.ajax({
            url: "exporter-fiche.html",
            type: "POST",
            data: {
                periode: periode
            },
            cache: false,
            success: function(data){

                data = JSON.parse(data);

                const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
                const EXCEL_EXTENSION = '.xlsx';

                const worksheet = XLSX.utils.json_to_sheet(data);
                const workbook = {
                    Sheets: {
                        'data': worksheet
                    },
                    SheetNames: ['data']
                };
                const excelBuffer = XLSX.write(workbook, {bookType: 'xlsx', type: 'array'});
                const fileData = new Blob([excelBuffer], {type: EXCEL_TYPE });
                saveAs(fileData, 'Fiche de paie du : '+periode.libelle+EXCEL_EXTENSION);

                // //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Fiche de paie exportée !'
                });
                      
            }
        });

    }

});

</script>