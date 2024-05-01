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
                        <label for="template">Type d'article</label>
                        <select class="form-control custom-select" id="type">
                            <option value="article de blog">Article de blog</option>
                            <option value="page web">Page web</option>
                            <option value="fiche de produit">Fiche de produit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nbrMots">Nombre de mots</label>
                        <input type="number" class="form-control" name="values[nbrMots]" id="nbrMots" required>
                    </div>
                    <div class="form-group">
                        <label for="style">Style de langage</label>
                        <select class="form-control custom-select" id="style">
                            <option value="informatif">Informatif</option>
                            <option value="narratif">Narratif</option>
                            <option value="argumentatif">Argumentatif</option>
                            <option value="humoristique">Humoristique</option>
                            <option value="déscriptif">Déscriptif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ton">Ton du texte</label>
                        <select class="form-control custom-select" id="ton">
                            <option value="formel">Formel</option>
                            <option value="familier">Familier</option>
                            <option value="professionnel">Professionnel</option>
                            <option value="littéraire">Littéraire</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="text-secondary">(Optionnel)</span></label>
                        <textarea class="textarea" id="description" name="values[description]" value="" placeholder="Description" style="width: 100%; max-height: 400px; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="liens">Liens de référence <span class="text-secondary">(Optionnel)</span></label>
                        <textarea name="values[liens]" id="liens" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button id="addForm" class="btn btn-block btn-outline-primary">Générer le plan de rédaction</button>
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

<!-- planModal -->
<div class="modal fade" id="planModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Plan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white;" aria-hidden="true">&times;</span>
            </button>
        </div>
            <div id="form_plan">
                <div class="modal-body mt-3">
                    <div id="plan"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button id="addPlan" class="btn btn-block btn-outline-primary">Générer un autre plan</button>
                    <button id="listPlan" class="btn btn-block btn-outline-info">Liste des plans</button>
                    <button id="validePlan" class="btn btn-block btn-outline-success">Continuer avec celui ci</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- listModal -->
<div class="modal fade" id="listModal">
    <div class="modal-dialog modal-lg modal-dialog-centered bg-transparent">
        <div class="modal-content bg-transparent">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">LISTE DES PLANS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: white;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-3 bg-transparent">
                <div id="planList"></div>
            </div>
            <div class="modal-footer justify-content-between">
                <button id="addPlan" class="btn btn-block btn-outline-primary">Générer un autre plan</button>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
</div>

<script>
    //gestion du loader
    var setLoader = (element, text) => {
        element.prepend('<div id="action-loader" class="text-center fa-2x text-white h-100 w-100" style="padding-top: 40vh; position: fixed; z-index: 99999; top: 0; left: 0; background-color: rgba(0,0,0,0.8);">'+
            '<i id="loader-icon" class="fas fa-spinner fa-2x fa-spin mt-1"></i>'+
            '<div id="loader-text" class="text-sm mt-3">'+text+'</div>'+
        '</div>');
    }
    var setLoaderText = (text) => {
        $('#loader-text').html(text);
    }
    var changeLoadericon = (icon) => {
        $('#loader-icon').toggleClass('fa-spinner fa-spin fa-'+icon);
    }
    var unSetLoader = () => {
        $('#action-loader').remove();
    }
</script>

<script>

    $(document).ready(function() {

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
                        if(row.etat == 0 || row.etat == null) {
                            stateText = '<span class="badge badge-info">EN ATTENTE</span>';
                        }
                        else if(row.etat == 1) {
                            stateText = '<span class="badge badge-success">ACCEPTE</span>';
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
                        var defaultButton = '';
                        if(row.etat != 1) {
                            var defaultButton = '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Modifier" class="btn btn-xs btn-warning text-white updateBtn mr-1"><i class="fas fa-edit" aria-hidden="true"></i></button>'+
                                                '<button type="button" data-toggle="tooltip" data-placement="bottom" title="Supprimer" class="btn btn-xs btn-danger text-white deleteBtn"><i class="fas fa-trash" aria-hidden="true"></i></button>';
                        }
                        return detail+defaultButton;
                    }
                }
            ],
            "columnDefs": [
                {
                    "targets": [2,6,7,9],
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


    var idClient = "";
    var titre = "";
    var description = "";
    var type = "";
    var liens = "";
    var nbrMots = "";
    var urgence = "";
    var style = "";
    var ton = "";

    var plans = [];

    $('#listPlan').hide();

    var sendRequest = function () {

        var fileContent;
        var plan;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'Controllers/requete_chat.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                fileContent = JSON.parse(xhr.responseText);
                // console.log(fileContent.req);

                requetePlan = fileContent.req;
                const prompt = requetePlan;

                do {
                    fetch('https://api.openai.com/v1/engines/text-davinci-003/completions', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer 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'
                        },
                        body: JSON.stringify({
                            prompt: prompt,
                            max_tokens: 2040,
                            temperature: 0.5
                        })
                    }).then(response => {
                        return response.json();
                    }).then(responseJson => {
                        console.log(responseJson.choices[0].text);
                        plan = responseJson.choices[0].text;
                        // $.parseHTML(text)
                        plans.push(plan);
                        // output.innerHTML = responseJson.choices[0].text;
                        $('#plan').html(plan);
                        if(plans.length > 0) $('#listPlan').show();
                        $('#planModal').modal('show');
                        
                        if(plan.includes('<h2>')) {
                            setLoaderText("Génération terminée");
                            setTimeout(() => {
                                unSetLoader();
                            }, 2000);
                        }

                        // ajouterArticle(titre, description, nbrMots, delai, urgence, liens, idClient);

                    }).catch(error => {
                        console.log(error);
                    });
                } while (!plan.includes('<h2>'));
            }
        };

        xhr.send("titre=" + titre + "&type=" + type + "&nbrMots=" + nbrMots + "&style=" + style + "&ton=" + ton + "&description=" + description);

    }

    $('#listPlan').on('click', function() {
        listContent = '';
        for(var i = 0; i < plans.length; i++) {
            listContent += '<div class="bg-white p-4">'+plans[i]+'<button id="choiceBtn-'+i+'" class="btn btn-block btn-success">Choisir</button></div><br>';
        }
        $('#planModal').modal('hide');
        $('#planList').html(listContent);
        $('#listModal').modal('handleUpdate');
        $('#listModal').modal('show');
    })

    $('#addPlan').on('click', function() {

        sendRequest();
        
        $('#planModal').modal('hide');
        $('#listModal').modal('hide');
        setLoader($('body'), 'Génération en cours...');

    })

    // $('#addForm').on('click', function() {
    $(document).on('click', '#addForm', function() {

        idClient = $('#idClient').val();
        titre = $('#titre').val();
        description = $('#description').val();
        type = $('#type').val();
        style = $('#style').val();
        ton = $('#ton').val();
        liens = $('#liens').val();
        nbrMots = $('#nbrMots').val();
        urgence = 0;

        sendRequest();

        $('#addModal').modal('hide');
        setLoader($('body'), 'Génération en cours...');

        // chargement du loader


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