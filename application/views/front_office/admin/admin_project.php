<?php if($this->session->userdata('user')) { ?>

<!-- Bouton de retour au hub admin -->
<div class="container-fluid animsition">

    <a class="go-back justify-content-center align-items-center rounded p-4 animsition-link" href="<?= base_url() . 'admin'?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub admin </p>
    </a>

</div>

<!-- Bouton vers le formulaire de creation de projet -->
<div class="container-fluid animsition">

    <a class="add-project justify-content-center align-items-center rounded animsition-link" href="<?= base_url() . 'admin/project-add'?>">
        <i class="fas fa-plus fa-sm"></i>
    </a>

</div>

<section class="bg-extern d-flex align-items-center justify-content-center" id="page-top" name="section-admin">

    <div class="container-fluid animsition m-2">

        <h1 class="title text-white text-center"> Section projets </h1>

        <form class="form-select-order">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-11 col-md-11 col-sm-11 my-3">
                    <div class="input-group mb-3">

                        <!-- Selection du mode de tri des projets -->
                        <label for="selectOrder"></label>
                        <select class="custom-select select-order" name="selectOrder" id="selectOrder">
                            <option selected> -- Mode de tri -- </option>
                            <option value="asc"> Ordre croissant </option>
                            <option value="desc"> Ordre décroissant </option>
                            <option value="random"> Ordre aléatoire </option>
                            <option value="progress"> Seulement en cours </option>
                            <option value="completed"> Seulement achevés </option>
                            <option value="offline"> Seulement hors ligne </option>
                        </select>

                    </div>
                </div>
            </div>
        </form>
        <div class="search-false row justify-content-center align-items-center">

            <h1 class="sub-title text-white"> Veuillez choisir un mode de tri </h1>

        </div>

        <div class="search-true row justify-content-center my-5 align-items-center">

            <!-- EMPLACEMENT POUR LE CHARGEMENT DE LA VUE DE TRI (admin_project_search) -->

        </div>

    </div>

</section>

<!-- Si l'utilisateur n'est pas connecté, il est redirigé vers la page principale du panel admin au il devra se connecter  -->
<?php } else {

    header('Location: ../admin');
    exit();
}
?>
