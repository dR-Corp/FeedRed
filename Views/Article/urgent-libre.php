<script>
$(function () {

    var tableArticle = $("#table_articles").DataTable({
        // "processing": true,
        "ajax": {
            "url" : "reload-article-urgent-libres.html",
            "method": "POST",
            "data": {},
            "dataSrc": ""
        },
        "columns": [
            {"data": "idArticle"},
            {"data": "titre"},
            {"data": "description"},
            {"data": "nbrMots"},
            {"data": null,
                render: function(data, type, row) {
                    var stateText = "";
                    if(row.etat == 0 || row.etat == null) {
                        stateText = '<span class="badge badge-info">Libre</span>';
                    }
                    else if(row.etat == 1) {
                        stateText = '<span class="badge badge-warning">Redigé</span>';
                    }
                    else if(row.etat == 2) {
                        stateText = '<span class="badge badge-success">Pris</span>';
                    }
                    else if(row.etat == 3) {
                        stateText = '<span class="badge badge-secondary">Laissé</span>';
                    }
                    else {
                        stateText = '<span class="badge badge-secondary">Libéré</span>';
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
            {"data": null,
                render: function(data, type, row) {
                    var detail = '<a href="detail-article.html~id~'+row.idArticle+'~retour~'+2+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-info mr-1"><i class="fas fa-folder-open" aria-hidden="true"></i> <span class="font-weight-bold">Détails</span></button></a>'
                    return detail;
                }
            }
        ],
        "columnDefs": [
            {
                "targets": [2, 6, 7],
                "visible": false,
                "searchable": false
            }
        ],
        "responsive": false,
        "autoWidth": false,
        "order" : [],
        "language" : {
            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
            "sProcessing":     '<div><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Traitement...</div></div>',
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

    $('#table_articles').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        });
    })
    
    setInterval( function () {

    }, 10000 );

});


</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <span class="badge badge-primary text-md float-right"><?= $nbArticleUrgentLibre ?></span>
            <!-- <button class="btn btn-primary btn-sm btn-block addBtn" data-toggle="tooltip" data-placement="bottom" title="Ajout manuel"><i class="fas fa-plus" aria-hidden="true"></i> Ajouter</button> -->
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
                <div class="card table-responsive">
                    <div class="card-body">
                        <style>
                            td {
                                white-space: nowrap;
                            }
                        </style>
                        <table id="table_articles" class="table table-bordered table-striped">
                            <thead>
	                            <tr>
	                                <th scope="col">N°</th>
	                                <th scope="col">Titre</th>
	                                <th hidden scope="col">Description</th>
	                                <th scope="col">Nombre de mots</th>
	                                <th scope="col">Etat</th>
	                                <th scope="col">Delai</th>
	                                <th hidden scope="col">ID Article</th>
	                                <th hidden scope="col">delai num</th>
	                                <th scope="col">Date d'ajout</th>
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </thead>
                            <tbody>
	                        </tbody>
                            <tfoot>
	                            <tr>
	                                <th scope="col">N°</th>
	                                <th scope="col">Titre</th>
	                                <th hidden scope="col">Description</th>
	                                <th scope="col">Nombre de mots</th>
	                                <th scope="col">Etat</th>
	                                <th scope="col">Delai</th>
	                                <th hidden scope="col">ID Article</th>
	                                <th hidden scope="col">delai num</th>
	                                <th scope="col">Date d'ajout</th>
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

<!-- addModal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Nouvel article</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <div id="form_add">
                <div class="modal-body mt-3">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" name="values[titre]" id="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="textarea" id="description" name="values[description]" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nbrMots">Nombre de mots</label>
                        <input type="number" class="form-control" name="values[nbrMots]" id="nbrMots" required>
                    </div>
                    <div class="form-group">
                        <label for="delai">Durée</label>
                        <select class="form-control" name="values[delai]" id="delai">
                            <?php for($i = 4; $i < 16; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button id="addForm" class="btn btn-block btn-outline-primary">Créer</button>
                    <!-- <input type="submit" value="Créer" name="creer"> -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $('#addForm').on('click', function() {
        var titre = $('#titre').val();
        var description = $('#description').val();
        var nbrMots = $('#nbrMots').val();
        var delai = $('#delai').val();
        $('#addModal').modal('hide');
        ajouterArticle(titre, description, nbrMots, delai);
    })
</script>

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
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="values[titre]" id="m_titre" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="values[description]" class="textarea" id="m_description" name="values[description]" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
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
<script>
    $('#updateForm').on('click', function() {
        var idArticle = $('#m_idArticle').val();
        var titre = $('#m_titre').val();
        var description = $('#m_description').val();
        var nbrMots = $('#m_nbrMots').val();
        var delai = $('#m_delai').val();
        $('#updateModal').modal('hide');
        modifierArticle(idArticle, titre, description, nbrMots, delai);
    })
</script>

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
    $('#deleteForm').on('click', function() {
        var idArticle = $('#s_idArticle').val();
        $('#deleteModal').modal('hide');
        supprimerArticle(idArticle);
    })
</script>

<script>

    // var table = $('#table_articles').DataTable( {
    //     ajax: "data.json"
    // } );
    
    // setInterval( function () {
    //     table.ajax.reload(); // user paging is not reset on reload
    //     alert("JONES ALERT WORK");
    // }, 20000 );

    function ajouterArticle(titre, description, nbrMots, delai) {
        // alert(description);
        $.ajax({
            url: "add-article.html",
            type: "POST",
            data: {
                titre: titre,
                description: description,
                nbrMots: nbrMots,
                delai: delai
            },
            cache: false,
            success: function(data) {

                var datas = JSON.parse(data);
                
                $('#table_articles').DataTable().ajax.reload(null, true);

                //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Article ajoutée avec succès !'
                });
                      
            }
        });
    }

    function modifierArticle(idArticle, titre, description, nbrMots, delai) {
        // alert(description);
        $.ajax({
            url: "up-article.html",
            type: "POST",
            data: {
                idArticle: idArticle,
                titre: titre,
                description: description,
                nbrMots: nbrMots,
                delai: delai
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
            url: "del-article.html",
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

        $(document).on('click', '.addBtn', function(){
            
            $('#idArticle').val(" ");
            $('#titre').val(" ");
            $('.textarea').summernote("reset");
            $('#nbrMots').val(" ");

            $('#addModal').modal('show');

        });

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
            var currentNbrMots = data['nbrMots'];
            var currentDelai = data['delai'];

            $('#m_idArticle').val(currentIdArticle);
            $('#m_titre').val(currentTitre);
            $('#updateModal .textarea').summernote('code', currentDescription);
            // alert(data[1]);
            // document.getElementById('m_description').innerHTML = data[1];
            $('#m_nbrMots').val(currentNbrMots);
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