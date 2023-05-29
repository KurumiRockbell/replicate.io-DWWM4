<?php

/**
 * MvcUI Inclusion de fichiers JS additionnels
 *
 * Application MvcUI
 *
 * @package    MvcUI
 * @author     Mehdi BENSOLTANE
 * @email      MEHDIB@proton.me
 * @copyright  MEHDIB 2023
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GNU General Public License
 * @version    1.4.0
 */

use SYRADEV\app\ReplicateController;

if (
    ReplicateController::isRoute('newuser')
    || ReplicateController::isRoute('edituser', true)
) {

    echo '<script src="' . ReplicateController::assets('/js/crypto-js.min.js') . '"></script>' . "\n"
        . '<script src="' . ReplicateController::assets('/js/aesjson.min.js') . '"></script>' . "\n"
        . '<script src="' . ReplicateController::assets('/js/users.min.js') . '"></script>';
}


if (ReplicateController::isRoute('deleteuser', true)) {

    echo '<script src="' . ReplicateController::assets('/js/users.min.js') . '"></script>';
}
if (ReplicateController::isRoute('register', true)) {

    echo '<script src="' . ReplicateController::assets('/js/aesjson.min.js') . '"></script>';
    echo '<script src="' . ReplicateController::assets('/js/crypto-js.min.js') . '"></script>';
    echo '<script src="' . ReplicateController::assets('/js/register.min.js') . '"></script>';
}
