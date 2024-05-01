<script>
$(function () {

    var tableArticle = $("#table_contacts").DataTable({
        // "serverSide": true,
        "ajax": {
            "url" : "reload-contact.html",
            "method": "POST",
            "data": {},
            "dataSrc": ""
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": null,
                render: function(data, type, row) {
                    if(row.withMessage == "non") {
                        return '<span class="badge badge-primary">Aucun message</span>';
                    }
                    else if(row.withMessage == "oui") {
                        // return '<Button class="btn btn-primary btn-sm">Lire</Button>';
                        return '<a href="lire-contact.html~id~'+row.id+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Lire" class="btn btn-xs btn-info mr-1 btn-block"><i class="fas fa-folder-open" aria-hidden="true"></i> Lire</button></a>';
                    }
                }
            },
            {"data": null,
                render: function(data, type, row) {
                    if(row.etat == 0 || row.etat == null) {
                        return '<span class="badge badge-primary">Non lu</span>';
                    }
                    else if(row.etat == 1) {
                        return '<span class="badge badge-secondary">Lu</span>';
                    }
                    else if(row.etat == 2) {
                        return '<span class="badge badge-success">Traité</span>';
                    }
                    else if(row.etat == 3) {
                        return '<span class="badge badge-warning">Archivé</span>';
                    }
                }
            },
            {"data": "id"},
            {"data": "created_at"},
            {"data": "updated_at"},
            {"data": null,
                render: function(data, type, row) {
                    var defaultButton = '';
                    if(row.etat != 2){
                        defaultButton += '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Marquer comme traité" class="btn btn-xs btn-success text-white traiterBtn mr-1"><i class="fas fa-check" aria-hidden="true"></i></button>';
                    }
                    defaultButton += '<button type="button" data-toggle="tooltip" data-placement="bottom" title="archiver" class="btn btn-xs btn-secondary text-white archiverBtn mr-1"><i class="fas fa-file-archive" aria-hidden="true"></i></button>'+
                                        '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Supprimer" class="btn btn-xs btn-danger text-white deleteBtn"><i class="fas fa-trash" aria-hidden="true"></i></button>';
                    return defaultButton;
                }
            }
        ],
        "columnDefs": [
            {
                "targets": [5],
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

    $('#table_contacts').on('draw.dt', function() {
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
        </div>
        <div class="col-sm-2">
            <span class="badge badge-secondary text-md float-right"><?= $nbContact ?></span>
        </div>
    </div>
    </div>
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
                        <table id="table_contacts" class="table table-bordered table-striped">
                            <thead>
	                            <tr>
	                                <th scope="col">N°</th>
	                                <th scope="col">Nom et prénom</th>
	                                <th scope="col">Email</th>
	                                <th scope="col">Message</th>
	                                <th scope="col">Etat</th>
	                                <th hidden scope="col">ID</th>
	                                <th scope="col">Date d'envoi</th>
	                                <th scope="col">Dernière modification</th>
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </thead>
                            <tbody>
	                        </tbody>
                            <tfoot>
	                            <tr>
                                    <th scope="col">N°</th>
	                                <th scope="col">Nom et prénom</th>
	                                <th scope="col">Email</th>
	                                <th scope="col">Message</th>
	                                <th scope="col">Etat</th>
	                                <th hidden scope="col">ID</th>
	                                <th scope="col">Date d'envoi</th>
	                                <th scope="col">Dernière modification</th>
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->


<!-- updateModal la seul modification possible ici, c'est la réponse -->
<!-- <div class="modal fade" id="updateModal">
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
                    <select class="form-control" name="values[delai]" id="m_delai">
                        <?php for($i = 4; $i < 16; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button id="updateForm" class="btn btn-block btn-outline-warning">Modifier</button>
            </div>
        </div>
        </div>
    </div>
</div> -->
<!-- <script>
    $('#updateForm').on('click', function() {
        var idArticle = $('#m_idArticle').val();
        var titre = $('#m_titre').val();
        var description = $('#m_description').val();
        var nbrMots = $('#m_nbrMots').val();
        var delai = $('#m_delai').val();
        $('#updateModal').modal('hide');
        modifierArticle(idArticle, titre, description, nbrMots, delai);
    })
</script> -->

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
            <input type="hidden" name="values[id]" id="s_id" required>
            <div class="container">
                <p>Voulez vous vraiment supprimer ce contact ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <button id="deleteForm" type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Oui</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-block btn-outline-primary" data-dismiss="modal">Non</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
    $('#deleteForm').on('click', function() {
        var id = $('#s_id').val();
        $('#deleteModal').modal('hide');
        supprimerContact(id);
    })
</script>

<script>


    function supprimerContact(id) {  
        $.ajax({
            url: "del-contact.html",
            type: "POST",
            data: {
                id: id
            },
            cache: false,
            success: function(data){
                $('#table_contacts').DataTable().ajax.reload(null, false);
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Contact supprimé !'
                });         
            }
        });
    }

    function traiterContact(id) {  
        
        $.ajax({
            url: "traiter-contact.html",
            type: "POST",
            data: {
                id: id
            },
            cache: false,
            success: function(data){
                $('#table_contacts').DataTable().ajax.reload(null, false);
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Contact traité !'
                });         
            }
        });
    }

    function archiverContact(id) {  
        $.ajax({
            url: "archiver-contact.html",
            type: "POST",
            data: {
                id: id
            },
            cache: false,
            success: function(data){
                $('#table_contacts').DataTable().ajax.reload(null, false);
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Contact archivé !'
                });         
            }
        });
    }

    $(document).ready(function () {

        $(document).on('click', '.deleteBtn', function(){
            
            $('#deleteModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            var currentRow = $(this).closest('tr');
            var data = $('#table_contacts').DataTable().row(currentRow).data()
            var currentId = data['id']

            $('#s_id').val(currentId);

        });

        $(document).on('click', '.traiterBtn', function(){

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            var currentRow = $(this).closest('tr');
            var data = $('#table_contacts').DataTable().row(currentRow).data()
            var currentId = data['id']
            
            traiterContact(currentId);

        }); 

        $(document).on('click', '.archiverBtn', function(){
            
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            var currentRow = $(this).closest('tr');
            var data = $('#table_contacts').DataTable().row(currentRow).data()
            var currentId = data['id']

            archiverContact(currentId);

        }); 



    });

    // function selectionner(selectId, optionValToSelect) {

    //     var selectElement = document.getElementById(selectId);
    //     var selectOptions = selectElement.options;
    //     for (var opt, j = 0; opt = selectOptions[j]; j++) {
    //         if (opt.value == optionValToSelect) {
    //             selectElement.selectedIndex = j;
    //             break;
    //         }
    //     }
    // }

</script>