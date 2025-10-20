<?php $session = session();?>
<?php
$error = (!empty($validation)?$validation:''); 
?>
<?php if ($session->getFlashdata('message')) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $session->getFlashdata('message') ?>
</div>
<?php } ?>
<?php if ($session->getFlashdata('exception')) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $session->getFlashdata('exception') ?>
</div>
<?php } ?>
<?php if ($error) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $error->listErrors(); ?>
</div>
<?php } ?>

