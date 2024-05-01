<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
        <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
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
        <?php if(!empty($articles)): ?>
        <?php
            foreach ($articles as $article) {
        ?>
            <!-- Default box -->
        <div class="card elevation-3">
          <!-- <div class="card-header bg-primary">
            <h3 class="card-title"><?= $article->getTitre() ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div> -->
          <div class="card-body row">
            <div class="col-sm-8 text-lg">
                <?= $article->getTitre() ?>
            </div>
            <div class="col-sm-4">
                <span class="float-right badge badge-info badge-md"><?= $article->getDelai() ?></span>
                <span class="float-right badge badge-info badge-md mr-2" ><?= $article->getNbrMots() ?> mots</span>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer row">
            <div class="col-sm-2">
                <a href="detail-article.html~id~<?= $article->getIdArticle() ?>"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-eye" aria-hidden="true"></i> Voir</button></a>
            </div>
            <div class="col-sm-2">
                <a href="prendre-article.html~idArticle~<?= $article->getIdArticle() ?>~idRedacteur~<?= $_SESSION['idRedacteur'] ?>"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-" aria-hidden="true"></i> Prendre</button></a>
            </div>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <?php
            }
        ?>
        <?php else: ?>
          <div class="row">
            <div class="col-12">
                <div class="card elevation-3">
                    <div class="card-header" style="background-color: #044687; color: white;">
                        <h1 class="card-title">Aucune article disponible</h1>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->