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
            <img src="<?= ReplicateController::assets('/imgs/401.png'); ?> " alt="Orbital station artwork RPLC" width="600">
  <h1 class="text-5xl font-bold text-lime-400">Oh! 401 - You don't have the permission</h1>
  You can't access at this page.<br> But you can return on our 
        <a href="<?= ReplicateController::getRoute('home'); ?>" title="Retourner &agrave; la page d'accueil" class="text-indigo-800">home page</a> <br>or alson return on<a
            href="javascript:history.go(-1);" title="Revenir &agrave; la page pr&eacute;c&eacute;dente" class="text-lime-400">previews page</a></p>
</div>

    </div>
</body>
