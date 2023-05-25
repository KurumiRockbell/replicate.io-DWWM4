<?php

use SYRADEV\app\ReplicateController;
?>

<div class="text-teal-50 text-justify pt-3 flex-col flex items-center w-full">
    <h1 class="text-lime-400 font-black text-5xl text-center md:text-6xl lg:text-7xl lg:pt-12" id="rplc">
        CONTACT US
    </h1>
    <div class="flex flex-col w-3/4 lg:w-1/2 mt-4">
        <label for="email-address-icon" class="block mb-2 text-sm font-medium text-teal-50">Title : </label>
        <div class="">
            <input type="text" id="email-address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-400 focus:border-lime-400 block w-full p-2.5" placeholder="You'r title here..">
        </div>
        <div class="mt-4">
            <label for="message" class="block mb-2 text-sm font-medium text-teal-50">Your message</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:ring-lime-400 focus:border-lime-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>
        <button type="button" class="mt-6 text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Send</button>
    </div>
</div>
<script src="<?= ReplicateController::assets('/src/node_modules/flowbite/dist/flowbite.min.js'); ?>"></script>