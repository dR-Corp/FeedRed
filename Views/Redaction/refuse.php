<script>
    $(function () {
        $("#table_redactions").DataTable({
            "serverSide": true,
            "processing": true,
            "ajax": 'reload-redaction-refuse.html',
            "columns": [
                {"data": "idRedaction"},
                {"data": "titre"},
                {"data": "idRedacteur",
                    render: function(data, type, row) {
                        return '<a href="detail-users.html~id~'+row.idRedacteur[0]+'"><span class="badge">'+row.idRedacteur[1]+'</span></a>';
                    }
                },
                {"data": "nbrMots"},
                {"data": "fichier",
                    render: function(data, type, row) {
                        var file = '<?php echo STORAGES ?>'+row.fichier;
                        return '<button type="button" data-toggle="tooltip" data-placement="bottom" title="PDF" class="btn btn-xs btn-primary text-white pdfBtn mr-1"  onclick="afficherPdf()"><i class="fas fa-file-pdf" aria-hidden="true"></i></button>'+
                               '<a href="afficher-redaction.html~id~'+row.idRedaction+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Afficher redaction" class="btn btn-xs btn-info text-white afficherBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i></button></a>'+
                               '<a href="'+file+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Télécharger redaction" class="btn btn-xs btn-info text-white"><i class="fas fa-download" aria-hidden="true"></i></button></a>';
                    }
                },
                {"data": "dateRedaction"},
                {"data": "etat",
                    render: function(data, type, row) {

                        var stateText = "";
                        if(row.etat == 0 || row.etat == null) {
                            stateText = '<span class="badge badge-info" >En cours d\'examination</span>';
                        }
                        else if(row.etat == 1) {
                            stateText = '<span class="badge badge-success">Validée : '+row.dateValidation+'</span>';
                        }
                        else if(row.etat == 2) {
                            stateText = '<span class="badge badge-warning">Non validée</span>';
                        }
                        else if(row.etat == 3) {
                            stateText = '<span class="badge badge-danger">Refusée</span>';
                        }

                        if(row.urgence == 1) {
                        return stateText + '<span class="badge badge-warning ml-1">Urgent</span>';
                        }
                        else {
                            return stateText;
                        }
                        
                    }
                },
                {"data": "idRedaction"},
                {"data": "correction"},
                {"data": "raisons"},
                {"data": null,
                    render: function(data, type, row) {

                        var valider = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Valider" class="btn btn-xs btn-success text-white validerBtn mr-1"><i class="fas fa-check" aria-hidden="true"></i></button>';
                        
                        var other = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Invalider" class="btn btn-xs btn-warning text-white invaliderBtn mr-1"><i class="fas fa-edit" aria-hidden="true"></i></button>'+
                                    '<button type="button" data-toggle="tooltip" data-placement="bottom" title="refuser" class="btn btn-xs btn-danger text-white refuserBtn mr-1"><i class="fas fa-times" aria-hidden="true"></i></button>';
                        
                        var detail = '<a href="detail-ad-redaction.html~id~'+row.idRedaction+'~retour~6" data-tog="tooltip" data-placement="bottom" title="Détails de la redaction" class="btn btn-xs btn-info text-white detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i></a>';
                        if(row.etat == 2) {
                            detail += '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i></button>';
                        }
                        else if(row.etat == 3) {
                            detail += '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Raisons refus" class="btn btn-xs btn-info text-white raisonsBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i></button>';
                        }

                        if(row.etat == 0 || row.etat == null) { //etat initiam
                            var rendre = valider+other+detail;
                        }
                        else if(row.etat == 1 || row.etat == 3) { //validé ou refusé
                            var rendre = detail;
                        }
                        else if(row.etat == 2) { //non validé
                            var rendre = other+detail;
                        }
                        
                        // on détermine si l'utilisateur est un admin ou un modérateur
                        var userProfil = <?= $_SESSION['profil'] ?>;

                        return userProfil == 1 ? detail : rendre;

                    }
                }
            ],
            "columnDefs": [
                {
                    "targets": [9, 7, 8],
                    "visible": false,
                    "searchable": false
                }
            ],
            "responsive": false,
            "autoWidth": false,
            "order" : [0, 'desc'],
            "language" : {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": '<div><i class="fas fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
                "sProcessing":     '<div><i class="fas fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
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

    $('#table_redactions').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        });
    })

</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
        <span class="badge badge-danger text-md float-right"><?= $nbrRefuseRedaction ?></span>
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
                        <h1 class="card-title">Rédactions à valider</h1>
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
                        <table id="table_redactions" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Article</th>
                                <th scope="col">Redacteur</th>
                                <th scope="col">Nombre de mots</th>
                                <th scope="col">Fichier</th>
                                <th scope="col">Date de rédaction</th>
                                <th scope="col">Etat</th>
                                <th hidden scope="col">Correction</th>
                                <th hidden scope="col">Raisons</th>
                                <th hidden scope="col">ID Rédaction</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Article</th>
                                <th scope="col">Redacteur</th>
                                <th scope="col">Nombre de mots</th>
                                <th scope="col">Fichier</th>
                                <th scope="col">Date de rédaction</th>
                                <th scope="col">Etat</th>
                                <th hidden scope="col">Correction</th>
                                <th hidden scope="col">Raisons</th>
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
                        <p id="correctionParagraph"></p>
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
                        <p id="raisonsParagraph"></p>
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
                <div id="">
                    <div class="modal-body mt-3">
                        <input type="hidden" class="form-control" name="values[idRedaction]" id="idRedactionInvalider" required>
                        <input type="hidden" class="form-control" name="values[idModerateur]" value="<?= $_SESSION['idModerateur'] ?>" id="idModerateurInvalider" required>
                        <div class="form-group">
                            <label for="correction">Correction</label>
                            <textarea name="values[correction]" class="textarea" id="correctionInvalider" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="invaliderForm" class="btn btn-block btn-outline-warning">Invalider</button>
                    </div>
                </div>
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
                <div id="">
                    <div class="modal-body mt-3">
                        <input type="hidden" class="form-control" name="values[idRedaction]" id="idRedactionRefuser" required>
                        <input type="hidden" class="form-control" name="values[idModerateur]" value="<?= $_SESSION['idModerateur'] ?>" id="idModerateurRefuser" required>
                        <div class="form-group">
                            <label for="correction">Raisons</label>
                            <textarea name="values[raisons]" class="textarea" id="raisonsRefuser" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="refuserForm" class="btn btn-block btn-outline-danger">Refuser</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<script>

    $(document).ready(function () {
        $(document).on('click', '.validerBtn', function(){

            var currentRow = $(this).closest('tr');
            var data = $('#table_redactions').DataTable().row(currentRow).data();
            var currentIdRedaction = data['idRedaction'];
            
            validerRedaction(currentIdRedaction, <?php echo $_SESSION['idModerateur'] ?>);

        }); 
    });

    $(document).ready(function () {
        $(document).on('click', '.invaliderBtn', function(){

            $('#invaliderModal').modal('show');

            var currentRow = $(this).closest('tr');
            var data = $('#table_redactions').DataTable().row(currentRow).data()
            var currentIdRedaction = data['idRedaction'];

            $('#idRedactionInvalider').val(currentIdRedaction);
            $('#invaliderModal .textarea').summernote('code', '');

        }); 

        $('#invaliderForm').on('click', function() {
            var idRedaction = $('#idRedactionInvalider').val();
            var idModerateur = $('#idModerateurInvalider').val();
            var correction = $('#correctionInvalider').val();
            $('#invaliderModal').modal('hide');

            invaliderRedaction(idRedaction, idModerateur, correction);
        })
    });

    $(document).ready(function () {
        $(document).on('click', '.refuserBtn', function(){

            $('#refuserModal').modal('show');

            var currentRow = $(this).closest('tr');
            var data = $('#table_redactions').DataTable().row(currentRow).data()
            var currentIdRedaction = data['idRedaction'];

            $('#idRedactionRefuser').val(currentIdRedaction);
            $('#refuserModal .textarea').summernote('code', '');

        }); 
        
        $('#refuserForm').on('click', function() {
            var idRedaction = $('#idRedactionRefuser').val();
            var idModerateur = $('#idModerateurRefuser').val();
            var raisons = $('#raisonsRefuser').val();
            $('#refuserModal').modal('hide');
            
            refuserRedaction(idRedaction, idModerateur, raisons);
        })
    })

    $(document).ready(function () {
        $(document).on('click', '.correctionBtn', function(){

            $('#correctionModal').modal('show');

            var currentRow = $(this).closest('tr');
            var data = $('#table_redactions').DataTable().row(currentRow).data()
            var currentCorrection = data['correction']

            $('#correctionParagraph').html(currentCorrection);

        }); 
    });

    $(document).ready(function () {
        $(document).on('click', '.raisonsBtn', function(){

            $('#raisonsModal').modal('show');

            var currentRow = $(this).closest('tr');
            var data = $('#table_redactions').DataTable().row(currentRow).data()
            var currentRaisons = data['raisons']

            $('#raisonsParagraph').html(currentRaisons);

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

            }
        }); 
    }

    function invaliderRedaction(idRedaction, idModerateur, correction) {
        $.ajax({
            url: "corriger-redaction.html~idRedaction~"+idRedaction+"~idModerateur~"+idModerateur+"correction"+correction,
            type: "POST",
            data: {
                idRedaction: idRedaction,
                idModerateur: idModerateur,
                correction: correction,
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
                    icon: 'warning',
                    title: 'Rédaction non validée !'
                })                      
            }
        });
    }

    function refuserRedaction(idRedaction, idModerateur, raisons) {
        $.ajax({
            url: "refuser-redaction.html~idRedaction~"+idRedaction+"~idModerateur~"+idModerateur+"raisons"+raisons,
            type: "POST",
            data: {
                idRedaction: idRedaction,
                idModerateur: idModerateur,
                raisons: raisons,
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
                    icon: 'error',
                    title: 'Rédaction refusée !'
                });
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