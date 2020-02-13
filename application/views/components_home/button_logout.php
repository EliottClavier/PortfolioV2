<?php if($this->session->userdata('user')) { ?>

    <a class="shut-down btn justify-content-center align-items-center rounded" href="<?= base_url() . 'admin/logout' ?>">
        <i class="fas fa-power-off"></i>
    </a>

<?php } ?>