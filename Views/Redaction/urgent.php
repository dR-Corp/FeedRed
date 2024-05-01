<?php echo $_SESSION['profil'] == 1 ? $redaction_CRUD_JS : $redaction_CRUD_JS_MOD; ?>
<input type="hidden" id="data_link" value="reload-redaction-urgent.html">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
        <span class="badge badge-info text-md float-right"><?= $nbrUrgentRedaction ?></span>
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
                        <h1 class="card-title">Rédactions urgentes</h1>
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
                                <th scope="col">Fichiers</th>
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
                                <th scope="col">Fichiers</th>
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