<?php
/**
 * MvcUI Partiel de Footer
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
$mvcUi = ReplicateController::getInstance();
?>
<!--Footer Section-->
<footer class="bg-black rounded-lg shadow m-4 z-60">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
          <a href="./footer.html" class="flex items-center mb-4 sm:mb-0">
            <img
              src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?>"
              class="h-8 mr-3"
              alt="Replicate Logo"
            />
          </a>
          <ul
            class="flex flex-wrap items-center mb-6 text-sm font-medium text-lime-500 sm:mb-0"
          >
            <li>
            <a href="<?= ReplicateController::getRoute('home'); ?>" class="mr-4 hover:underline md:mr-6">Home</a>
            </li>
            <li>
            <a href="<?= ReplicateController::getRoute('market'); ?>" class="mr-4 hover:underline md:mr-6">Marketplace</a>
            </li>
            <li>
            <a href="<?= ReplicateController::getRoute('contact'); ?>" class="mr-4 hover:underline md:mr-6">Contact</a>
            </li>
            <li>
            <a href="<?= ReplicateController::getRoute('privacy'); ?>" class="hover:underline">Privacy Policy</a>
            </li>
          </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <span class="block text-sm text-teal-50 sm:text-center"
          >© 2023
          <a href="https://flowbite.com/" class="hover:underline">Replicate™</a
          >. All Rights Reserved.</span
        >
      </div>
    </footer>
    <script src="node_modules\flowbite\dist\flowbite.min.js"></script>
