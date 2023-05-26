<?php
use SYRADEV\app\ReplicateController;

/**
 * @var string $data
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erreur 404</title>
    <link rel="icon" type="image/svg+xml" href="<?= ReplicateController::assets('/imgs/favicon.svg'); ?>">
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/animate.min.css'); ?>">
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/errors.min.css'); ?>">
</head>
<body oncontextmenu="return false;">
<div id="mainError" class="d-flex align-items-center <?= $data; ?>">
    {{ pageContent }}
</div>
</body>
</html>
