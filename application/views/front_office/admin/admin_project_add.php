<?php if($this->session->userdata('user')) { ?>

<div class="container-fluid">

    <a class="go-back justify-content-center align-items-center rounded p-4" href="<?= base_url() . 'admin/project'?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Retour à la section projet </p>
    </a>

</div>

<section class="bg-sky d-flex align-items-center justify-content-center" id="page-top" name="section-admin">

    <div class="container-fluid m-2">

        <h1 class="title text-white text-center"> Créer un projet </h1>

        <form class="form-add-project">

            <div class="row justify-content-center">

                <div class="col-8 mt-2">

                    <label class="invisible" for="addProjectName"></label>
                    <input type="text" class="form-admin" name="addProjectName" id="addProjectName" placeholder="Nom du nouveau projet *">
                    <p class="field-error-admin" data-field="addProjectName"></p>

                </div>


                <div class="col-8 mt-2">

                    <label class="invisible" for="addProjectDesc"></label>
                    <textarea type="text" class="form-admin h-75" name="addProjectDesc" id="addProjectDesc" placeholder="Description du projet *"></textarea>
                    <p class="field-error-admin" data-field="addProjectDesc"></p>

                </div>

                <div class="col-8 mt-2">

                    <label class="invisible" for="addProjectURL"></label>
                    <input type="text" class="form-admin" name="addProjectURL" id="addProjectURL" placeholder="URL menant au projet">
                    <p class="field-error-admin" data-field="addProjectURL"></p>

                </div>

                <div class="col-8 mt-2">

                    <label class="invisible" for="addProjectImagePath"></label>
                    <textarea type="text" class="form-admin" name="addProjectImagePath" id="addProjectImagePath" placeholder="Chemin d'accès à l'image associée au projet *"></textarea>
                    <p class="field-error-admin" data-field="addProjectImagePath"></p>

                </div>

                <div class="col-8 mt-2">
                    <label class="invisible" for="addProjectStatus"></label>
                    <select class="custom-select" name="addProjectStatus" id="addProjectStatus">
                        <option value="offline" selected> Hors ligne </option>
                        <option value="progress"> En cours </option>
                        <option value="completed"> Achevé </option>
                    </select>
                    <p class="field-error" data-field="addProjectStatus"></p>
                </div>

            </div>

            <div class="row form-group text-center justify-content-center">
                <div class="col-5">
                    <button type="button" class="btn btn-dark btn-xl btn-add-project"> Créer </button>
                </div>
            </div>

        </form>

    </div>

</section>

<?php } else {

    header('Location: ../admin');
    exit();
}
?>
