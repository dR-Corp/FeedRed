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
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="pt-2" style="background: url('<?php echo ASSETS;?>Login/images/redac.jpg') no-repeat; background-size: 100%; background-position:; border-radius: 3px; padding-bottom: 1px;">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle bg-dark"
                        src="<?php echo ASSETS;?>LTE/dist/img/avatar.png"
                        alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center font-weight-bold text-white"><?= $user->getPrenom().' '.$user->getNom() ?></h3>

                    <p class="text-muted text-center">
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

                        //show if user account is activated
                        if($user->getEtat() == 0) {
                            echo '<span class="badge badge-info ml-1" >Activé</span>';
                        }
                        else {
                            echo '<span class="badge badge-danger ml-1">Désactivé</span>';
                        }

                        // indiquer que l'utilisateur est certifié s'il l'est
                        if($user->getCertification() == 1) {
                            echo '<span class="badge badge-success ml-1" >Certifié</span>';
                        }
                    ?>
                    </p>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-body py-0">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b><i class="fas fa-envelope mr-1"></i> Email</b> <a class="float-right"><?= $user->getEmail() ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-phone-alt mr-1"></i> Téléphone</b> <a class="float-right"><?= $user->getTelephone() ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-map-marker-alt mr-1"></i> Adresse</b> <a class="float-right"><?= $user->getAdresse() ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body py-0">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <button class="btn btn-block btn-sm btn-info updateBtn" id=""><i class="fas fa-edit mr-1"></i>Modifier infos compte</button>
                                    </li>
                                    <li class="list-group-item">
                                        <button class="btn btn-block btn-sm btn-danger deleteBtn" id=""><i class="fas fa-trash mr-1"></i>Supprimer compte</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Contacter</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- updateModal -->
<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title">Modification infos compte</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
        </div>
        <form action="update-users.html" method="post" id="form_id">
            <div class="modal-body mt-3">
                <input type="hidden" name="values[idUser]" value="<?= $user->getIdUser() ?>" id="m_idUser" required>
                <input type="hidden" name="values[profil]" value="<?= $user->getProfil() ?>" id="m_profil" required>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" value="<?= $user->getNom() ?>" name="values[nom]" id="m_nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" value="<?= $user->getPrenom() ?>" name="values[prenom]" id="m_prenom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" value="<?= $user->getEmail() ?>" name="values[email]" id="m_email" required>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" value="<?= $user->getAdresse() ?>" name="values[adresse]" id="m_adresse" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="number" class="form-control" value="<?= $user->getTelephone() ?>" name="values[telephone]" id="m_telephone" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="values[password]" id="m_password">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input type="submit" value="Modifier" name="modifier" class="btn btn-block btn-outline-info">
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
            <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
        </div>
        <div class="modal-body mt-3">
            <div class="container">
                <p>Voulez vous vraiment supprimer le compte ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="del-users.html~id~<?= $user->getIdUser() ?>" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a>
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
    }); 

    $('.deleteBtn').on('click', function(){
        $('#deleteModal').modal('show');
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

</script>