<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus" aria-hidden="true"></i> Ajouter</button>
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
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Profil</th>
                                <th scope="col">Etat</th>
                                <th hidden scope="col">ID Users</th>
                                <th hidden scope="col">profil</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($users as $user) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $user->getIdUser() ?></th>
                                <td><?php echo $user->getNom() ?></td>
                                <td><?php echo $user->getPrenom() ?></td>
                                <td><?php echo $user->getEmail() ?></td>
                                <td><?php echo $user->getAdresse() ?></td>
                                <td><?php echo $user->getTelephone() ?></td>
                                <td>
                                    <?php 
                                        if($user->getProfil() == 1) {
                                            echo '<span class="badge badge-success" >Admin</span>';
                                        }
                                        else if($user->getProfil() == 2) {
                                            echo '<span class="badge badge-info">Modérateur</span>';
                                        }
                                        else if($user->getProfil() == 3) {
                                            echo '<span class="badge badge-primary">Rédacteur</span>';
                                        }
                                        else if($user->getProfil() == 4) {
                                            echo '<span class="badge badge-secondary">Client</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($user->getEtat() == 0) {
                                            echo '<span class="badge badge-info" >Activé</span>';
                                        }
                                        else {
                                            echo '<span class="badge badge-danger">Désactivé</span>';
                                        }

                                        // indiquer que l'utilisateur est certifié s'il l'est
                                        if($user->getCertification() == 1) {
                                            echo '<span class="badge badge-success ml-1" >Certifié</span>';
                                        }
                                    ?>
                                </td>
                                <td hidden><?php echo $user->getIdUser() ?></td>
                                <td hidden><?php echo $user->getProfil() ?></td>
                                <td>
                                    <a href="detail-users.html~id~<?= $user->getIdUser() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-info"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>
                                    
                                    <!-- cerification -->
                                    <?php if($user->getCertification() == null && $user->getProfil() == 3): ?>
                                        <a href="certified-users.html~id~<?= $user->getIdUser() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Certifier" class="btn btn-xs btn-success text-white certifiedBtn"><i class="fas fa-user-graduate" aria-hidden="true"></i></button></a>
                                    <?php elseif($user->getCertification() == 1 && $user->getProfil() == 3): ?>
                                        <a href="uncertified-users.html~id~<?= $user->getIdUser() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Retirer certification" class="btn btn-xs btn-secondary text-white uncertifiedBtn"><i class="fas fa-user" aria-hidden="true"></i></button></a>
                                    <?php endif; ?>
                                    
                                    <button type="button" data-tog="tooltip" data-placement="bottom" title="Modifier" class="btn btn-xs btn-warning text-white updateBtn" data-toggle="modal" data-target="#updateModal"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                    <button type="button" data-tog="tooltip" data-placement="bottom" title="Supprimer" class="btn btn-xs btn-danger text-white deleteBtn" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    <?php if(!is_null($user->getEtat())): ?>
                                    <a href="activer-users.html~id~<?= $user->getIdUser() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Activer" class="btn btn-xs btn-success text-white valideBtn"><i class="fas fa-check" aria-hidden="true"></i></button></a>
                                    <?php else: ?>
                                    <a href="desactiver-users.html~id~<?= $user->getIdUser() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Désactiver" class="btn btn-xs btn-secondary text-white invalideBtn"><i class="fas fa-times" aria-hidden="true"></i></button></a>
                                    <?php endif; ?>
                                    
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Profil</th>
                                <th scope="col">Etat</th>
                                <th hidden scope="col">ID Users</th>
                                <th hidden scope="col">profil</th>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Nouvel utilisateur</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="add-users.html" method="post" id="form">
                <div class="modal-body mt-3">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="values[nom]" id="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" name="values[prenom]" id="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="values[email]" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" name="values[adresse]" id="adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="number" class="form-control" name="values[telephone]" id="telephone" required>
                    </div>
                    <div class="form-group">
                        <label for="profil">Profil</label>
                        <select class="custom-select" name="values[profil]" id="profil">
                            <option value="4">Client</option>
                            <option value="1">Admin</option>
                            <option value="2">Modérateur</option>
                            <option value="3">Rédacteur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="values[password]" id="password" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" value="Créer" name="creer" class="btn btn-block btn-outline-primary">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- updateModal -->
<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Modification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="up-users.html" method="post" id="form_id">
            <div class="modal-body mt-3">
                <input type="hidden" name="values[idUser]" id="m_idUser" required>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="values[nom]" id="m_nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="values[prenom]" id="m_prenom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="values[email]" id="m_email" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" name="values[adresse]" id="m_adresse" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="number" class="form-control" name="values[telephone]" id="m_telephone" required>
                </div>
                <div class="form-group">
                    <label for="profil">Profil</label>
                    <select class="custom-select" name="values[profil]" id="m_profil">
                        <option value="4">Client</option>
                        <option value="1">Admin</option>
                        <option value="2">Modérateur</option>
                        <option value="3">Rédacteur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="values[password]" id="m_password">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="submit" value="Modifier" name="modifier" class="btn btn-block btn-outline-warning">
            </div>
        </form>
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
            <div class="container">
                <p>Voulez vous vraiment supprimer cet utilisateur ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a>
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

$(document).ready(function () {
    $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#m_nom').val(data[0]);
        $('#m_prenom').val(data[1]);
        $('#m_email').val(data[2]);
        $('#m_adresse').val(data[3]);
        $('#m_telephone').val(data[4]);
        selectionner('m_profil', data[8]);
        $('#m_idUser').val(data[7]);

        //document.getElementById("form_id").action = "up-article.html/id/"+data[6];

    }); 
});

$(document).ready(function () {
    $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        document.getElementById("delete_id").href = "del-users.html~id~"+data[7];

    }); 
});

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

$(function () {
    $("#table_articles").DataTable({
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