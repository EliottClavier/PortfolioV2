<?php  if (empty($projects)) { ?>

    <h1 class="title"> Rien à afficher ici ! </h1>

<?php } ?>

<?php
    foreach ($projects as $project) {
?>

    <div class="col-xl-5 col-lg-11 col-md-11 col-sm-11 m-3">

        <div class="card" style="box-shadow: 0.25rem 0.5rem 0.5rem rgba(0,0,0,0.5);">

            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-2 p-0 pl-2">
                        <h1 class="text text-left"> <?= '#' . $project->id ?> </h1>
                    </div>
                    <div class="col-8">
                        <h1 class="text text-center title-update-project-<?= $project->id ?>"> <?= $project->name ?> </h1>
                    </div>

                </div>

            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <img class="img-fluid image-update-project-<?= $project->id ?>" src="<?= '../' . $project->associated_image_url ?>" alt="Illustration <?= $project->name ?>">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 mt-3">
                        <h1 class="text text-center status-update-project-<?= $project->id ?>"> <?= 'Statut actuel : ' . $project->status ?> </h1>
                    </div>
                </div>
            </div>

            <div class="card-footer">

                <div class="row justify-content-center align-items-center">

                    <div class="col-8 text-center">
                        <button class="btn btn-dark m-2 btn-edit-project" data-id="<?= $project->id ?>">
                            Éditer le projet
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>
<?php } ?>

        <!-- Modal Message -->
        <div class="modal fade" id="modalEditProject" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                    <form class="form-edit-project">

                        <div class="modal-body justify-content-center">

                            <!-- Chargement du modal  -->

                        </div>
                        <div class="modal-footer">
                            <span class="text text-muted"> * Obligatoire </span>
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal"> Annuler </button>
                            <button type="button" class="btn btn-flame btn-edit-project-confirm"> Envoyer </button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
