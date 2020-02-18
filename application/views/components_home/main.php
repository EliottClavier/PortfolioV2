<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('components_home/head', $css) ?>

<body class="landing-page">

<?php if (strpos($subview, 'admin')) {
    $this->load->view('components_home/button_logout');
} elseif ($subview === 'index') {
    $this->load->view('components_home/sidebar');
} else {
    $this->load->view('components_home/header');
} ?>

<?php $this->load->view($subview) ?>

<?php $this->load->view('components_home/footer'); ?>

<?php $this->load->view('components_home/script_js', $js) ?>

</body>
</html>