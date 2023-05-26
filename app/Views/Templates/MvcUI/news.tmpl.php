<?php

use SYRADEV\app\ReplicateController;
?>

<div>
    <img src="<?= ReplicateController::assets('/imgs/banner.png'); ?>" alt="Banner RPLC News" class="flex flex-col justify-center w-full" />
</div>
<div class="container mx-auto py-8">
        <h1 class="text-4xl text-white">Liste des articles</h1>
        <div class="mt-8">
            <?php foreach ($articles as $article) : ?>
                <div class="bg-white p-4 rounded shadow mb-4">
                    <h2 class="text-2xl font-bold text-indigo-800"><?= $article['name'] ?></h2>
                    <p class="text-black"><?= $article['content'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
