<?php
use SYRADEV\app\ReplicateController;

/** @var $header ** */
extract($header);
?>

<header id="mvcheader" class="z-10 row p-2 mb-3 rounded-3 align-middle">
        <?php require_once ReplicateController::partial('/MvcUI/topmenu.part.php'); ?>
</header>
