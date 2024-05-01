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
                    <input type="hidden" class="form-control" name="values[idClient]" value="<?= isset($_SESSION['idClient']) ? $_SESSION['idClient'] : '' ?>" id="idClientInvalider" required>
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

<script>

    $(document).ready(function () {
        $(document).on('click', '.validerBtn', function(){

            var currentRow = $(this).closest('tr');
            var data = $('#table_redactions').DataTable().row(currentRow).data();
            var currentIdRedaction = data['idRedaction'];
            
            validerRedaction(currentIdRedaction, <?= isset($_SESSION['idClient']) ? $_SESSION['idClient'] : '' ?>);

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
            var idClient = $('#idClientInvalider').val();
            var correction = $('#correctionInvalider').val();
            $('#invaliderModal').modal('hide');

            invaliderRedaction(idRedaction, idClient, correction);
        })
    });

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

    function validerRedaction(redaction, client) {

        $.ajax({
            url: "valider-redaction.html~idRedaction~"+redaction+"~idClient~"+client,
            type: "GET",
            data: {
                redaction: redaction,
                client: client,
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

    function invaliderRedaction(idRedaction, idClient, correction) {
        $.ajax({
            url: "corriger-redaction.html~idRedaction~"+idRedaction+"~idClient~"+idClient+"correction"+correction,
            type: "POST",
            data: {
                idRedaction: idRedaction,
                idClient: idClient,
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

    $(function () {

        // $.ajax({
        //     url: "reload-redaction.html",
        //     success: function(data) {
        //         console.log(JSON.parse(data));
        //         console.log("j'ai quitté mon cartel");
        //     }
        // })

        $("#table_redactions").DataTable({
            "serverSide": true,
            "processing": true,
            "processing": true,
            "ajax": $('#data_link').val(),
            "deferRender": true,
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
                        var file = row.fichierCorrection != null ? '<?php echo STORAGES ?>'+row.fichierCorrection : '<?php echo STORAGES ?>'+row.fichier;
                        
                        if(row.fichierCorrection != null) {
                            return '<a href="'+file+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Télécharger redaction" class="btn btn-xs btn-info text-white"><i class="fas fa-download" aria-hidden="true"></i></button></a>';
                        }
                        else {
                            return '<button type="button" data-toggle="tooltip" data-placement="bottom" title="PDF" class="btn btn-xs btn-primary text-white pdfBtn mr-1"  onclick="afficherPdf()"><i class="fas fa-file-pdf" aria-hidden="true"></i></button>'+
                                '<a href="afficher-redaction.html~id~'+row.idRedaction+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Afficher redaction" class="btn btn-xs btn-info text-white afficherBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i></button></a>'+
                                '<a href="'+file+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Télécharger redaction" class="btn btn-xs btn-info text-white"><i class="fas fa-download" aria-hidden="true"></i></button></a>';
                        }

                    }
                },
                {"data": "dateRedaction"},
                {"data": "etat",
                    render: function(data, type, row) {
                        var stateText = "";
                        if(row.etat == 4) {
                            stateText = '<span class="badge badge-info" >A valider</span>';
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
                        else if(row.etat == 5) {
                            stateText = '<span class="badge badge-info">Optimisation en cours</span>';
                        }
                        

                        if(row.urgence == 1) {
                            return stateText + '<span class="badge badge-warning ml-1">Urgent</span>';
                        }
                        else {
                            return stateText;
                        }
                        
                    }
                },
                {"data": "correction"},
                {"data": "raisons"},
                {"data": null,
                    render: function(data, type, row) {

                        var valider = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Valider" class="btn btn-xs btn-success text-white validerBtn mr-1"><i class="fas fa-check" aria-hidden="true"></i></button>';
                        
                        var invalider = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Invalider" class="btn btn-xs btn-warning text-white invaliderBtn mr-1"><i class="fas fa-edit" aria-hidden="true"></i></button>';
                        
                        var detail = '<a href="detail-ad-redaction.html~id~'+row.idRedaction+'~retour~15" data-tog="tooltip" data-placement="bottom" title="Détails de la redaction" class="btn btn-xs btn-info text-white detailBtn"><i class="fas fa-folder-open" aria-hidden="true"></i></a>';
                        
                        if(row.etat == 2) {
                            detail += '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn mr-1"><i class="fas fa-eye" aria-hidden="true"></i></button>';
                        }

                        if(row.etat == 4) { //etat initial
                            var rendre = valider+invalider+detail;
                        }
                        else if(row.etat == 1 || row.etat == 3) { //validé ou refusé
                            var rendre = detail;
                        }
                        else if(row.etat == 2) { //non validé
                            var rendre = invalider+detail;
                        }

                        return rendre;
                    
                    }
                }
            ],
            "columnDefs": [
                {
                    "targets": [7, 8],
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

    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>