<?php require('vendor/autoload.php'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-10">
            <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
            <a href="redactions.html"><button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#addModal"><i class="fas fa-angle-left" aria-hidden="true"></i> Retour</button></a>
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
                <div class="card elevation-3">
                    <div class="card-header bg-primary">
                        <h1 class="card-title"><?= $article->getTitre() ?></h1>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body mx-5 text-justify">
                    <?php
    
                        $fileName = STORAGE.$redaction->getFichier();
                        $content = '';
                        $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');

                        if($objReader->canRead($fileName)) {
                            $phpWord = $objReader->load($fileName);
                            $sections = $phpWord->getSections();

                            foreach($sections as $s) {
                                $els = $s->getElements();
                                foreach($els as $el) {
                                    if(get_class($el) === 'PhpOffice\PhpWord\Element\TextRun') { 
                                        foreach($el->getElements() as $e) {
                                            if(get_class($e) !== 'PhpOffice\PhpWord\Element\TextBreak')
                                                $content .= $e->getText();
                                        }
                                    }
                                    else if(get_class($el) === 'PhpOffice\PhpWord\Element\TextBreak') {
                                        // $content .= " <br>";
                                    }
                                    else if(get_class($el) === 'PhpOffice\PhpWord\Element\Title') {
                                        $content .= $el->getText();
                                    }
                                    else if(get_class($el) === 'PhpOffice\PhpWord\Element\ListItemRun') {
                                        foreach($el->getElements() as $e) {
                                            // foreach($e->getElements() as $ea) {
                                                $content .= $e->getText();
                                            // }
                                        }
                                    }
                                    else {
                                        throw new Exception('Unknown class type '.get_class($el));
                                    }
                                    $content .= " <br>";
                                }
                            }
                        }
                        else {
                            echo "Le fichier n'est pas supporté";
                        }
                    ?>
                    <p><?= $content ?></p>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>

      </div>
    </section>
    <!-- /.content -->

<script>

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

$(function () {
    $("#table_redactions").DataTable({
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

$(document).ready(function () {
    $('.afficherBtn').on('click', function(){

        $('#afficher').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        
        document.getElementById("afficherTitle").innerHTML = data[0];
        document.getElementById("afficherContent").innerHTML = data[8];

    }); 
});

$(document).ready(function () {
    $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');
    
        // Get the table row data.
        $tr = $(this).closest('tr');
    
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#m_idArticle').val(data[6]);
        $('#m_titre').val(data[0]);
        $('#m_description').val(data[1]);
        $('#m_nbrMots').val(data[2]);
        $('#m_delai').val(data[5]);

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
        document.getElementById("delete_id").href = "del-article.html~id~"+data[6];

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