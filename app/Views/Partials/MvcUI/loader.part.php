<?php
 use SYRADEV\app\ReplicateController;
 extract($params);
?>
<img width="<?= $width; ?>" height="<?= $height; ?>" src="<?=ReplicateController::assets('/imgs/puff.svg') ;?>" alt="Chargement...">
