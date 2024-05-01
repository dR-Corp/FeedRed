<?php echo $article_CRUD_JS_CLI; ?>
<input type="hidden" id="data_link" value="get-cli-articles-pris.html">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <span class="badge badge-secondary text-md float-right"><?= $nbArticleCli ?></span>
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
<!-- /.content -->