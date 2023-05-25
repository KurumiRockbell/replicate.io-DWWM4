<?php
use SYRADEV\app\ReplicateController;

/** @var array $data */
?>
<div class="col mt-3 mb-3">
    Filtrer par catégorie&nbsp;:
    <div class="btn-group btn-group-sm flex-wrap filters">
        <a href="#" class="btn btn-outline-primary active" data-filter="*">Toutes</a>
        <?php
        foreach ($data['categories'] as $category) {
            ?>
            <a href="#" class="btn btn-outline-primary"
               data-filter=".<?= ReplicateController::sanitizeName($category); ?>"><?= $category; ?></a>
        <?php } ?>
    </div>
</div>