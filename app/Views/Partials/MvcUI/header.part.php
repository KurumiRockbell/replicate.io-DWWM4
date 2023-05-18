<?php
/**
 * MvcUI Partiel de Header
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

use SYRADEV\app\ReplicateController;

/** @var $header ** */
extract($header);
?>

<header id="mvcheader" class="z-10 row p-2 mb-3 rounded-3 align-middle">
        <?php require_once ReplicateController::partial('/MvcUI/topmenu.part.php'); ?>
</header>
