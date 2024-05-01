<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10">
        <h1 class="m-0 text-dark">
            <?= $titrePage; ?>
            <div class="" id="compte_a_rebours"></div>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-2">
        <?php if($_SESSION['profil'] == 3): ?>
          <a href="home.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
        <?php else: ?>
          <?php if($retour == 1): ?>
          <a href="article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 2): ?>
          <a href="libres-article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 3): ?>
          <a href="pris-article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 4): ?>
          <a href="rediges-article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 5): ?>
          <a href="laisses-article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 6): ?>
          <a href="liberes-article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 7): ?>
          <a href="ajout-article.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 8): ?>
          <a href="client-articles.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 9): ?>
          <a href="client-redactions-encours.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 10): ?>
          <a href="client-articles-rediges.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 11): ?>
          <a href="commandes-articles.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 12): ?>
          <a href="commandes.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php elseif($retour == 0): ?>
          <a href="home.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
          <?php endif; ?>
        <?php endif; ?>
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
            <!-- Default box -->
            <div class="card elevation-3">
              <div class="card-body">
                <p><h4 class="bg-info p-2 rounded">Titre</h4>
                <div class="callout"><h3><?= $article->getTitre() ?></h3></div>
                <div><h4 class="bg-info p-2 rounded">Description</h4></div>
                <div><?= $article->getDescription() ?></div>
                <?php if( $article->getPlan() && !empty($article->getPlan())): ?>
                  <div><h4 class="bg-info p-2 rounded">Plan de rédaction</h4></div>
                  <div><?= $article->getPlan() ?></div>
                <?php endif; ?>
                
                <?php if($article->getLiens()): ?>
                <p><h4 class="bg-info p-2 rounded">Liens de référence</h4>
                <div class="callout text-info"><?= $article->getLiens() ?></div>
                <?php endif; ?>
                <p><h4 class="bg-info p-2 rounded">Autres</h4>
                <div class="callout">
                  <p class="text-lg font-weight-normal">Etat de l'article : <?= $article->getUrgence() == 1 ? '<span class="ml-2 badge badge-warning">Urgent</span>' : '' ?><?php if($article->getEtat() == 0) {echo '<span class="badge badge-info ml-2">Libre</span>';} else if($article->getEtat() == 1) {echo '<span class="badge badge-warning">Redigé</span>';} else if($article->getEtat() == 2) {echo '<span class="badge badge-success">Pris</span>';} else if($article->getEtat() == 3) {echo '<span class="badge badge-secondary">Laissé</span>';} else {echo '<span class="badge badge-secondary">Libéré</span>';} ?></p>
                  <p class="text-lg font-weight-normal">Nombre d'heures : <span class="badge badge-info" ><?= $article->getDelai()." Heures" ?></span></p>
                  <p class="text-lg font-weight-normal">Nombre de mots : <span class="badge badge-info" ><?= $article->getNbrMots() ?> mots</span></p>
                  <p class="text-lg font-weight-normal">Crée le : <span class="badge badge-info" ><?= date('d/m/Y', strtotime($article->getCreatedAt())) ?></span></p>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer row">
                <div class="col-sm-12">
                  <span class="float-right badge badge-info badge-md" ><?= $article->getDelai()."H" ?></span>
                  <span class="float-right badge badge-info badge-md mr-2" ><?= $article->getNbrMots() ?> mots</span>
                  <?php if($_SESSION['profil'] == 3): ?>
                    <span class="float-left"><a href="prendre-article.html~idArticle~<?= $article->getIdArticle() ?>~idRedacteur~<?= $_SESSION['idRedacteur'] ?>"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-" aria-hidden="true"></i> Prendre</button></a></span>
                  <?php endif; ?>
                  </div>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->