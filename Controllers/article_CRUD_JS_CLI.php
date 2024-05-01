<input type="hidden" value="<?= $_SESSION['idClient'] ?>" id="idClient">

<!-- addModal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Nouvel article</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <div id="form_add">
                <div class="modal-body mt-3">
                    
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" name="values[titre]" id="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="template">Template</label>
                        <select class="form-control custom-select" id="template">
                            <option value=""></option>
                            <?php for($i = 1; $i < 4; $i++): ?>
                            <option value="<?= $i ?>"><?= 'Template '.$i ?></option>
                            <?php endfor; ?>
                        </select>
                        <script>
                            templates = {
                                "1":    '<div class="text-lg callout">Rédiger un article de …… mots sur le sujet. Utilisez plusieurs sous titres en fonction de la longueur de l’article, Utiliser un langage simple et professionnel. N’ajouter aucun numéro de téléphone ou lien sans instructions particulières. Éviter de faire du remplissage, nous le tolérerons aucun article de ce type. Nous en attendons un article bien développé et facile à lire.</div>'+
                                        '<p><h4 class="bg-info p-2 rounded">Processus de rédaction</h4>'+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 01 :</b> Comprendre l’intention de recherche dernière le sujet (Effectuer des recherches et trouver le maximum d’information pour rédiger un article pertinent et professionnel) '+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 02 :</b> Définir les différents H2 et H3 et faire soumettre en cas de doute à un admin (les différents sous-titres du sujet doivent inciter à lire et donner une idée sur votre développement)'+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 03 :</b> Rédaction de l’article (NB : Commencez par une introduction qui accroche directement le lecteur. Votre idée générale être simple, intéressant et en lien direct avec le sujet) '+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 04 :</b> Relecture de l’article et derniers ajustements (Revoyez vos différents sous-titres, Relisez votre introduction. Modifier les mauvaises formulations et petites fautes) '+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 05 :</b> Vérifier le plagiat et soumettre l’article.</p>',

                                "2":    '<div class="text-lg callout">Rédiger un guide d\'achat sur cette collection. N’ajouter aucun lien et n\'inciter pas à acheter un article en particulier. Votre mission est de faire une présentation de chaque article de la collection. Utilisez plusieurs critères et angles pour parler de chaque produit. Eviter un style trop commerciale et éviter de faire du remplissage. Nous en attendons un article bien développé et facile à lire. <p><b>NB:</b> Vous pouvez dire "pourquoi il faut acheter un article de la collection" dans son développement, sous forme de suggestion et avec un style commercial.</div>'+
                                        '<p><h4 class="bg-info p-2 rounded">Processus de rédaction</h4>'+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 01 :</b> Comprendre l’intention de recherche dernière le sujet (Effectuer des recherches et trouver le maximum d’information pour rédiger un article pertinent et professionnel) '+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 02 :</b> Définir les différents H2 et H3 et faire soumettre en cas de doute à un admin (les différents sous-titres du sujet doivent inciter à lire et donner une idée sur votre développement)'+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 03 :</b> Rédaction de l’article (NB : Commencez par une introduction qui accroche directement le lecteur. Votre idée générale être simple, intéressant et en lien direct avec le sujet) '+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 04 :</b> Relecture de l’article et derniers ajustements (Revoyez vos différents sous-titres, Relisez votre introduction. Modifier les mauvaises formulations et petites fautes) '+
                                        '</p><p class="elevation-2 p-2 text-lg callout callout-info"><b>Étape 05 :</b> Vérifier le plagiat et soumettre l’article.</p>',

                                "3":    '<div class="callout">Article de 300 mots. Séparés en deux parties. Visant des requêtes de type « Meilleur XXX ».</div>'+
                                        '<p><h5 class="bg-info p-2 rounded">Pour chaque sujet :</h5></p>'+
                                        '<div class="callout"><p><b>Xxx</b> = le produit dont parle l’article.</p><p>En cas de doute sur le produit, n’hésitez pas à regarder sur Amazon.fr à quoi cela correspond.</p></div>'+
                                        '<p class="bg-info p-2 rounded"><b>- Introduction (100 mots)</b></p>'+
                                        '<div class="callout"><p>Explications sur le produit (ce que c’est, à quoi ça sert, ses avantages)'+
                                        '</p><p>L’introduction est la partie la plus importante, il doit être très accrocheur et donné envie au lecteur de continuer par lire l’article. '+
                                        'Éviter les définitions basiques sur le produit, si aucune idée ne vous vient rechercher des articles similaires sur le produit et adapter le '+
                                        'même style rédactionnel sans faire du plagiat.</p></div>'+
                                        '<p class="bg-info p-2 rounded"><b>- Comment choisir un(e) XXX ? (200 mots)</b></p>'+
                                        '<div class="callout"><p>Explications sur les caractéristiques spécifiques au produit, les critères d’achat et le choix du produit pour bien choisir le meilleur avant '+
                                        'd’acheter en ligne.'+
                                        '</p><p>Répondez clairement à comment choisir le produit concerné, éviter les phrases sans valeur ajoutée en partageant une idée pour chaque phrase. '+
                                        'Prioriser les phrases courtes et éviter d’utiliser plusieurs fois les mêmes expressions dans une partie.</p></div>'
                            };

                            $('#template').on('change', () => {
                                thisTemplate = templates[$('#template').val()];
                                // console.log(thisTemplate);
                                // alert(thisTemplate);
                                $('#addModal .textarea').summernote('code', thisTemplate);                                  
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="textarea" id="description" name="values[description]" value="" placeholder="Description" style="width: 100%; max-height: 400px; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="liens">Liens de référence</label>
                        <textarea name="values[liens]" id="liens" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nbrMots">Nombre de mots</label>
                        <input type="number" class="form-control" name="values[nbrMots]" id="nbrMots" required>
                    </div>
                    <div class="form-group">
                        <label for="delai">Durée</label>
                        <select class="form-control custom-select" name="values[delai]" id="delai">
                            <?php for($i = 4; $i < 16; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button id="addForm" class="btn btn-block btn-outline-primary">Valider</button>
                    <!-- <input type="submit" value="Créer" name="creer"> -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- updateModal -->
<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Modification</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="form_update">
            <div class="modal-body mt-3">
                <input type="hidden" name="values[idArticle]" id="m_idArticle" required>
                <input type="hidden" name="values[urgence]" id="m_urgence" value="" required>
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="values[titre]" id="m_titre" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="values[description]" class="textarea" id="m_description" name="values[description]" value="" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                </div>
                    <div class="form-group">
                        <label for="liens">Liens de référence</label>
                        <textarea name="values[liens]" id="m_liens" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                <div class="form-group">
                    <label for="nbrMots">Nombre de mots</label>
                    <input type="number" class="form-control" name="values[nbrMots]" id="m_nbrMots" required>
                </div>
                <div class="form-group">
                    <label for="delai">Délai</label>
                    <!-- <input type="number" class="form-control" name="values[delai]" id="m_delai" required> -->
                    <select class="form-control" name="values[delai]" id="m_delai">
                        <?php for($i = 4; $i < 16; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <!-- <input type="submit" value="Modifier" name="modifier" class="btn btn-block btn-outline-warning"> -->
                <button id="updateForm" class="btn btn-block btn-outline-warning">Modifier</button>
            </div>
        </div>
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
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mt-3">
            <input type="hidden" name="values[idArticle]" id="s_idArticle" required>
            <div class="container">
                <p>Voulez vous vraiment supprimer cet article ?</p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- <a href="" id="delete_id"><button type="button" class="btn btn-block btn-outline-danger">Oui</button></a> -->
                        <button id="deleteForm" type="button" class="btn btn-block btn-outline-danger" data-dismiss="modal">Oui</button>
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

    $(function () {

        // $.ajax({
        //     url: $('#data_link').val(),
        //     type: "POST",
        //     data: { },
        //     cache: false,
        //     success: function(data) {
        //         console.log(JSON.parse(data));
        //     }
        // })

        var tableArticle = $("#table_articles").DataTable({
            "serverSide": true,
            "processing": true,
            "stateSave": false,
            "ajax": $('#data_link').val(),
            "columns": [
                {"data": "idArticle"},
                {"data": "titre"},
                {"data": "description"},
                {"data": "nbrMots"},
                {"data": null,
                    render: function(data, type, row) {
                        var stateText = "";
                        if(row.etat == 0 || row.etat == null || row.etat == 2 || row.etat == 3 || row.etat == 4) {
                            stateText = '<span class="badge badge-info">Rédaction en cours</span>';
                        }
                        else if(row.etat == 6) {
                            stateText = '<span class="badge badge-info">Optimisation en cours</span>';
                        }
                        else if(row.etat == 1) {
                            stateText = '<span class="badge badge-success">Redigé</span>';
                        }

                        return stateText;

                    }
                },
                {"data": null,
                    render: function(data, type, row) {
                        return row.delai+'H';
                    }
                },
                {"data": "idArticle"},
                {"data": "delai"},
                {"data": "created_at"},
                {"data": "updated_at"},
                {"data": null,
                    render: function(data, type, row) {
                        var detail = '<a href="detail-article-cli.html~id~'+row.idArticle+'~retour~'+12+'"><button type="button" data-toggle="tooltip" data-placement="bottom" title="Details" class="btn btn-xs btn-info mr-1"><i class="fas fa-folder-open" aria-hidden="true"></i></button></a>'
                        return detail;
                    }
                }
            ],
            "columnDefs": [
                {
                    "targets": [2, 6, 7, 9],
                    "visible": false,
                    "searchable": false
                }
            ],
            "responsive": false,
            "autoWidth": false,
            "order" : [0, 'desc'],
            "language" : {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
                "sProcessing":     '<div><i class="fa fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
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

        $('#table_articles').on('draw.dt', function() {
            $('[data-toggle="tooltip"]').tooltip({
                trigger: 'hover'
            });
        })

    });

    $('#addForm').on('click', function() {
        var idClient = $('#idClient').val();
        var titre = $('#titre').val();
        var description = $('#description').val();
        var liens = $('#liens').val();
        var nbrMots = $('#nbrMots').val();
        var delai = $('#delai').val();
        var urgence = 0;

        $('#addModal').modal('hide');
        ajouterArticle(titre, description, nbrMots, delai, urgence, liens, idClient);

        $('#template').val("");
    })

    $('#updateForm').on('click', function() {
        var idArticle = $('#m_idArticle').val();
        var titre = $('#m_titre').val();
        var description = $('#m_description').val();
        var liens = $('#m_liens').val();
        var nbrMots = $('#m_nbrMots').val();
        var delai = $('#m_delai').val();
        var urgence = $('#m_urgence').val();

        $('#updateModal').modal('hide');
        modifierArticle(idArticle, titre, description, nbrMots, delai, liens, urgence);
    })

    $('#deleteForm').on('click', function() {
        var idArticle = $('#s_idArticle').val();
        $('#deleteModal').modal('hide');
        supprimerArticle(idArticle);
    })

    function ajouterArticle(titre, description, nbrMots, delai, urgence, liens, idClient) {
        // alert(description);
        
        $.ajax({
            url: "add-article_cli.html",
            type: "POST",
            data: {
                titre: titre,
                description: description,
                nbrMots: nbrMots,
                delai: delai,
                urgence: urgence,
                liens: liens,
                idClient: idClient
            },
            cache: false,
            success: function(data) {

                var datas = JSON.parse(data);

                console.log(datas);
                
                $('#table_articles').DataTable().ajax.reload(null, true);

                //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'Article ajoutée avec succès !'
                });
                      
            }
        });
    }

    function modifierArticle(idArticle, titre, description, nbrMots, delai, liens, urgence) {
        // alert(description);
        $.ajax({
            url: "up-article_cli.html",
            type: "POST",
            data: {
                idArticle: idArticle,
                titre: titre,
                description: description,
                nbrMots: nbrMots,
                delai: delai,
                liens: liens,
                urgence: urgence,
            },
            cache: false,
            success: function(response){
                var datans = JSON.parse(response);

                $('#table_articles').DataTable().ajax.reload(null, false);
                
                //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Modification effectuée succès !'
                });
                      
            }
        });
    }

    function supprimerArticle(idArticle) {
        
        $.ajax({
            url: "del-article_cli.html",
            type: "POST",
            data: {
                idArticle: idArticle
            },
            cache: false,
            success: function(data){
                
                $('#table_articles').DataTable().ajax.reload(null, false);

                //En cas de succès envoyer une alert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: 'Article supprimé !'
                });
                      
            }
        });
        
    }

    $(document).ready(function () {

        $(document).on('click', '.addBtn', function(){
            
            $('#idArticle').val(" ");
            $('#titre').val(" ");
            $('#template').val(" ");
            $('.textarea').summernote("reset");
            $('#nbrMots').val(" ");
            $('#urgence').prop('checked', false);
            $('#addModal').modal('show');

        });

        $(document).on('click', '.updateBtn', function(){

            $('#updateModal').modal('show');
        
            // Get the table row data.
            $tr = $(this).closest('tr');
        
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            var currentRow = $(this).closest('tr');
            var data = $('#table_articles').DataTable().row(currentRow).data()
            var currentIdArticle = data['idArticle'];
            var currentTitre = data['titre'];
            var currentDescription = data['description'];
            var currentLiens = data['liens'];
            var currentNbrMots = data['nbrMots'];
            var currentDelai = data['delai'];
            var currentUrgence = data['urgence'];

            $('#m_idArticle').val(currentIdArticle);
            $('#m_titre').val(currentTitre);
            $('#m_liens').val(currentLiens);
            $('#updateModal .textarea').summernote('code', currentDescription);
            // alert(data[1]);
            // document.getElementById('m_description').innerHTML = data[1];
            $('#m_nbrMots').val(currentNbrMots);
            currentUrgence == 1 ? $('#m_urgence').val("true") : $('#m_urgence').val("false");
            // $('#m_delai').val(data[7]);
            selectionner('m_delai', currentDelai);

            //document.getElementById("form_id").action = "up-article.html/id/"+data[6];

        });

        $(document).on('click', '.deleteBtn', function(){
            
            $('#deleteModal').modal('show');

            // Get the table row data.
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            var currentRow = $(this).closest('tr');
            var data = $('#table_articles').DataTable().row(currentRow).data()
            var currentIdArticle = data['idArticle']

            $('#s_idArticle').val(currentIdArticle);

        }); 

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