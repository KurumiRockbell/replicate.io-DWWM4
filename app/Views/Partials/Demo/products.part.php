<?php
use SYRADEV\app\ReplicateController;

/**
 * @var array $params
 */

foreach ($params as $product) {
    extract($product);
    ?>
    <div class="col produit animated fadeInLeft">
        <div class="card">
            <img src="<?= ReplicateController::assets('/imgs/product.svg'); ?>"
                 style="display:block; margin: auto; filter: hue-rotate(<?= ReplicateController::huerotate(); ?>);"
                 class="card-img-top w-25"
                 alt="<?= $ProductName; ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $ProductID . ': ' . $ProductName; ?></h5>
                <h6 class="card-text">
                    <?= $QuantityPerUnit; ?><br>
                    <span class="badge badge-lg bg-success"><?= ReplicateController::formalizeEuro($UnitPrice); ?></span>
                </h6>
            </div>
        </div>
    </div>
<?php } ?>
