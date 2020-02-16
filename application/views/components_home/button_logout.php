<?php if($this->session->userdata('user')) { ?>
    <div class="container-fluid">
        <a class="shut-down btn justify-content-center align-items-center rounded" href="<?= base_url() . 'admin/logout' ?>">
            <i class="fas fa-power-off"></i>
        </a>
    </div>
<?php } ?>