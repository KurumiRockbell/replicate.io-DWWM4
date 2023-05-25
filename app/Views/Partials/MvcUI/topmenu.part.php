<?php

use SYRADEV\app\ReplicateController;

/**
 * @var $logo
 * @var $title
 * @var $toptitle
 */
?>

<!--Header Section-->

<body class="z-10">
    <header class="z-10">
        <nav class="bg-black">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                <a href="<?= ReplicateController::getRoute('home'); ?>" class="flex items-center">
                    <img src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?> " class="h-6 mr-3 sm:h-8" alt="Replicate Logo" />
                </a>
                <div class="flex items-center md:order-2">
                    <a href="<?= ReplicateController::getRoute('login'); ?>" class="text-teal-50 hover:bg-indigo-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Login</a>
                    <a href="<?= ReplicateController::getRoute('register'); ?>" class="text-white bg-lime-500 hover:bg-indigo-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Sign up</a>
                    <button data-collapse-toggle="mega-menu-icons" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-lime-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mega-menu-icons" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="<?= ReplicateController::getRoute('home'); ?>" class="block py-2 pl-3 pr-4 text-lime-500 border-b border-gray-100 hover:bg-indigo-800 md:hover:bg-transparent md:border-0 md:hover:text-indigo-800 md:p-0" aria-current="page">Home</a>
                        </li>
                        <li>
                            <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-teal-50 border-b border-gray-100 md:w-auto hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-indigo-800 md:p-0">
                                Navigation
                                <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <!--Grid and hidden don't apply the same property don't trust this-->
                            <div id="mega-menu-icons-dropdown" class="absolute z-10 grid hidden w-3/4 grid-cols-2 text-sm bg-black border border-lime-500 rounded-lg shadow-md lg:p-2 md:w-auto md:grid-cols-3">
                                <div class="p-8 md:pb-4">
                                    <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a type="button" onClick="document.getElementById('menurplc').scrollIntoView();" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Replicate</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525"></path>
                                                </svg>
                                                Replicate
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" onClick="document.getElementById('rplc').scrollIntoView();" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Ozen II</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"></path>
                                                </svg>
                                                Ozen II
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" onClick="document.getElementById('card').scrollIntoView();" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Cards</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"></path>
                                                </svg>
                                                Cards
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" onClick="document.getElementById('team').scrollIntoView();" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">About us</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                                </svg>
                                                About us
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-8 text-gray-900 md:pb-4">
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="<?= ReplicateController::getRoute('news'); ?>" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">News</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"></path>
                                                </svg>
                                                News
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= ReplicateController::getRoute('market'); ?>" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Marketplace</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z"></path>
                                                </svg>
                                                Marketplace
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= ReplicateController::getRoute('checkout'); ?>" class="cursor-pointer flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Checkout</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
                                                </svg>
                                                Checkout
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= ReplicateController::getRoute('profile'); ?>" class="flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Profile</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                                                </svg>
                                                Profile
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-8 text-gray-900 md:pb-4">
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="<?= ReplicateController::getRoute('contact'); ?>" class="flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Contact</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"></path>
                                                </svg>
                                                Contact
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= ReplicateController::getRoute('privacy'); ?>" class="flex items-center text-teal-50 hover:text-indigo-800 group">
                                                <span class="sr-only">Legal</span>
                                                <svg class="w-4 h-4 mr-2 text-teal-50 group-hover:text-indigo-800" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"></path>
                                                </svg>
                                                Legal
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="<?= ReplicateController::getRoute('docs'); ?>" class="block py-2 pl-3 pr-4 text-teal-50 border-b border-gray-100 hover:bg-lime-500 md:hover:bg-transparent md:border-0 md:hover:text-indigo-800 md:p-0">Docs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script src="<?= ReplicateController::assets('/src/node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>
</body>