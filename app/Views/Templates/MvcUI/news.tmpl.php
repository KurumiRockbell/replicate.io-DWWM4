<?php

use SYRADEV\app\ReplicateController;
?>

<div>
    <img src="<?= ReplicateController::assets('/imgs/banner.png'); ?>" alt="Banner RPLC News" class="flex flex-col justify-center w-full" />
</div>
<div class="mx-auto py-8">
    <h1 class="text-4xl text-white">Liste des articles</h1>
    <div class="mt-8">
        <div class="text-teal-50 text-justify pt-3 flex-col flex items-center w-full">
            <div class="grid grid-cols-1">
            </div>
            <div class="grid grid-cols-1">
                <div class="col mx-3 my-3">
                    <table class="table table-striped table-condensed">
                        <?php foreach ($data['news'] as $news) {
                            extract($news);
                        ?>
                            <tr>
                                <td class="align-middle text-teal-50"><?= $id; ?></td>
                                <td class="align-middle text-teal-50"><?= $name; ?></td>
                                <td class="align-middle text-teal-50"><?= $description; ?></td>
                                <td class="align-middle text-teal-50"><?= $content; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>