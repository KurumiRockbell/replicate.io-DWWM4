<?php
use SYRADEV\app\ReplicateController;

if (ReplicateController::isRoute('dashboard', true)) {
    echo '<link rel="stylesheet" href="'. ReplicateController::assets('/css/dashboard.min.css').'">';
}
