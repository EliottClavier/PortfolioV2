<div class="container">

    <a class="go-back justify-content-center align-items-center rounded p-3" href="<?= base_url() . 'admin'?>">
        <i class="fas fa-arrow-left"></i>
        <p class="sub-title text-white ml-2 mb-0"> Revenir au hub admin </p>
    </a>
    
</div>
<section class="bg-sky d-flex align-items-center justify-content-center" id="page-top">

    <div class="container">

        <h1 class="title text-white text-center"> Mur des recommendations </h1>

        <div class="row justify-content-around my-5 align-items-center">

            <?php foreach ($recommendations as $recommendation) { ?>
            <div class="col-xl-6 my-3">

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-3">
                            <h1 class="sub-title text-left"> <?= '#' . $recommendation->id ?> </h1>
                            </div>
                            <div class="col-6">
                            <h1 class="sub-title text-center"> <?= 'Avis de  ' . $recommendation->first_name . ' ' . $recommendation->name ?> </h1>
                            </div>
                        </div>

                        <p class="sub-title text-center">  <?= 'Ayant collaboré du ' . $recommendation->date_start . ' au ' . $recommendation->date_end ?> </p>
                    </div>

                    <div class="card-body">
                        <p class="card-text text-justify"> <?= $recommendation->message_text ?> </p>
                    </div>

                    <div class="card-footer text-muted text-center">
                        <?= 'Le ' . $recommendation->date_created ?>
                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>

</section>