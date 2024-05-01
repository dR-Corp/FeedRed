<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div>
        <div class="col-sm-2">
            <a href="contacts.html" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-left"></i> Retour</a>
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

                <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><?= $contact->getName() ?></h3>

                    <div class="card-tools">
                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-read-info">

                        <h6>
                            <?= $contact->getEmail() ?>
                            <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span>
                        </h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Supprimer">
                        <i class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Archiver">
                        <i class="far fa-file-archive"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                        <i class="fas fa-print"></i></button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">

                        <?= $contact->getMessage() ?>

                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                
                <!-- /.card-footer -->
                <div class="card-footer">
                    
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Imprimer</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-file-archive"></i> Archiver</button>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Supprimer</button>
                </div>
                <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>