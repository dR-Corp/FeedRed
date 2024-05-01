    <?php
        require_once "../../Models/Redaction.php";
        require_once "../../Models/RedactionManager.php";
        require_once "../../Models/Article.php";
        require_once "../../Models/ArticleManager.php";
        require_once "../../Models/Redacteur.php";
        require_once "../../Models/RedacteurManager.php";
        require_once "../../Models/Moderateur.php";
        require_once "../../Models/ModerateurManager.php";
        require_once "../../Models/Users.php";
        require_once "../../Models/UsersManager.php";
        $idRedaction = $_POST['redaction'];
        $man = new RedactionManager();
        $redaction = $man->find($idRedaction);
    ?>
    <th scope="row"><?php echo $redaction->getIdRedaction() ?></th>
    <td>
        <?php
            $art = (new ArticleManager())->find($redaction->getIdArticle());
            echo $art->getTitre();
        ?>
    </td>
    <td>
        <?php
            $red = (new RedacteurManager())->find($redaction->getIdRedacteur());
            $use = (new UsersManager())->find($red->getIdUser());
            $nom = $use->getNom();
            $prenom = $use->getPrenom();
            echo '<a href="detail-users.html~id~'.$red->getIdUser().'"><span class="badge">'.$nom.' '.$prenom.'</span></a>';
        ?>
    </td>
    <td><?php echo $redaction->getNbrMots() ?></td>
    <td class="text-center">
        <button type="button" data-tog="tooltip" data-placement="bottom" title="PDF" class="btn btn-xs btn-primary text-white pdfBtn"  onclick="afficherPdf()"><i class="fas fa-file-pdf" aria-hidden="true"></i></button>
        <!-- <a href="afficher-redaction-pdf.html~id~<?= $redaction->getIdRedaction() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="PDF" class="btn btn-xs btn-info text-white pdfBtn"><i class="fas fa-file-pdf" aria-hidden="true"></i></button></a> -->
        <a href="afficher-redaction.html~id~<?= $redaction->getIdRedaction() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Afficher redaction" class="btn btn-xs btn-info text-white afficherBtn" data-toggle="modal" data-target="#afficherModal"><i class="fas fa-eye" aria-hidden="true"></i></button></a>
        <a href="<?php echo STORAGES.$redaction->getFichier() ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Télécharger redaction" class="btn btn-xs btn-info text-white"><i class="fas fa-download" aria-hidden="true"></i></button></a>
    </td>
    <td><?php echo $redaction->getDateRedaction() ?></td>
    <td>
        <?php 
            if($redaction->getEtat() == 0) {
                echo '<span class="badge badge-info" >En cours d\'examination</span>';
            }
            else if($redaction->getEtat() == 1) {
                echo '<span class="badge badge-success">Validé</span>';
            }
            else if($redaction->getEtat() == 2) {
                echo '<span class="badge badge-warning">Non validé</span>';
            }
            else if($redaction->getEtat() == 3) {
                echo '<span class="badge badge-danger">Refusé</span>';
            }
        ?>
    </td>
    <td hidden><?php echo $redaction->getCorrection() ?></td>
    <td hidden><?php echo $redaction->getIdRedaction() ?></td>
    <td>
        <?php if(is_null($redaction->getEtat())): ?>
            <button onclick="validerRedaction('<?php echo $redaction->getIdRedaction() ?>', <?php echo $_SESSION['idModerateur'] ?>)" type="button" data-tog="tooltip" data-placement="bottom" title="Valider" class="btn btn-xs btn-success text-white validerBtn"><i class="fas fa-check" aria-hidden="true"></i></button>
            <!-- <a href="valider-redaction.html~idRedaction~<?= $redaction->getIdRedaction() ?>~idModerateur~<?= $_SESSION['idModerateur'] ?>"><button type="button" data-tog="tooltip" data-placement="bottom" title="Valider" class="btn btn-xs btn-success text-white updateBtn" data-toggle="modal" data-target="#updateModal"><i class="fas fa-check" aria-hidden="true"></i></button></a> -->
            <button type="button" data-tog="tooltip" data-placement="bottom" title="Invalider" class="btn btn-xs btn-warning text-white invaliderBtn" data-toggle="modal" data-target="#invaliderModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-edit" aria-hidden="true"></i></button>
            <button type="button" data-tog="tooltip" data-placement="bottom" title="refuser" class="btn btn-xs btn-danger text-white refuserBtn" data-toggle="modal" data-target="#refuserModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-times" aria-hidden="true"></i></button>
        <?php elseif($redaction->getEtat() == 2): ?>
            <button type="button" data-tog="tooltip" data-placement="bottom" title="Invalider" class="btn btn-xs btn-warning text-white invaliderBtn" data-toggle="modal" data-target="#invaliderModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-edit" aria-hidden="true"></i></button>
            <button type="button" data-tog="tooltip" data-placement="bottom" title="refuser" class="btn btn-xs btn-danger text-white refuserBtn" data-toggle="modal" data-target="#refuserModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-times" aria-hidden="true"></i></button>
        <?php endif; ?>
        <?php if(!empty($redaction->getRaisons())): ?>
            <button type="button" data-tog="tooltip" data-placement="bottom" title="Raisons refus" class="btn btn-xs btn-info text-white raisonsBtn" data-toggle="modal" data-target="#raisonsModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"></i></button>
        <?php elseif(!empty($redaction->getCorrection())): ?>
            <button type="button" data-tog="tooltip" data-placement="bottom" title="Voir Correction" class="btn btn-xs btn-info text-white correctionBtn" data-toggle="modal" data-target="#correctionModal<?= $redaction->getIdRedaction() ?>"><i class="fas fa-eye" aria-hidden="true"></i></button>
        <?php endif; ?>
    </td>