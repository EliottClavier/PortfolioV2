<?php  if (empty($recommendations)) { ?>

    <h1 class="title text-white"> Rien à afficher ici ! </h1>

<?php } ?>

<?php
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

            </div>

            <div class="card-body">

                    <div class="row justify-content-center align-items-center">

                        <div class="col-8 text-center">
                            <button class="btn btn-dark m-2" data-toggle="modal" data-target="#modalMessageSearch<?= $recommendation->id?>">
                                Voir le message
                            </button>
                        </div>

                        <div class="col-4 text-center">

                            <?php if ($recommendation->status === 'verified') { ?>
                                <label class="switch">
                                    <input class="slider-change" type="checkbox" value=<?= $recommendation->id ?> checked>
                                    <span class="slider round"></span>
                                </label>
                            <?php } ?>

                            <?php if ($recommendation->status === 'pending') { ?>
                                <label class="switch">
                                    <input class="slider-change" type="checkbox" value=<?= $recommendation->id ?>>
                                    <span class="slider round"></span>
                                </label>
                            <?php } ?>

                        </div>

                </div>
            </div>

            <div class="card-footer text-muted text-center">
                <?= 'Le ' . $recommendation->date_created ?>
            </div>

        </div>

        <!-- Modal Message -->
        <div class="modal fade" id="modalMessageSearch<?= $recommendation->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="text text-center">  <?= 'Collaboration du ' . $recommendation->date_start . ' au ' . $recommendation->date_end ?> </h1>
                    </div>
                    <div class="modal-body justify-content-center">
                        <p class="card-text text-justify"> <?= $recommendation->message_text ?> </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal"> Fermer </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

<?php } ?>