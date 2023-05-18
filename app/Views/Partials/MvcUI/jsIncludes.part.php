<?php
/**
 * MvcUI Inclusion de fichiers JS additionnels
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

if (ReplicateController::isRoute('productslist', true)) {
    echo '<script src="'. ReplicateController::assets('/js/infinite-scroll.pkgd.min.js').'"></script>';
    echo '<script src="'. ReplicateController::assets('/js/products-scroll.min.js').'"></script>';
}

if (ReplicateController::isRoute('ajaxpagination', true)) {
    echo '<script src="'. ReplicateController::assets('/js/clients-ajax.min.js').'"></script>';
}

if (ReplicateController::isRoute('productsbycategory', true)) {
    echo '<script src="'. ReplicateController::assets('/js/isotope.pkgd.min.js').'"></script>';
    echo '<script src="'. ReplicateController::assets('/js/isotope.min.js').'"></script>';
}