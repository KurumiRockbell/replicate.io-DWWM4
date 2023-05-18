<?php
/**
 * MvcUI Template page d'erreur 401
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
<div id="messageError" class="text-center px-5 py-5 animated fadeIn">
    <a href="<?= ReplicateController::getRoute('home'); ?>" title="Page d'accueil">
        <img id="mvclogo" src="<?= ReplicateController::assets('/imgs/mvc-ui-.svg'); ?>"
             alt="Application MVC"></a>
    <h1 class="display-5">Oh! 401 - ACC&Egrave;S NON AUTORIS&Eacute;</h1>
    <p>Malheureusement, vous n'avez pas accès &agrave; cette page.<br> vous pouvez soit retourner &agrave; la page
        <a href="<?= ReplicateController::getRoute('home'); ?>" title="Retourner &agrave; la page d'accueil">d'accueil</a> <br>soit revenir &agrave; la <a
            href="javascript:history.go(-1);" title="Revenir &agrave; la page pr&eacute;c&eacute;dente">page pr&eacute;c&eacute;dente</a>.</p>
</div>
