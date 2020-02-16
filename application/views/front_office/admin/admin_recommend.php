<?php if($this->session->userdata('user')) { ?>

<div class="container-fluid">

    <a class="go-back justify-content-center align-items-center rounded p-4" href="<?= base_url() . 'admin'?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub admin </p>
    </a>

</div>

<section class="bg-recommend d-flex justify-content-center align-items-center" name="section-admin">

    <div class="container-fluid m-2">

        <h1 class="title text-white text-center"> Mur des recommandations </h1>

        <form class="form-select-order">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-11 col-md-11 col-sm-11 my-3">
                    <div class="input-group mb-3">

                        <label for="selectOrder"></label>
                        <select class="custom-select select-order" name="selectOrder" id="selectOrder">
                            <option selected> -- Mode de tri -- </option>
                            <option value="0"> Ordre par ID </option>
                            <option value="1"> Ordre aléatoire </option>
                            <option value="2"> Seulement en attente </option>
                            <option value="3"> Seulement validé </option>
                        </select>

                    </div>
                </div>
            </div>
        </form>
        <div class="search-false row justify-content-center align-items-center">

            <h1 class="sub-title text-white"> Veuillez choisir un mode de tri </h1>

        </div>

        <div class="search-true row justify-content-center my-5 align-items-center">

            <!-- EMPLACEMENT POUR LE CHARGEMENT DE LA VUE DE TRI (admin_recommend_search) -->

        </div>

    </div>

</section>

<?php } else {

    header('Location: ../admin');
    exit();
}
?>