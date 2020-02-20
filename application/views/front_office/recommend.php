<!-- Bouton de retour au hub prinicipal  -->
<div class="container-fluid animsition">
    <a class="go-back justify-content-center align-items-center rounded p-3 p-xl-3 p-lg-5 animsition-link" href="<?= base_url()?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub </p>
    </a>
</div>

<section class="bg-extern d-flex align-items-center justify-content-center" id="page-top" name="section-admin">

    <div class="container-fluid m-2 animsition">

        <h1 class="title text-white text-center"> Mur des recommandations </h1>

        <div class="row justify-content-center m-xl-5 m-lg-3 m-md-0 m-sm-0">

            <!-- Si il n'y a aucune recommandation à afficher alors on l'annonce -->
                <?php  if (empty($recommendations)) { ?>

                    <h1 class="title text-white"> Rien à afficher ici ! </h1>

                <?php } ?>

                <?php
                    // On mélange les reocmmendations obtenues pour ne jamais obtenir le même ordre dans l'affichage
                    shuffle($recommendations);
                    foreach ($recommendations as $recommendation) {
                ?>

                <div class="col-xl-5 col-lg-11 col-md-11 col-sm-11 m-3">

                    <div class="card" style="box-shadow: 0.25rem 0.5rem 0.5rem rgba(0,0,0,0.5);">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-2 p-0 pl-2">
                                    <h1 class="text text-left"> <?= '#' . $recommendation->id ?> </h1>
                                </div>
                                <div class="col-8">
                                    <h1 class="text text-center"> <?= 'Avis de  ' . $recommendation->first_name . ' ' . $recommendation->name ?> </h1>
                                </div>
                            </div>

                            <p class="text text-center"> Période de collaboration : <?=  $recommendation->date_start . ' au ' . $recommendation->date_end ?> </p>
                        </div>

                        <div class="card-body">
                            <p class="card-text text text-justify"> <?= $recommendation->message_text ?> </p>
                        </div>

                        <div class="card-footer text text-muted text-center">
                            <?= 'Le ' . $recommendation->date_created ?>
                        </div>

                    </div>
                </div>

                <?php } ?>

        </div>
    </div>

</section>