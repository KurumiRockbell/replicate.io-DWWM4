<?php
use Syradev\app\ReplicateController;
?>

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= ReplicateController::getCSRFToken(); ?>">
    <title>{{ pageTitle }}</title>
    <link rel="icon" type="image/svg+xml" href="<?= ReplicateController::assets('/imgs/favicon.png'); ?>">
    <?php require_once ReplicateController::partial('/MvcUI/cssIncludes.part.php'); ?>
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/output.css'); ?> ">
</head>
<body class="bg-black">

<!-- Conteneur principal -->
<div class="container-fluid">
    <div class="row flex-nowrap mx-2 my-2">

        <!-- Section principale -->
        <main id="mvcMain" class="col ps-md-2 pt-1">
            <div class="row">
                <div class="col">

                    <?php
                    // Définition des informations de l'en-tête
                    $header = [
                        'logo' => '/imgs/rplc_header_logo.svg',
                        'title' => 'Replicate'
                    ];
                    // Inclusion du fichier partiel pour l'en-tête
                    require_once ReplicateController::partial('/MvcUI/header.part.php');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ pageContent }}
                </div>
            </div>
            <div class="row" id="footer">
                <div class="col">
                    <?php
                    // Inclusion du fichier partiel pour le pied de page
                    require_once ReplicateController::partial('/MvcUI/footer.part.php');
                    ?>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Scripts JavaScript -->
<script src="<?= ReplicateController::assets('/js/docready.min.js'); ?>"></script>
<script src="<?= ReplicateController::assets('/js/mvcui.min.js'); ?>"></script>
<?php require_once ReplicateController::partial('/MvcUI/jsIncludes.part.php'); ?>

</body>
</html>
