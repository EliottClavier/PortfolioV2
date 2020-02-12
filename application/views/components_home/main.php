<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('components_home/head', $css) ?>

<body class="landing-page">

<?php if ($subview === 'index') {
    // on load rien
} else {
    $this->load->view('components_home/header');
    $this->load->view('components_home/sidebar');
} ?>

<?php $this->load->view($subview) ?>


<?php $this->load->view('components_home/footer') ?>


<?php $this->load->view('components_home/script_js', $js) ?>

</body>
</html>
