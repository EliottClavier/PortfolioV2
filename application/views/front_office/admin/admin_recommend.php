<?php if($this->session->userdata('user')) { ?>

<div class="container-fluid">

    <a class="go-back justify-content-center align-items-center rounded p-4" href="<?= base_url() . 'admin'?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub admin </p>
    </a>

</div>

<section class="bg-recommend d-flex justify-content-center align-items-center" name="section-admin">

    <div class="container-fluid">

        <h1 class="title text-white text-center"> Mur des recommandations </h1>

        <form class="form-select-order">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-11 col-md-11 col-sm-11 my-3">
                    <div class="input-group mb-3">

                        <label for="selectOrder"></label>
                        <select class="custom-select select-order" name="selectOrder" id="selectOrder">
                            <option selected> Ordre par ID </option>
                            <option value="1"> Ordre aléatoire </option>
                            <option value="2"> Seulement en attente </option>
                            <option value="3"> Seulement validé </option>
                        </select>

                    </div>
                </div>
            </div>
        </form>
        <div class="search-false row justify-content-center align-items-center">

            <?php
            foreach ($recommendations as $recommendation) { ?>
            <div class="col-xl-5 col-lg-11 col-md-11 col-sm-11 my-3">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-2 p-0 pl-2">
                                <h1 class="text text-left"> <?= '#' . $recommendation->id ?> </h1>
                            </div>
                            <div class="col-8 text-center">
                                <h1 class="text text-center"> <?= 'Avis de  ' . $recommendation->first_name . ' ' . $recommendation->name ?> </h1>
                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">

                            <div class="col-8 text-center">
                                <button class="btn btn-dark text m-2" data-toggle="modal" data-target="#modalMessage">
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
                    </div>

                    <div class="card-footer text text-muted text-center">
                        <?= 'Le ' . $recommendation->date_created ?>
                    </div>

                </div>

                <!-- Modal Message -->
                <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
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

        </div>

        <div class="search-true row justify-content-around my-5 align-items-center">

            <!-- EMPLACEMENT POUR LE CHARGEMENT DE LA VUE DE TRI (admin_recommend_search) -->

        </div>

    </div>

</section>

<?php } else {

    header('Location: ../admin');
    exit();
}
?>