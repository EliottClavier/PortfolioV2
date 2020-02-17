<?php if($this->session->userdata('user')) { ?>

<div class="container-fluid">

    <a class="go-back justify-content-center align-items-center rounded p-4" href="<?= base_url() . 'admin'?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub admin </p>
    </a>

</div>

    <section class="bg-white-modern d-flex align-items-center justify-content-center" id="page-top" name="section-admin">

        <div class="container-fluid m-2">

            <h1 class="title text-center"> Section projets </h1>

            <div class="row justify-content-center my-3">

                <div class="col-10 m-3 projects-completed display-0">

                    <?php  if (empty($projects)) { ?>

                        <h1 class="title"> Rien à afficher ici ! </h1>

                    <?php } ?>

                    <?php
                        foreach ($projects as $project) {
                    ?>

                        <div class="row justify-content-center align-items-center py-5 border-black-bottom">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 p-0">
                                <img class="img-fluid" src="<?= $project->associated_image_url ?>" alt="Illustration <?= $project->name ?>">
                            </div>

                            <span class="col-xl-1"> </span>

                            <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 mt-5 mt-xl-0 mt-lg-0">
                                <h1 class="sub-title text-center"> <?= $$project->name ?> </h1>
                                <p class="text text-justify"> <?= $project->description ?> </p>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>

    </section>

<?php } else {

    header('Location: ../admin');
    exit();
}
?>