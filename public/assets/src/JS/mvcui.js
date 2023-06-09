/**
 * MvcUI JavaScript principal
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

docReady(() => {

    'use strict';

    const d = document;
    const totop = d.querySelector('#to-top');
    const ajaxPaginateBtn = d.querySelectorAll('.ajaxPagination li > a');
    const navbarToggler = d.querySelector('#hamburger');
    const animatedHamburger = d.querySelector('#animated-hamburger');
    const navbarmvcui = d.querySelector('#navbarMvcui');
    const fullscreen = d.querySelector('#fullscreen');
    const framed = d.querySelector('#framed');
    let screenfull = false;

    /**
     * Evènement click sur menu hamburger
     */
    if (navbarToggler !== null) {
        navbarToggler.addEventListener('click', (e) => {
            new bootstrap.Collapse(navbarmvcui);
            animatedHamburger.classList.toggle('open');
        });
    }


    /**
     * Evènement click sur bouton To top
     */
    if (totop !== null) {
        totop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        /** Affichage du boutn to-top suivant le scroll de la page **/
        window.onscroll = () => {
            totop.style.display = (d.body.scrollTop > 20 || d.documentElement.scrollTop > 20) ? 'block' : 'none';
        }
    }

    /**
     * Supprime les classes active de tous les liens d'un parent
     * @param parent Le node parent
     */
    let removeActiveLinks = (parent) => {
        for (const link of parent.getElementsByTagName("a")) {
            link.classList.remove('active');
        }
    };

    /**
     * Active un des boutons de la pagination suivant son numéro
     * @param paginator
     * @param page La page courante
     */
    let addActiveLink = (paginator, page) => {
        for (const link of paginator.getElementsByTagName("a")) {
            if (parseInt(link.dataset.page) === page) {
                link.classList.add('active');
            }
        }
    };

    /**
     * Evènement click sur un bouton de barre de pagination ajax
     */
    if (ajaxPaginateBtn !== null) {
        ajaxPaginateBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const $this = e.currentTarget;
                const action = $this.dataset.action;
                let pageDemanded = $this.dataset.page;
                let parentUl = btn.parentNode.parentNode;
                const paginatorId = parentUl.dataset.paginatorid;
                const currentPageIndicator = parentUl.parentNode.querySelector('.currentpage');
                const AllPaginators = d.querySelectorAll(`ul[data-paginatorid="${paginatorId}"]`);
                const nbpages = parentUl.parentNode.querySelector('.nbpages').value;
                AllPaginators.forEach(paginator => {
                    removeActiveLinks(paginator);
                    if (pageDemanded === 'prev') {
                        addActiveLink(paginator, parseInt(currentPageIndicator.value) - 1);
                        pageDemanded = parseInt(currentPageIndicator.value) - 1;
                    } else if (pageDemanded === 'next') {
                        addActiveLink(paginator, parseInt(currentPageIndicator.value) + 1);
                        pageDemanded = parseInt(currentPageIndicator.value) + 1;
                    } else {
                        paginator.querySelector(`a[data-page="${pageDemanded}"]`).classList.add('active');
                    }
                    if (parseInt(pageDemanded) === 1) {
                        paginator.firstElementChild.classList.add('disabled');
                    } else if (parseInt(pageDemanded) > 1) {
                        paginator.firstElementChild.classList.remove('disabled');
                    }
                    if (parseInt(pageDemanded) >= nbpages) {
                        paginator.lastElementChild.classList.add('disabled');
                    } else {
                        paginator.lastElementChild.classList.remove('disabled');
                    }
                    paginator.parentNode.querySelector('.currentpage').value = pageDemanded;
                    $this.blur();
                });
                /** Exécute la méthode chargement de page demandée */
                window[action](pageDemanded);
            });
        });
    }


    /**
     * Evènement sur bouton fullscreen
     */
    if (fullscreen !== null) {
        fullscreen.addEventListener('click', (e) => {
            e.preventDefault();
            if (d.documentElement.requestFullscreen) {
                if (!screenfull) {
                    d.documentElement.requestFullscreen().then(() => {
                        fullscreen.classList.add('active');
                    });
                } else {
                    d.exitFullscreen().then(() => {
                        fullscreen.classList.remove('active');
                    });
                }
            }
        });
    }
    d.documentElement.addEventListener("fullscreenchange", (e) => {
        screenfull = !screenfull;
        if (screenfull) {
            fullscreen.classList.add('active');
            fullscreen.textContent = 'Écran réduit';
        } else {
            fullscreen.classList.remove('active');
            fullscreen.textContent = 'Plein écran';
        }
    });
});

/**
 * Permet d'aller sur le market.
 */
function navigateToMarket() {
    window.location.href = "market";
}

/**
 * Permet de retourner sur la home et de slide jusq'a l'ID concerner.
 */
function scrollToElement(event, id) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    const element = document.getElementById(id);
    if (element) {
        window.location.href = event.target.href; // Redirige vers la page "home"
        setTimeout(function() {
            element.scrollIntoView({ behavior: 'smooth' }); // Effectue le défilement jusqu'à l'élément spécifié après un court délai
        }, 500);
    }
}