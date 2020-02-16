<section class="bg-sky d-flex align-items-center justify-content-center" name="section-admin">

    <?php if(!$this->session->userdata('user')) { ?>

        <div class="container">

            <div class="row justify-content-center text-white">

                <p class="title"> Panel Administratif </p>

            </div>

            <form class="form-admin-login">

                <div class="row justify-content-center">

                    <div class="col-xs-11 col-sm-10 col-md-8 col-lg-7 mt-2">

                        <div>
                            <label class="invisible" for="loginID"></label>
                            <input type="text" class="form-admin" name="loginID" id="loginID" placeholder="Identifiant">
                            <p class="field-error-admin" data-field="loginID"></p>
                        </div>

                    </div>

                </div>


                <div class="row justify-content-center">

                    <div class="col-xs-11 col-sm-10 col-md-8 col-lg-7 mt-2">

                        <div>

                            <label class="invisible" for="loginPassword"></label>
                            <input type="password" class="form-admin" name="loginPassword" id="loginPassword" placeholder="Mot de passe">
                            <p class="field-error-admin" data-field="loginPassword"></p>

                        </div>

                    </div>

                </div>

                <div class="row form-group justify-content-center">

                    <div class="col-8 m-2">

                        <p class="field-error-admin-match text-center" data-field="loginMatch"></p>

                    </div>

                </div>

                <div class="row form-group text-center justify-content-center">

                    <div class="col-xl-7">

                        <a class="btn btn-outline-dark btn-lg m-2"  href="<?= base_url() ?>">
                            Retour à l'accueil
                        </a>

                        <button type="button" class="btn btn-dark btn-lg btn-admin-login"> Connexion </button>

                    </div>



                </div>


            </form>

        </div>

    <?php } ?>

    <?php if($this->session->userdata('user')) { ?>


    <div class="container-fluid m-3">
        <div class="row text-center justify-content-center align-items-center">

            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 my-3">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="card-title sub-title">
                           Modifications du compte <?= $this->session->userdata('user') ?>
                        </h1>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <button class="btn btn-dark btn-update-user-id text m-2" data-toggle="modal" data-target="#modalUpdateUserName">
                                Changer son identifiant
                            </button>
                            <button class="btn btn-dark btn-update-user-password text m-2" data-toggle="modal" data-target="#modalUpdateUserPassword">
                                Changer son mot de passe
                            </button>
                        </div>
                        <div class="row justify-content-center">
                            <a class="btn btn-primary btn-lg text"  href="<?= base_url() ?>">
                                Retour vers l'acceuil
                            </a>
                        </div>
                    </div>

                    <div class="card-footer">
                        <p class="text text-dark"> <?= 'Dernière connexion le ' . $this->session->userdata('lastConnection') ?> </p>
                    </div>
                </div>

                <!-- Modal Identifiant -->
                <div class="modal fade" id="modalUpdateUserName" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <form class="form-update-user-name">

                                <div class="modal-body justify-content-center">

                                    <div class="row justify-content-center">

                                        <div class="col-11">
                                            <h1 class="form-custom text"> <?= 'Identifiant actuel : ' . $this->session->userdata('user')?> </h1>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="userName"></label>
                                            <input type="text" class="form-custom" name="userName" id="userName" placeholder="Nouvel identifiant" >
                                            <p class="field-error-admin text-danger mt-3" data-field="userName"></p>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal"> Annuler </button>
                                    <button type="button" class="btn btn-primary btn-update-user-name-send" data-target="#modalUpdateUserName"> Modifier </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <!-- Modal Mot de passe -->
                <div class="modal fade" id="modalUpdateUserPassword" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <form class="form-update-user-password">

                                <div class="modal-body justify-content-center">

                                    <div class="row justify-content-center">

                                        <div class="col-11">
                                            <label class="invisible" for="userPassword"></label>
                                            <input type="password" class="form-custom" name="userPassword" id="userPassword" placeholder="Nouveau mot de passe">
                                            <p class="field-error-admin text-danger mt-3" data-field="userPassword"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="userPasswordConfirm"></label>
                                            <input type="password" class="form-custom" name="userPasswordConfirm" id="userPasswordConfirm" placeholder="Confirmation du nouveau mot de passe">
                                            <p class="field-error-admin text-danger mt-3" data-field="userPasswordConfirm"></p>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal"> Annuler </button>
                                    <button type="button" class="btn btn-primary btn-update-user-password-send" data-target="#modalUpdateUserPassword"> Modifier </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="row text-center justify-content-center align-items-center">
            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 my-3">
                <div class="card p-3">

                    <div class="card-header">
                        <h1 class="card-title sub-title">
                            Mur des recommandations
                        </h1>
                    </div>

                    <div class="card-body">

                        <p class="text card-text"> <span class="badge badge-danger"> <?= $pending->total ?> </span> recommendations en attentes </p>
                        <p class="text card-text"> <span class="badge badge-primary"> <?= $verified->total ?> </span> recommendations visibles </p>
                        <a href="<?= base_url() . 'admin/recommend' ?>" class="btn btn-dark text"> Panneau d'activation des recommandations </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 my-3">
                <div class="card p-3">
                    <div class="card-header">
                        <h1 class="card-title sub-title">
                            Section projet
                        </h1>
                    </div>

                    <div class="card-body">

                        <p class="text card-text"> <span class="badge badge-secondary"> 5 </span> projets sont actuellement affichés sur le site </p>
                        <a href="<?= base_url() . 'admin/project' ?>" class="btn btn-dark text"> Panneau de modification des projets </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>

</section>