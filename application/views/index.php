<section class="section-main d-flex align-items-center justify-content-center" id="page-top">
    <div class="container-fluid animsition mx-3">
        <div class="row">
            <div class="col-12 text-center text-white">

                <h1 class="main-title mx-xl-5 pb-3 pb-xl-5">
                    Eliott Clavier
                </h1>

                <h2 class="main-sub-title mx-xl-5 pt-3 pt-xl-5">
                    Étudiant DEV/OPS à Campus Academy Nantes.
                    Recherche un stage dans le domaine du développement pour septembre 2020.
                </h2>

            </div>
        </div>
    </div>
</section>


<section class="bg-white-modern d-flex align-items-center" id="page-about-me">

    <div class="container-fluid animsition" id="content-about-me">

        <div class="row align-items-center justify-content-around">

            <div class="col-xl-5 col-lg-12 col-md-12 col-12-sm mb-3 mb-xl-0 mb-lg-0 text-center">
                <img class="rounded-circle mb-3" id="profile-img" src="assets/images/Photo_modif.png" alt="Photo de présentation"/>
                <form method="get" action="assets/CV.pdf">
                    <button type="submit" class="btn btn-flame btn-xl">
                         Télécharger mon CV
                    </button>
                </form>
            </div>

            <div class="col-xl-6 col-lg-10 col-md-10 col-10-sm m-md-3 m-sm-3 px-xl-5 px-lg-5 border-flame-left" style="">
                <h1 class="title text-center"> Qui suis-je ? </h1>
                <p class="sub-title text-justify">
                    Récemment diplômé d’un Baccalauréat Scientifique, je suis, depuis septembre 2019, étudiant dans l’école Campus Academy Nantes. C’est dans le cadre d’un projet d’école visant à mettre en œuvre et améliorer mes compétences que ce portfolio professionnel
                    a vu le jour. Ce site a donc pour principal but de me présenter mais aussi de pouvoir prouver ma compétence et ma motivation. Afin de découvrir mon profil, je vous invite donc à visiter mon site, mon profil Linkedin ou bien
                    mon CV à votre disposition.
                </p>
                <h1 class="title text-center"> Bonne visite ! </h1>
            </div>

        </div>

    </div>

</section>

<section class="bg-sun d-flex align-items-center justify-content-center" id="page-projects">

    <div class="container-fluid animsition" id="content-project">

        <h1 class="title text-center text-white mb-5"> Un de mes divers projets ... </h1>

        <div class="row justify-content-center align-items-center text-white">
            <?php

            if (!(isset($random_project))) { ?>

                <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 ">

                        <h1 class="title text-center"> Rien à afficher ici ! </h1>

                </div>

            <?php } else { ?>

                <div class="col-xl-4 col-lg-10 col-md-10 col-sm-10 ">

                        <h1 class="sub-title text-center"> <?= $random_project->name ?> </h1>
                        <p class="text text-justify"> <?= $random_project->description ?> </p>

                </div>

                <span class="col-xl-1"> </span>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 px-3">
                    <img class="img-fluid" src="<?= $random_project->associated_image_url ?>" alt="Illustration <?= $random_project->name ?>">
                </div>

            <?php } ?>

        </div>

        <div class="row justify-content-center align-items-center">

            <div class="col-6-xl col-lg-10 col-md-10 col-10-sm mt-5 text-center">

                <h1 class="sub-title text-white"> Et pourquoi ne pas découvrir mes projets ? </h1>

                <a href="<?= base_url() . 'project' ?>" class="btn btn-xl btn-white m-3 animsition-link"> C'est parti !</a>

            </div>

        </div>

    </div>

</section>


