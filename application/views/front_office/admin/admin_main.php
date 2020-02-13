<section class="bg-sky d-flex align-items-center justify-content-center" id="page-top">

    <?php if(!$this->session->userdata('user')) { ?>

        <div class="container">

            <form class="form-admin-login">

                <div class="row form-group justify-content-center">

                    <div class="col-7 m-2">

                        <div>

                            <label class="invisible" for="loginID"></label>
                            <input type="text" class="form-admin" name="loginID" id="loginID" placeholder="Identifiant" >
                            <p class="field-error-admin" data-field="loginID"></p>
                        </div>

                    </div>

                </div>


                <div class="row form-group justify-content-center">

                    <div class="col-7 m-2">

                        <div>

                            <label class="invisible" for="loginPassword"></label>
                            <input type="password" class="form-admin" name="loginPassword" id="loginPassword" placeholder="Mot de passe" >
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

                    <div class="col-7 m-2">

                        <button type="button" class="btn btn-dark btn-lg btn-admin-login"> Connexion </button>

                    </div>

                </div>


            </form>

        </div>

    <?php } ?>

    <?php if($this->session->userdata('user')) { ?>

    <a class="shut-down btn justify-content-center align-items-center rounded" href="<?= base_url() . 'admin/logout' ?>">
        <i class="fas fa-power-off"></i>
    </a>

    <?php } ?>

</section>