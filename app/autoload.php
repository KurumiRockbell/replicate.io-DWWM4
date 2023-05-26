<?php
require_once __DIR__ . '/Classes/ReplicateController.php';
require_once __DIR__ . '/Classes/PdoMySQL.php';
require_once __DIR__ . '/Classes/PdoDebug.php';
require_once __DIR__ . '/Classes/DemoController.php';
require_once __DIR__ . '/Classes/UsersController.php';
require_once __DIR__ . '/Models/UserModel.php';

use SYRADEV\app\ReplicateController;
$mvcUI = ReplicateController::getInstance();
$mvcUI->cacheRoutes();
