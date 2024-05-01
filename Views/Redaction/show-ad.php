<?php echo $_SESSION['profil'] == 1 ? $redaction_CRUD_JS : $redaction_CRUD_JS_MOD; ?>
<input type="hidden" id="data_link" value="reload-redaction.html">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
        <span class="badge badge-info text-md float-right"><?= $nbrTousRedaction ?></span>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if(!empty($articles)): ?>
            <div class="row">
            <div class="col-12">
                    <!-- Default box -->
                <div class="card elevation-3">
                    <div class="card-header bg-primary">
                        <h1 class="card-title">Rédactions en cours</h1>

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
                        <table id="table_articles" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Titre</th>
                                    <th hidden scope="col">Description</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Redacteur</th>
                                    <th scope="col">Delai</th>
                                    <th hidden scope="col">ID Article</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($articles as $article) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $article->getIdArticle() ?></th>
                                    <td><?php echo $article->getTitre() ?></td>
                                    <td hidden><?php echo $article->getDescription() ?></td>
                                    <td><?php echo $article->getNbrMots() ?></td>
                                    <td>
                                        <?php 
                                            if($article->getEtat() == 0) {
                                                echo '<span class="badge badge-info" >Libre</span>';
                                            }
                                            else if($article->getEtat() == 1) {
                                                echo '<span class="badge badge-warning">Redigé</span>';
                                            }
                                            else if($article->getEtat() == 2) {
                                                echo '<span class="badge badge-success">Pris</span>';
                                            }
                                            else {
                                                echo '<span class="badge badge-success">Laissé</span>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($article->getRedacteur() == 0) {
                                                echo '<span class="badge badge-info" >Aucun</span>';
                                            }
                                            else {
                                                $red = (new RedacteurManager())->find($article->getRedacteur());
                                                $use = (new UsersManager())->find($red->getIdUser());
                                                $nom = $use->getNom();
                                                $prenom = $use->getPrenom();
                                                echo '<a href="detail-users.html~id~'.$red->getIdUser().'"><span class="badge">'.$nom.' '.$prenom.'</span></a>';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $article->getDelai()."H" ?></td>
                                    <td hidden><?php echo $article->getIdArticle() ?></td>
                                    <td>
                                        <a href="liberer-article.html~idArticle~<?= $article->getIdArticle() ?>~idRedacteur~<?= $article->getRedacteur() ?>"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Libérer l'article" class="btn btn-xs btn-danger"><i class="fas fa-times" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Titre</th>
                                    <th hidden scope="col">Description</th>
                                    <th scope="col">Nombre de mots</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Redacteur</th>
                                    <th scope="col">Delai</th>
                                    <th hidden scope="col">ID Article</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="card elevation-3">
                        <div class="card-header" style="background-color: #044687; color: white;">
                            <h1 class="card-title">Aucune rédaction en cours</h1>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card elevation-3">
                    <div class="card-header bg-primary">
                        <h1 class="card-title">Rédactions soumises</h1>
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
                        <table id="table_redactions" class="table table-condensed table-bordered table-striped">
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