<section class="bg-white-modern d-flex align-items-center justify-content-center" id="page-skills">

    <div class="container-fluid animsition" id="content-skills">

            <h1 class="title text-center"> Mes compétences </h1>

            <div class="row justify-content-center align-items-center">
                <?php if (!(isset($languages))) { ?>

                    <h1 class="title text-center"> Rien à afficher ici ! </h1>

                <?php } ?>
            </div>

            <div class="row justify-content-center align-items-center">
                <h3 class="sub-title text-center"> Languages de programmations et frameworks </h3>
            </div>

            <div class="row justify-content-center align-items-center">

                <?php foreach ($languages as $language) { ?>

                    <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 m-3">

                        <div class="progress" style="background-color: <?= $language->associated_color . 'CC'?>;">
                            <div class="progress-bar" style="background-color: <?= $language->associated_color ?>;" data-width="<?= $language->advancement?>">
                                <h1 class="sub-title m-0">  <?= $language->name ?> </h1>
                            </div>
                        </div>

                    </div>

                <?php } ?>
            </div>

        <div class="row justify-content-center align-items-center">
            <h3 class="sub-title text-center"> Environnements de travail et outils </h3>
        </div>

        <div class="row justify-content-center align-items-center">

            <?php foreach ($tools as $tool) { ?>

                <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 m-3">

                    <div class="progress" style="background-color: <?= $tool->associated_color . 'CC'?>;">
                        <div class="progress-bar" style="background-color: <?= $tool->associated_color ?>;" data-width="<?= $tool->advancement?>">
                            <h1 class="sub-title m-0">  <?= $tool->name ?> </h1>
                        </div>
                    </div>

                </div>

            <?php } ?>
        </div>

        </div>

</section>



<section class="bg-sky d-flex align-items-center justify-content-center" id="page-timeline">

    <div class="container-fluid animsition" id="content-timeline">

        <div class="row">

            <div class="col-12">

                <h1 class="title text-white text-center"> Ma formation et ... </h1>

            </div>

        </div>

        <div class="row justify-content-center align-items-center">

            <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 m-3">

                TEST

            </div>

            <span class="col-xl-1"></span>

            <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 m-3">

                TEST

            </div>

        </div>

        <h1 class="title text-white text-center"> ... mes expériences profesionnelles </h1>

        <div class="row justify-content-center align-items-center">

            <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 m-3">

                TEST

            </div>

            <span class="col-xl-1"></span>

            <div class="col-xl-5 col-lg-10 col-md-10 col-sm-10 m-3">

                TEST

            </div>

        </div>

    </div>


</section>


