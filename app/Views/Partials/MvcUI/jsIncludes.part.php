<?php

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
