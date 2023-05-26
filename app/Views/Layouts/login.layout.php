<?php
use SYRADEV\app\ReplicateController;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= ReplicateController::getCSRFToken(); ?>">
    <meta http-equiv="refresh" content="3000">
    <title>Replicate login</title>
    <link rel="icon" type="image/svg+xml" href="<?= ReplicateController::assets('/imgs/favicon.png'); ?>">
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/output.css'); ?> ">
</head>

<body class="bg-black">
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="<?= ReplicateController::getRoute('home'); ?>" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-auto h-20 mr-2" src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?> " alt="logo" />
            </a>
            <div class="w-full bg-black rounded-xl shadow md:mt-0 sm:max-w-md xl:p-0 border-2 border-lime-400">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-lime-400 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <?php if (!ReplicateController::isConnected()) { ?>
                        <form class="space-y-4 md:space-y-6" action="#">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-lime-400">Your email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="" />
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-lime-400">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="" />
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 ">Remember me</label>
                                    </div>
                                </div>
                                <a href="#" class="text-sm font-medium text-lime-400 hover:underline">Forgot password?</a>
                            </div>
                            <button type="button" id="connect" class="w-full text-black bg-lime-400 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Sign in
                            </button>
                            <p class="text-sm font-light text-gray-500">
                                Don’t have an account yet?
                                <a href="<?= ReplicateController::getRoute('register'); ?>" class="font-medium text-primary-600 hover:underline ">Sign up</a>
                            </p>
                        </form>
                    <?php } else { ?>
                        <div class="text-center mt-4 mb-4">
                            <p>Vous êtes connecté : <span class="text-primary"><?= $_SESSION['admin']; ?></span></p>
                            <button type="button" data-id="disconnect" class="bg-indigo-800 text-white rounded-md px-4 py-2">
                                Logout
                            </button>
                            <a href="<?= ReplicateController::getRoute('home'); ?>" class="bg-lime-400 text-black rounded-md px-4 py-2 ml-2">
                                Enter
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= ReplicateController::assets('/js/docready.min.js'); ?>"></script>
    <script src="<?= ReplicateController::assets('/js/crypto-js.min.js'); ?>"></script>
    <script src="<?= ReplicateController::assets('/js/aesjson.min.js'); ?>"></script>
    <script src="<?= ReplicateController::assets('/js/login.min.js'); ?>"></script>
    <script src="<?= ReplicateController::assets('/src/node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>
</body>

</html>