<section class="bg-white-modern d-flex align-items-center" id="page-contact-recommend">

    <div class="container-fluid animsition" id="content-contact-recommend">

        <div class="row justify-content-center align-items-center">

            <div class="col-xl-5 col-lg-10 col-md-10 col-10-sm">

                <h1 class="sub-title text-center mb-3"> Comment me contacter ? </h1>

                <p class="sub-title text-justify">
                    Afin de me contacter, vous pouvez remplir le formulaire ci-dessous. Votre message me sera alors transmis et
                    la réponse envoyée dans les plus brefs délais. Vous avez également à votre disposition mes autres moyens de contacts dans le menu latéral.
                </p>

                <div class="text-center">

                    <button type="button" class="btn btn-xl btn-flame m-4" data-toggle="modal" data-target="#modalContact">
                        Me contacter
                    </button>

                </div>
                <!-- Modal -->

                <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <form class="form-contact">

                                <div class="modal-body justify-content-center">

                                    <div class="row justify-content-center">

                                        <div class="col-11">
                                            <label class="invisible" for="contactName"></label>
                                            <input type="text" class="form-custom" name="contactName" id="contactName" placeholder="Votre nom *" >
                                            <p class="field-error" data-field="contactName"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="contactFirstName"></label>
                                            <input type="text" class="form-custom" name="contactFirstName" id="contactFirstName" placeholder="Votre prénom *">
                                            <p class="field-error" data-field="contactFirstName"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="contactCompanyName"></label>
                                            <input type="text" class="form-custom" name="contactCompanyName" id="contactCompanyName" placeholder="Votre nom d'entreprise *">
                                            <p class="field-error" data-field="contactCompanyName"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="contactEmail"></label>
                                            <input type="email" class="form-custom" name="contactEmail" id="contactEmail" placeholder="Votre email *">
                                            <p class="field-error" data-field="contactEmail"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="contactObject"></label>
                                            <input class="form-custom" name="contactObject" id="contactObject" placeholder="Objet de votre message *" style="resize: none;">
                                            <p class="field-error" data-field="contactObject"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="contactText"></label>
                                            <textarea class="form-custom h-75" name="contactText" id="contactText" placeholder="Votre message *"></textarea>
                                            <p class="field-error" data-field="contactText"></p>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <p class="text text-muted"> * Obligatoire </p>
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal"> Annuler </button>
                                    <button type="button" class="btn btn-flame btn-contact-send" data-target="#modalContact"> Envoyer </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <span class="col-xl-1 my-2 text-center"></span>

            <div class="col-xl-5 col-lg-10 col-md-10 col-10-sm">

                <h1 class="sub-title text-center mb-3"> Pourquoi me recommander ? </h1>

                <p class="sub-title text-justify">
                    Afin d'assurer une légitimité dans mes réalisations personnelles ou au sein d'une équipe,
                    toute recommandation sur mon profil m'est précieuse. Si vous souhaitez me recommander, veuillez remplir le formulaire ci-dessous.
                </p>

                <div class="text-center">

                    <button type="button" class="btn btn-xl btn-flame m-4" data-toggle="modal" data-target="#modalRecommend">
                        Me recommander
                    </button>

                </div>

                <!-- Modal -->

                <div class="modal fade" id="modalRecommend" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <form class="form-recommend">

                                <div class="modal-body justify-content-center">

                                    <div class="row justify-content-center">

                                        <div class="col-11">
                                            <label class="invisible" for="recommendName"></label>
                                            <input type="text" class="form-custom" name="recommendName" id="recommendName" placeholder="Votre nom *" >
                                            <p class="field-error" data-field="recommendName"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="recommendFirstName"></label>
                                            <input type="text" class="form-custom" name="recommendFirstName" id="recommendFirstName" placeholder="Votre prénom *">
                                            <p class="field-error" data-field="recommendFirstName"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="recommendCompanyName"></label>
                                            <input type="text" class="form-custom" name="recommendCompanyName" id="recommendCompanyName" placeholder="Votre nom d'entreprise *">
                                            <p class="field-error" data-field="recommendCompanyName"></p>
                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="recommendEmail"></label>
                                            <input type="email" class="form-custom" name="recommendEmail" id="recommendEmail" placeholder="Votre email *">
                                            <p class="field-error" data-field="recommendEmail"></p>
                                        </div>

                                        <div class="col-11">

                                            <h1 class="text text-center mt-4">
                                                Période de collaboration <br/> (Début / Fin) *
                                            </h1>

                                            <div class="row justify-content-center">

                                                <div class="col-5">
                                                    <label class="invisible" for="recommendStart"></label>
                                                    <input type="date" class="form-custom" name="recommendStart" id="recommendStart">
                                                    <p class="field-error" data-field="recommendStart"></p>
                                                </div>

                                                <div class="col-5">
                                                    <label class="invisible" for="recommendEnd"></label>
                                                    <input type="date" class="form-custom" name="recommendEnd" id="recommendEnd">
                                                    <p class="field-error" data-field="recommendEnd"></p>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-11">
                                            <label class="invisible" for="recommendText"></label>
                                            <textarea class="form-custom h-75" name="recommendText" id="recommendText" placeholder="Votre message *"></textarea>
                                            <p class="field-error" data-field="recommendText"></p>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <span class="text text-muted"> * Obligatoire </span>
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal"> Annuler </button>
                                    <button type="button" class="btn btn-flame btn-recommend-send" data-target="#modalRecommend"> Envoyer </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row justify-content-center align-items-center">

            <div class="col-6-xl col-lg-10 col-md-10 col-10-sm mt-5 text-center">

                <h1 class="sub-title"> Un coup d'oeil sur mes recommendations ? </h1>

                <a href="<?= base_url() . 'recommend' ?>" class="btn btn-xl btn-flame m-3 animsition-link"> C'est parti !</a>

            </div>

        </div>

    </div>

</section>

