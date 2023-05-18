<?php
use SYRADEV\app\ReplicateController;
?>

<head>
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/output.css'); ?> ">
</head>
<body class="bg-black text-teal-50">
    <div id="messageError" class="text-center px-5 py-5 animate-fadeIn">
        <a href="<?= ReplicateController::getRoute('home'); ?>" title="Page d'accueil">
            <img id="mvclogo" src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?> " alt="Application MVC">
        </a>
        <div class="flex flex-col items-center justify-center h-3/4">
            <img src="<?= ReplicateController::assets('/imgs/404.png'); ?> " alt="Orbital station artwork RPLC" width="300">
  <h1 class="text-5xl font-bold">Oh no! 404 - Not found</h1>
  <p>This page, not exist. <br>Verify your URL <br> Or back on 
    <a href="<?= ReplicateController::getRoute('home'); ?>" title="Retourner à la page d'accueil" class="text-lime-400">home page</a> <br>or back on the
    <a href="javascript:history.go(-1);" title="Revenir à la page précédente" class="text-indigo-800">preview page</a>.
  </p>
</div>

    </div>
</body>