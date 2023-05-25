<?php
use SYRADEV\app\ReplicateController;

/**
 * @var $data
 */
extract($data);

/**
 * @var $appurl * Url à afficher dans l'iframe
 * @var $apptitle * Titre de l'application
 */
?>
<div class="container animated fadeIn">
    <button type="button" id="fullscreen" class="btn btn-primary text-white d-none d-sm-block">Plein écran</button>
    <div class="row">
        <div class="col">
            <iframe src="<?= $appurl; ?>" id="framed" referrerpolicy="strict-origin-when-cross-origin"
                    title="<?= $apptitle; ?>"></iframe>
        </div>
    </div>
</div>
