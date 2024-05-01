<?php echo $commandes_CRUD_JS_CLI; ?>
<!-- <input type="hidden" id="data_link" value="get-commandes.html"> -->
<input type="hidden" id="data_link" value="get-commandes-articles.html">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-8">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <span class="badge badge-secondary text-md float-right"><?= $nbCommandes ?></span>
        </div>
        <div class="col-sm-2" id="addBtnField">
            <button class="btn btn-primary btn-sm btn-block addBtn" data-toggle="tooltip" data-placement="bottom" title="Ajout manuel"><i class="fas fa-plus mr-2" aria-hidden="true"></i> Commander</button>
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
                        <table id="table_articles" class="table table-bordered table-striped table-sm">
                            <thead>
	                            <tr>
	                                <th scope="col">N°</th>
	                                <th scope="col">Titre</th>
	                                <th scope="col">Description</th>
	                                <th scope="col">Nombre de mots</th>
	                                <th scope="col">Etat</th>
	                                <th scope="col">Delai</th>
	                                <th scope="col">ID Article</th>
	                                <th scope="col">delai num</th>
	                                <th scope="col">Date de création</th>
	                                <th scope="col">Date de modif</th>
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </thead>
                            <tbody>
	                        </tbody>
                            <tfoot>
	                            <tr>
	                                <th scope="col">N°</th>
	                                <th scope="col">Titre</th>
	                                <th scope="col">Description</th>
	                                <th scope="col">Nombre de mots</th>
	                                <th scope="col">Etat</th>
	                                <th scope="col">Delai</th>
	                                <th scope="col">ID Article</th>
	                                <th scope="col">delai num</th>
	                                <th scope="col">Date de création</th>
	                                <th scope="col">Date de modif</th>
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
<!-- <section class="content">
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
                        <table id="table_articles" class="table table-bordered table-sm table-striped">
                            <thead>
	                            <tr>
	                                <th scope="col">N°</th>
	                                <th scope="col">Titre</th>
	                                <th scope="col">Description</th>
	                                <th scope="col">Nombre de mots</th>
	                                <th scope="col">Etat</th>
	                                <th scope="col">Delai</th>
	                                <th scope="col">ID Article</th>
	                                <th scope="col">delai num</th>
	                                <th scope="col">Date de création</th>
	                                <th scope="col">Date de modif</th>
	                                <th scope="col">Actions</th>
	                            </tr>
	                        </thead>
                            <tbody>
	                        </tbody>
                            <tfoot>
	                            <tr>
                                    <th scope="col">N°</th>
	                                <th scope="col">Titre</th>
	                                <th scope="col">Description</th>
	                                <th scope="col">Nombre de mots</th>
	                                <th scope="col">Etat</th>
	                                <th scope="col">Delai</th>
	                                <th scope="col">ID Article</th>
	                                <th scope="col">delai num</th>
	                                <th scope="col">Date de création</th>
	                                <th scope="col">Date de modif</th>
	                                <th scope="col">Actions</th>	                            
                                </tr>
	                        </tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /.content -->