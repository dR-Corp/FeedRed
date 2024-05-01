<!-- updateModal -->
<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Modification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="form_update">
            <div class="modal-body mt-3">
                <input type="hidden" name="values[idArticle]" id="m_idArticle" required>
                <input type="hidden" name="values[urgence]" id="m_urgence" value="" required>
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="values[titre]" id="m_titre" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="values[description]" class="textarea" id="m_description" name="values[description]" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                </div>
                    <div class="form-group">
                        <label for="liens">Liens de référence</label>
                        <textarea name="values[liens]" id="m_liens" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                <div class="form-group">
                    <label for="nbrMots">Nombre de mots</label>
                    <input type="number" class="form-control" name="values[nbrMots]" id="m_nbrMots" required>
                </div>
                <div class="form-group">
                    <label for="delai">Délai</label>
                    <!-- <input type="number" class="form-control" name="values[delai]" id="m_delai" required> -->
                    <select class="form-control" name="values[delai]" id="m_delai">
                        <?php for($i = 4; $i < 16; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <!-- <input type="submit" value="Modifier" name="modifier" class="btn btn-block btn-outline-warning"> -->
                <button id="updateForm" class="btn btn-block btn-outline-warning">Modifier</button>
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- deleteModal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h4 class="modal-title">Suppression</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mt-3">
            <input type="hidden" name="values[idArticle]" id="s_idArticle" required>
            <div class="container">
                <p>Voulez vous vraiment supprimer cet article ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- <a href="" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a> -->
                        <button id="deleteForm" type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Oui</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-block btn-outline-primary" data-dismiss="modal">Non</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    $(function () {

        var tableArticle = $("#table_articles").DataTable({
            "serverSide": true,
            "processing": true,
            "stateSave": false,
            "ajax": $('#data_link').val(),
            "columns": [
                {"data": "idArticle"},
                {"data": "titre"},
                {"data": "description"},
                {"data": "nbrMots"},
                {"data": 'etat',
                    render: function(data, type, row) {
                        var stateText = "";
                        if(row.etat == 0 || row.etat == null || row.etat == 2 || row.etat == 3 || row.etat == 4) {
                            stateText = '<span class="badge badge-info">Rédaction en cours</span>';
                        }
                        else if(row.etat == 1) {
                            stateText = '<span class="badge badge-success">Redigé</span>';
                        }
                        else if(row.etat == 6) {
                            stateText = '<span class="badge badge-info">Optimisation en cours</span>';
                        }

                        return stateText;

                    }
                },
                {"data": null,
                    render: function(data, type, row) {
                        return row.delai+'H';
                    }
                },
                {"data": "idArticle"},
                {"data": "delai"},
                {"data": "created_at"},
                {"data": "updated_at"},
                {"data": null,
                    render: function(data, type, row) {
                        var detail = '<a href="detail-article.html~id~'+row.idArticle+'~retour~'+7+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-info mr-1"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>'
                        return detail;
                    }
                }
            ],
            "columnDefs": [
                {
                    "targets": [2, 5, 6, 7, 9],
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
                "sLoadingRecords": '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
                "sProcessing":     '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
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
        // var tableArticle = $("#table_articles").DataTable({
        //     "serverSide": true,
        //     "processing": true,
        //     "stateSave": false,
        //     "deferRender": true,
        //     "drawCallback": function (setting, json) {

        //         // alert("all data are loaded into table");
        //         $("input[data-bootstrap-switch]").each(function(){
        //             $(this).bootstrapSwitch({
        //                 onSwitchChange: function(e) {
        //                     $tr = $(this).closest('tr')
        //                     var data = tableArticle.row($tr).data()
        //                     $currentID = data.idArticle
        //                     $currentState = data.etat
        //                     $currentClient = data.idClient
        //                     $currentTitre = data.titre
        //                     $.ajax({
        //                         url: "accepter-commande.html",
        //                         type: 'POST',
        //                         data: {
        //                             "idArticle": $currentID,
        //                             "etat": $currentState,
        //                             "client": $currentClient,
        //                         },
        //                         success: function(data) {
        //                             // console.log(data);
        //                             console.log(JSON.parse(data));
        //                             if(data['alert']) {
        //                                 const Toast = Swal.mixin({
        //                                     toast: true,
        //                                     position: 'top-end',
        //                                     showConfirmButton: false,
        //                                     timer: 3000
        //                                 });
        //                                 Toast.fire({
        //                                     icon: data['alert'],
        //                                     title: data['alert_message']
        //                                 });
        //                             }
        //                             tableArticle.ajax.reload(null, false);
        //                         }
        //                     })

        //                 }
        //             });
        //         });
                
        //         $('[data-toggl="tooltip"]').tooltip({
        //             trigger: 'hover'
        //         });
        //     },
        //     "ajax": $('#data_link').val(),
        //     "columns": [
        //         {"data": "idArticle"},
        //         {"data": "titre"},
        //         {"data": "description"},
        //         {"data": "nbrMots"},
        //         {"data": null,
        //             render: function(data, type, row) {
        //                 return '<a href="detail-users.html~id~'+row.client[0]+'"><span class="badge">'+row.client[1]+'</span></a>';
        //             }
        //         },
        //         {"data": null,
        //             render: function(data, type, row) {
        //                 return row.delai+'H';
        //             }
        //         },
        //         {"data": "idArticle"},
        //         {"data": "delai"},
        //         {"data": "created_at"},
        //         {"data": "updated_at"},
        //         {"data": null,
                    
        //             render: function(data, type, row) {
        //                 var stateText = "";
        //                 if(row.etat == 0 || row.etat == null) {
        //                     stateText = '<span class="badge badge-info mr-2">EN ATTENTE</span>';
        //                     var valideBtn = '<input type="checkbox" class="activeCheckbox ml-1" name="my-checkbox" data-bootstrap-switch>';
        //                 }
        //                 else if(row.etat == 1) {
        //                     stateText = '<span class="badge badge-success mr-2">ACCEPTE</span>';
        //                     var valideBtn = '<input type="checkbox" class="activeCheckbox ml-1" name="my-checkbox" checked data-bootstrap-switch>';
        //                 }

        //                 return stateText+valideBtn;

        //             }

        //         },
        //         {"data": null,
        //             render: function(data, type, row) {
        //                 var detail = '<a href="detail-article-cli.html~id~'+row.idArticle+'~retour~'+11+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-info mr-1"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>'
        //                 var defaultButton = '';
        //                 if(row.etat != 1) {
        //                     var defaultButton = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Modifier" class="btn btn-xs btn-warning text-white updateBtn mr-1"><i class="fas fa-edit" aria-hidden="true"></i></button>';
        //                 }
        //                 return detail+defaultButton;
        //             }
        //         }
        //     ],
        //     "columnDefs": [
        //         {
        //             "targets": [2,6,7,9],
        //             "visible": false,
        //             "searchable": false
        //         }
        //     ],
        //     "responsive": false,
        //     "autoWidth": false,
        //     "order" : [0, 'desc'],
        //     "language" : {
        //         "sEmptyTable":     "Aucune donnée disponible dans le tableau",
        //         "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
        //         "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
        //         "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
        //         "sInfoPostFix":    "",
        //         "sInfoThousands":  ",",
        //         "sLengthMenu":     "Afficher _MENU_ éléments",
        //         "sLoadingRecords": '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
        //         "sProcessing":     '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
        //         "sSearch":         "Rechercher :",
        //         "sZeroRecords":    "Aucun élément correspondant trouvé",
        //         "oPaginate": {
        //             "sFirst":    "Premier",
        //             "sLast":     "Dernier",
        //             "sNext":     "Suivant",
        //             "sPrevious": "Précédent"
        //         },
        //         "oAria": {
        //             "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        //             "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
        //         },
        //         "select": {
        //                 "rows": {
        //                     "_": "%d lignes sélectionnées",
        //                     "0": "Aucune ligne sélectionnée",
        //                     "1": "1 ligne sélectionnée"
        //                 } 
        //         }
        //     }
        // });

        $('#table_articles').on('draw.dt', function() {
            $('[data-toggle="tooltip"]').tooltip({
                trigger: 'hover'
            });
        })

    });

    $('#updateForm').on('click', function() {
        var idArticle = $('#m_idArticle').val();
        var titre = $('#m_titre').val();
        var description = $('#m_description').val();
        var liens = $('#m_liens').val();
        var nbrMots = $('#m_nbrMots').val();
        var delai = $('#m_delai').val();
        var urgence = $('#m_urgence').val();

        $('#updateModal').modal('hide');
        modifierArticle(idArticle, titre, description, nbrMots, delai, liens, urgence);
    })

    $('#deleteForm').on('click', function() {
        var idArticle = $('#s_idArticle').val();
        $('#deleteModal').modal('hide');
        supprimerArticle(idArticle);
    })

    function modifierArticle(idArticle, titre, description, nbrMots, delai, liens, urgence) {
        // alert(description);
        $.ajax({
            url: "up-article_cli.html",
            type: "POST",
            data: {
                idArticle: idArticle,
                titre: titre,
                description: description,
                nbrMots: nbrMots,
                delai: delai,
                liens: liens,
                urgence: urgence,
            },
            cache: false,
            success: function(response){
                var datans = JSON.parse(response);

                $('#table_articles').DataTable().ajax.reload(null, false);
                
                //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Modification effectuée succès !'
                });
                      
            }
        });
    }

    function supprimerArticle(idArticle) {
        
        $.ajax({
            url: "del-article_cli.html",
            type: "POST",
            data: {
                idArticle: idArticle
            },
            cache: false,
            success: function(data){
                
                $('#table_articles').DataTable().ajax.reload(null, false);

                //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: 'Article supprimé !'
                });
                      
            }
        });
        
    }

    $(document).ready(function () {

        $(document).on('click', '.updateBtn', function(){

            $('#updateModal').modal('show');
        
            // Get the table row data.
            $tr = $(this).closest('tr');
        
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            var currentRow = $(this).closest('tr');
            var data = $('#table_articles').DataTable().row(currentRow).data()
            var currentIdArticle = data['idArticle'];
            var currentTitre = data['titre'];
            var currentDescription = data['description'];
            var currentLiens = data['liens'];
            var currentNbrMots = data['nbrMots'];
            var currentDelai = data['delai'];
            var currentUrgence = data['urgence'];

            $('#m_idArticle').val(currentIdArticle);
            $('#m_titre').val(currentTitre);
            $('#m_liens').val(currentLiens);
            $('#updateModal .textarea').summernote('code', currentDescription);
            // alert(data[1]);
            // document.getElementById('m_description').innerHTML = data[1];
            $('#m_nbrMots').val(currentNbrMots);
            currentUrgence == 1 ? $('#m_urgence').val("true") : $('#m_urgence').val("false");
            // $('#m_delai').val(data[7]);
            selectionner('m_delai', currentDelai);

            //document.getElementById("form_id").action = "up-article.html/id/"+data[6];

        });

        $(document).on('click', '.deleteBtn', function(){
            
            $('#deleteModal').modal('show');

            // Get the table row data.
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            var currentRow = $(this).closest('tr');
            var data = $('#table_articles').DataTable().row(currentRow).data()
            var currentIdArticle = data['idArticle']

            $('#s_idArticle').val(currentIdArticle);

        }); 

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