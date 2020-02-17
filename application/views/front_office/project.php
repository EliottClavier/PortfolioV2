<div class="container-fluid">

    <a class="go-back justify-content-center align-items-center rounded p-3 p-xl-3 p-lg-5" href="<?= base_url()?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub </p>
    </a>

</div>

<section class="bg-white-modern d-flex align-items-center justify-content-center" id="page-top" name="section-admin">

    <div class="container-fluid m-2">

        <h1 class="title text-center"> Découvrir mes projets </h1>

        <div class="row justify-content-center my-3">
            <div class="col-10 title-line">
                <button class="btn btn-white btn-projects-in-progress title-line text-center border-black">
                    Projets en cours
                    <i class="ml-2 fa fa-angle-down" style="color: black"></i>
                </button>
            </div>

            <div class="col-10 m-3 projects-in-progress display-0">

                <?php if (empty($progress_projects)) { ?>

                    <h1 class="title"> Rien à afficher ici ! </h1>

                <?php } ?>

                <?php
                foreach ($progress_projects as $progress_project) {
                    ?>

                    <div class="row justify-content-center align-items-center py-5 border-black-bottom">
                        <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 ">
                            <h1 class="sub-title text-center"> <?= $progress_project->name ?> </h1>
                            <p class="text text-justify"> <?= $progress_project->description ?> </p>
                            <?php if($progress_project->url != null) { ?>

                                <div class="row justify-content-center">
                                    <a class="btn btn-white btn-lg" href="<?= $progress_project->url ?>" target="_blank"> Découvrir </a>
                                </div>

                            <?php } ?>
                        </div>

                        <span class="col-xl-1"> </span>

                        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 p-0">
                            <img class="img-fluid" src="<?= $progress_project->associated_image_url ?>" alt="Illustration <?= $progress_project->name ?>">
                        </div>

                    </div>

                <?php } ?>
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-10 title-line">
                <button class="btn btn-white btn-projects-completed title-line text-center border-black">
                    Projets achevés
                    <i class="ml-2 fa fa-angle-down" style="color: black"></i>
                </button>
            </div>

            <div class="col-10 m-3 projects-completed display-0">

                <?php  if (empty($completed_projects)) { ?>

                    <h1 class="title"> Rien à afficher ici ! </h1>

                <?php } ?>

                    <?php
                        foreach ($completed_projects as $completed_project) {
                    ?>

                        <div class="row justify-content-center align-items-center py-5 border-black-bottom">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 p-0">
                                <img class="img-fluid" src="<?= $completed_project->associated_image_url ?>" alt="Illustration <?= $completed_project->name ?>">
                            </div>

                            <span class="col-xl-1"> </span>

                            <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 mt-5 mt-xl-0 mt-lg-0">
                                <h1 class="sub-title text-center"> <?= $completed_project->name ?> </h1>
                                <p class="text text-justify"> <?= $completed_project->description ?> </p>
                                <?php if($completed_project->url != null) { ?>

                                    <div class="row justify-content-center">
                                        <a class="btn btn-white btn-lg" href="<?= $completed_project->url ?>" target="_blank"> Découvrir </a>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>
                </div>
        </div>
    </div>
</section>