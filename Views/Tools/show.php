<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark"><?= $titrePage; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-2">
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-6">
                <div class="card elevation-3">
                    <div class="card-body row">
                        <div class="card-title col-sm-12 text-lg">
                            <h3 class="h3">Générateur de titre</h3>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-lg text-gray">
                                Créez des titres irrésistibles pour votre blog, vos articles et vos vidéos avec notre
                                générateur de titre
                            </p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-sm-12">
                            <button id="tool1Btn" class="btn btn-primary btn-md"><i class="fas fa-tools" aria-hidden="true"></i> Utiliser</button>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>

            <div class="col-6">
                <div class="card elevation-3">
                    <div class="card-body row">
                        <div class="card-title col-sm-12 text-lg">
                            <h3 class="h3">Générateur de mot clés optimiser SEO et Meta description</h3>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-lg text-gray">
                                Créez des titres irrésistibles pour votre blog, vos articles et vos vidéos avec notre
                                générateur de titre
                            </p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-sm-12">
                            <button id="tool2Btn" class="btn btn-primary btn-md"><i class="fas fa-tools"
                                    aria-hidden="true"></i> Utiliser</button>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>

            <div class="col-6">
                <div class="card elevation-3">
                    <div class="card-body row">
                        <div class="card-title col-sm-12 text-lg">
                            <h3 class="h3">Générateur de résumé performant sur un bloc de texte</h3>
                        </div>
                        <div class="col-sm-12">
                            <p class="text-lg text-gray">
                                Gagnez du temps en résumant rapidement vos textes avec notre outil innovant
                            </p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-sm-12">
                            <button id="tool3Btn" class="btn btn-primary btn-md"><i class="fas fa-tools"
                                    aria-hidden="true"></i> Utiliser</button>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /.content -->

<!-- tool1Modal -->
<div class="modal fade" id="tool1Modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Génération de titre</h4>
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
                        <label for="keywords">Mots clé</label>
                        <textarea name="values[keywords]" id="keywords" cols="30" rows="3"
                            class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="values[titre_similaire]" type="checkbox"
                                id="titre_similaire">
                            <label for="titre_similaire" class="custom-control-label">Similaire</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="values[titre_reformulation]" type="checkbox"
                                id="titre_reformulation">
                            <label for="titre_reformulation" class="custom-control-label">Reformulation</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button id="useTool1" class="btn btn-block font-weight-bold btn-primary">Valider</button>
                </div>
                <div id="outils1" class="col-12"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- tool2Modal -->
<div class="modal fade" id="tool2Modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Générateur de mot clés optimiser SEO et Meta description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: white;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="form_add">
                <div class="modal-body mt-3">

                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input type="text" class="form-control" name="values[sujet]" id="sujet" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button id="useTool2" class="btn btn-block font-weight-bold btn-primary">Valider</button>
                </div>
                <div id="outils2" class="col-12"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- tool3Modal -->
<div class="modal fade" id="tool3Modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Générateur de résumé performant sur un bloc de texte</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: white;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="form_add">
                <div class="modal-body mt-3">

                    <div class="form-group">
                        <label for="text">Texte</label>
                        <textarea placeholder="Insérez ici le textà résumer" name="values[text]" id="text" cols="30" rows="3"
                            class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="percent_reduction">Pourcentage de réduction (%)</label>
                        <input type="number" class="form-control" name="values[percent_reduction]" id="percent_reduction" required>
                    </div>

                    <div class="form-group">
                        <label for="percent_reformulation">Pourcentage de reformulation (%)</label>
                        <input type="number" class="form-control" name="values[percent_reformulation]" id="percent_reformulation" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button id="useTool3" class="btn btn-block font-weight-bold btn-primary">Valider</button>
                </div>
                <div id="outils3" class="col-12"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    $('#tool1Btn').on('click', function() {
        $('#tool1Modal').modal('show');
    });
    $('#tool2Btn').on('click', function() {
        $('#tool2Modal').modal('show');
    });
    $('#tool3Btn').on('click', function() {
        $('#tool3Modal').modal('show');
    });

    $('#useTool1').on('click', async function() {

        titre = $("#titre").val()
        keywords = $("#keywords").val()
        titre_similaire = $("#titre_similaire").val()
        titre_reformulation = $("#titre_reformulation").val()

        var prompt = "Soit le titre de base suivant "+titre+". J'aimerais que vous me générez des titres pour articles de blog, pour des vidéos :";
        if(titre_similaire) {
            prompt+= " en faisant des proposition similaire à ce titre et ";
        }
        if(titre_reformulation) {
            prompt+= " en faisant de reformulation de ce titre et";
        }
        prompt += "utilisez les mots clés suivants " + keywords + ". Donne moi le résultat au format html";

        console.log(prompt);

        const apiResponse = await fetch('https://api.openai.com/v1/engines/text-davinci-003/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer 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'
            },
            body: JSON.stringify({
                prompt: prompt,
                max_tokens: 1024,
                temperature: 0.5,
            })
        });

        const jsonResponse = await apiResponse.json();
        outils = jsonResponse.choices[0].text

        $("#outils1").html(outils);

    })

    $('#useTool2').on('click', async function() {

        sujet = $("#sujet").val()

        var prompt = "J'aimerais que vous me générez des mot clés optimisé SEO et que vous me fassiez une proposition de meta description ";
        prompt += "pour ce sujet " + sujet + ". Donne moi le résultat au format html";

        console.log(prompt);

        const apiResponse = await fetch('https://api.openai.com/v1/engines/text-davinci-003/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer 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'
            },
            body: JSON.stringify({
                prompt: prompt,
                max_tokens: 1024,
                temperature: 0.5,
            })
        });

        const jsonResponse = await apiResponse.json();
        outils = jsonResponse.choices[0].text

        $("#outils2").html(outils);

    })

    $('#useTool3').on('click', async function() {

        text = $("#text").val()
        percent_reduction = $("#percent_reduction").val()
        percent_reformulation = $("#percent_reformulation").val()

        var prompt = "J'aimerais que vous me fassiez un résumé performant du bloc de texte suivant: ";
        prompt += sujet + ". Réduisez le texte de " +percent_reduction+"%. Mais ne reformuler pas le contenu à plus de "+percent_reformulation+"%";
        prompt += ". Donne moi le résultat au format html";

        console.log(prompt);

        const apiResponse = await fetch('https://api.openai.com/v1/engines/text-davinci-003/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer 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'
            },
            body: JSON.stringify({
                prompt: prompt,
                max_tokens: 1024,
                temperature: 0.5,
            })
        });

        const jsonResponse = await apiResponse.json();
        outils = jsonResponse.choices[0].text

        $("#outils3").html(outils);

    })

</script>