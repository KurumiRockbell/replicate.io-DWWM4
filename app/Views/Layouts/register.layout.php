<?php

/**
 *  MvcUI Layout Login
 *
 * Application MvcUI
 *
 * @package    MvcUI
 * @author     Regis TEDONE
 * @email      syradev@proton.me
 * @copyright  Syradev 2023
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GNU General Public License
 * @version    1.4.0
 */

use SYRADEV\app\ReplicateController;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= ReplicateController::getCSRFToken(); ?>">
    <meta http-equiv="refresh" content="3000">
    <title>MVCUi register</title>
    <link rel="icon" type="image/svg+xml" href="<?= ReplicateController::assets('/imgs/favicon.png'); ?>">
    <link rel="stylesheet" href="<?= ReplicateController::assets('/css/output.css'); ?> ">
</head>

<body class="bg-black">
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="<?= ReplicateController::getRoute('home'); ?>" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-auto h-20 mr-2" src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?>" alt="logo" />
            </a>
            <div class="w-full bg-black rounded-xl shadow md:mt-0 sm:max-w-md xl:p-0 border-2 border-indigo-800">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-indigo-800 md:text-2xl">
                        Register to Replicate.io
                    </h1>
                    <?php if (!ReplicateController::isConnected()) { ?>
                        <form class="space-y-4 md:space-y-6" action="#">
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-indigo-800">Your username :</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="ExempleUsername" required="" />
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-indigo-800">Your email :</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="" />
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-indigo-800">Password :</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="" />
                            </div>
                            <div>
                                <label for="dateofbirth" class="block mb-2 text-sm font-medium text-indigo-800">Date of birth :</label>
                                <div class="relative max-w-sm z-50">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" />
                                </div>
                            </div>

                            <label for="countries" class="block mb-2 text-sm font-medium text-indigo-800">Select your country :</label>
                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>France</option>
                                <option>Germany</option>
                                <option>England</option>
                                <option>Algeria</option>
                                <option>Belgium</option>
                                <option>India</option>
                                <option>Spain</option>
                            </select>

                            <label for="gender" class="block mb-2 text-sm font-medium text-indigo-800">Select your gender :</label>
                            <select id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Men</option>
                                <option>Women</option>
                            </select>

                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="" />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the
                                        <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <button type="button" id="first-connect" class="w-full text-bleck bg-indigo-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Create an account
                            </button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Already have an account?
                                <a href="<?= ReplicateController::getRoute('login'); ?>" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                            </p>
                        </form>
                    <?php } else { ?>
                        <div class="text-center mt-4 mb-4">
                            <p>Vous êtes deja connecté a un compte : <span class="text-lime-400"><?= $_SESSION['admin']; ?></span></p>
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
    <script src="<?= ReplicateController::assets('/src/node_modules/flowbite/dist/datepicker.js'); ?>"></script>
    <script src="<?= ReplicateController::assets('/src/node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>
</body>

</html>