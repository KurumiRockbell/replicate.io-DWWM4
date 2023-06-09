<?php
use SYRADEV\app\ReplicateController;

/** @var $params */
extract($params);
?>
<div class="w-100 mt-3 mb-3 d-flex justify-content-<?= $align; ?>">
    <nav aria-label="Pagination d-flex flex-row-reverse">
        <ul class="pagination pagination-sm flex-wrap">
            <?php
            $prevDisabled = $numpage <= 1 ? ' disabled' : '';
            $prevLink = ReplicateController::getRoute($route) . '/' . ($numpage - 1);
            ?>
            <li class="page-item<?= $prevDisabled; ?>">
                <a class="page-link" href="<?= $prevLink; ?>">Pr&eacute;c&eacute;dent</a>
            </li>
            <?php
            for ($i = 1; $i <= $maxpage; $i++) {
                $active = $i === $numpage ? ' active' : '';
                ?>
                <li class="page-item">
                    <a class="page-link<?= $active; ?>"
                       href="<?= ReplicateController::getRoute($route) . '/' . $i; ?>"><?= $i; ?></a>
                </li>
            <?php }
            $nextDisabled = $numpage >= $maxpage ? ' disabled' : '';
            $nextLink = ReplicateController::getRoute($route) . '/' . ($numpage + 1);
            ?>
            <li class="page-item<?= $nextDisabled; ?>">
                <?php ?>
                <a class="page-link" href="<?= $nextLink; ?>">Suivant</a>
            </li>
        </ul>
    </nav>
</div>