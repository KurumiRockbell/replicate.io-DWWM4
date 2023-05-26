<?php
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