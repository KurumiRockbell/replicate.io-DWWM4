<?php
/**
 *  MvcUI Layout principal du frontend
 *
 * Application MvcUI
 *
 * @package    MvcUI
 * @author     Regis TEDONE
 * @email      syradev@proton.me
 * @copyright  Syradev 2023
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GNU General Public License
 * @version    1.4.0
 */

use Syradev\app\ReplicateController;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= ReplicateController::getCSRFToken(); ?>">
    <title>{{ pageTitle }}</title>
    <link rel="icon" type="image/svg+xml" href="<?= ReplicateController::assets('/imgs/favicon.png'); ?>">
    <?php require_once ReplicateController::partial('/MvcUI/cssIncludes.part.php'); ?>
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/output.css'); ?> ">
</head>
<body oncontextmenu="return false;" class="bg-black">
<div class="container-fluid">
    <div class="row flex-nowrap mx-2 my-2">
        <main id="mvcMain" class="col ps-md-2 pt-1">
            <div class="row">
                <div class="col">
                    <?php
                        $header = [
                            'logo' => '/imgs/rplc_header_logo.svg',
                            'title' => 'Replicate'
                        ];
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
                    <?php require_once ReplicateController::partial('/MvcUI/footer.part.php'); ?>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="<?= ReplicateController::assets('/js/docready.min.js'); ?>"></script>
<script src="<?= ReplicateController::assets('/js/mvcui.min.js'); ?>"></script>
<?php require_once ReplicateController::partial('/MvcUI/jsIncludes.part.php'); ?>
</body>
</html>