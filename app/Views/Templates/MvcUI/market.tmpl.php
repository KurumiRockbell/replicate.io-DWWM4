<?php

use SYRADEV\app\ReplicateController;
?>

<div>
    <img src="<?= ReplicateController::assets('/imgs/bannerMarket.png'); ?>" alt="Banner RPLC News" class="flex flex-col justify-center w-full" />
</div>
<div class="flex flex-row justify-between w-3/4">
    <div class="flex items-center justify-center w-3/4 mt-8">
        <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-teal-50 bg-indigo-800 hover:bg-indigo-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
            Filter by category
            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden w-56 p-6 bg-white rounded-lg shadow">
            <h6 class="mb-3 text-sm font-medium text-gray-900">Category</h6>
            <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                <li class="flex items-center">
                    <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />

                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900">
                        Attack
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />

                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900">
                        Defense
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="dell" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                    <label for="dell" class="ml-2 text-sm font-medium text-gray-900">
                        VIP
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="asus" type="checkbox" value="" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                    <label for="asus" class="ml-2 text-sm font-medium text-gray-900">
                        Vehicules
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="logitech" type="checkbox" value="" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                    <label for="logitech" class="ml-2 text-sm font-medium text-gray-900">
                        Tools
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="msi" type="checkbox" value="" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                    <label for="msi" class="ml-2 text-sm font-medium text-gray-900">
                        Lockdown
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="bosch" type="checkbox" value="" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                    <label for="bosch" class="ml-2 text-sm font-medium text-gray-900">
                        Modules
                    </label>
                </li>

                <li class="flex items-center">
                    <input id="sony" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />

                    <label for="sony" class="ml-2 text-sm font-medium text-gray-900">
                        Unity
                    </label>
                </li>
            </ul>
        </div>
    </div>
    <a type="button" class="button" href="<?= ReplicateController::getRoute('checkout'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-400 mt-4 mr-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
    </a>
</div>