<!-- Bouton de logout dans les pages admins  -->

<?php if($this->session->userdata('user')) { ?>
    <div class="container-fluid animsition">
        <a class="shut-down btn justify-content-center align-items-center rounded animsition-link" href="<?= base_url() . 'admin/logout' ?>">
            <i class="fas fa-power-off"></i>
        </a>
    </div>
<?php } ?>