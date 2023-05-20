<?php
/**
 * MvcUI classe Controller de Démonstration.
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

namespace SYRADEV\app;

/**
 * Classe MarketController étends MvcUIControlller
 * Gestion de la pagination
 */
class MarketController extends ReplicateController
{


    /**
     * Instance de la classe
     * @protected ReplicateController|null $instance
     */
    protected static ?ReplicateController $instance = null;


    /**
     * Système :
     * Instantie l'objet MarketController
     * @return MarketController object *
     */
    public static function getInstance(): ReplicateController
    {
        if (MarketController::$instance === null) {
            MarketController::$instance = new MarketController;
        }
        return MarketController::$instance;
    }


    /**
     * Affichage :
     * Affiche la page de démo de pagination redirigée
     * @param int $page Le numéro de page demandé
     * @param int $maxPerPage Le nombre de clients à afficher par page
     * @return void
     */
    public function redirectPaginateDemo(int $page, int $maxPerPage): void
    {
        // On se connecte à la database
        /** @var PdoMySQL $cnx */
        $cnx = PdoMySQL::getInstance();

        // Récupère le nombre de clients de la table Customers
        $nbClients = $cnx->compteTable('Customers')['nombre'];

        // Calcule le nombre de pages de clients
        $nbPages = $nbClients > 0 ? ceil($nbClients / $maxPerPage) : 0;

        // Si la page demandée a une valeur supérieure au nombre maximum de pages
        // On affiche la dernièer page
        if($page > $nbPages) {
            $page = $nbPages;
        }

        // Calcule la position à requêter en base
        $position = $page === 1 ? 0 : $page * $maxPerPage - $maxPerPage;

        // Requête paginée sur les clients en base
        $requeteClients = sprintf('SELECT * from `Customers` ORDER BY `CustomerID` LIMIT %d,%d', $position, $maxPerPage);
        $clients = $cnx->requete($requeteClients);

        // Envoie les données des clients au template
        echo $this->render('Layouts.default', 'Templates.Demo.redirectpaginate', ['nbpages'=>$nbPages, 'clients'=>$clients], 'Démo Pagination Redirigée');
    }


    /**
     * Affichage :
     * Affiche la page de démo pagination Ajax
     * @return void *
     */
    public function ajaxPaginateDemo(): void
    {
        echo $this->render('Layouts.default', 'Templates.Demo.clientslistajax', null, 'Démo Pagination Ajax');
    }


    /**
     * Affichage :
     * Affiche une liste de produits
     * @return void
     */
    public function productslist(): void
    {
        echo $this->render('Layouts.default', 'Templates.Demo.productlist', null, 'Liste de produits');
    }


    /**
     * Utilitaire :
     * Renvoie la liste paginée des clients
     * @param int $page Le numéro de page demandé
     * @param string $routeName Le nom d'une route
     * @return void
     */
    public function clientslist(int $page, string $routeName):void
    {
        // On récupère le nombre de clients à afficher par page
        $elementsPerPage = $_SESSION['mvcRoutes'][$routeName]['elements_per_page'];

        // On se connecte à la database
        /** @var PdoMySQL $cnx */
        $cnx = PdoMySQL::getInstance();

        // Récupère le nombre de clients de la table Customers
        $nbClients = $cnx->compteTable('Customers')['nombre'];

        // Calcule le nombre de pages de clients
        $nbPages = $nbClients > 0 ? ceil($nbClients / $elementsPerPage) : 0;

        // Calcule la position à requêter en base
        $position = $page === 1 ? 0 : $page * $elementsPerPage - $elementsPerPage;

        // Requête paginée sur les clients en base
        $requeteClients = sprintf('SELECT * from `Customers` ORDER BY `CustomerID` LIMIT %d,%d', $position, $elementsPerPage);
        $clients = $cnx->requete($requeteClients);

        // Envoie les données des clients au partiel
        echo $this->renderPartial('/Demo/clients', ['nbpages'=>$nbPages, 'clients'=>$clients]);
    }


    /**
     * Utilitaire :
     * Sélectionne et envoie les données du défilement infini
     * @param int $page La page demandée
     * @param int $maxPerPage Le nombre d'éléments à afficher par page
     * @return void
     */
    public function infinitescroll(int $page, int $maxPerPage): void
    {
        // On se connecte à la database
        $cnx = PdoMySQL::getInstance();

        // Récupère le nombre d'enregistrements de la table cards
        //$nbCards = $cnx->compteTable('Products')['nombre'];

        // Calcule le nombre de pages de cards
        //$nbPages = $nbcards > 0 ? ceil($nbcards / $maxPerPage) : 0;

        // Calcule la position à requêter en base
        $position = $page === 1 ? 0 : $page * $maxPerPage - $maxPerPage;

        // Requête paginée sur les cards en base
        $requeteProducts = sprintf('SELECT * from `Cards` ORDER BY `IDCards` LIMIT %d,%d', $position, $maxPerPage);
        $cards = $cnx->requete($requeteProducts);

        // Envoie les données des cards au partiel products
        echo $this->renderPartial('/Demo/cards', $cards);
    }


    /**
     * Utilitaire :
     * Affiche les produits classés par catégorie
     * @return void
     */
    public function productsByCategory(): void
    {

        // On se connecte à la database
        /** @var PdoMySQL $cnx */
        $cnx = PdoMySQL::getInstance();

        // On exécute la requête à travers 3 tables Products, Categories et Suppliers
        $sql = 'SELECT p.`ProductID`, p.`ProductName`, p.`QuantityPerUnit`, p.`UnitPrice`, p.`UnitsInStock`, c.`CategoryID`,
                    c.`CategoryName`, c.`Picture`, s.`CompanyName`, s.`ContactName`, s.`Country`, s.`Phone`
                    FROM `Products` p 
	                INNER JOIN `Categories` c ON ( p.`CategoryID` = c.`CategoryID`  )  
	                INNER JOIN `Suppliers` s ON ( p.`SupplierID` = s.`SupplierID`  )  
	                WHERE p.`Discontinued` = 0
                    GROUP BY p.`ProductID`, p.`ProductName`, p.`QuantityPerUnit`, p.`UnitPrice`, p.`UnitsInStock`, c.`CategoryID`,
                             c.`CategoryName`, s.`CompanyName`, s.`ContactName`, s.`Country`, s.`Phone`
                    ORDER BY p.`ProductName`';
        $products_category = $cnx->requete($sql);

        // On isole les catégories
        $categories = [];
        foreach($products_category as $product) {
            extract($product);
            $categories[$CategoryID] = $CategoryName;
        }
        ksort($categories);
        echo $this->render('Layouts.default',
                            'Templates.Demo.productsbycategory',
                            ['products'=>$products_category, 'categories'=>$categories],
                            'Produits par catégorie'
        );
    }

    <?php

// Inclure le fichier de connexion à la base de données
require_once 'db_connection.php';

// Opération de création (Create)
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    // Exécuter la requête
    // ...

    // Rediriger vers le tableau de bord ou afficher un message de succès
    // ...
}

// Opération de lecture (Read)
$sql = "SELECT * FROM users";
// Exécuter la requête
// ...

// Parcourir les résultats et les afficher dans un tableau ou tout autre format
// ...

// Opération de mise à jour (Update)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Mettre à jour les données dans la base de données
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
    // Exécuter la requête
    // ...

    // Rediriger vers le tableau de bord ou afficher un message de succès
    // ...
}

// Opération de suppression (Delete)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Supprimer les données de la base de données
    $sql = "DELETE FROM users WHERE id='$id'";
    // Exécuter la requête
    // ...

    // Rediriger vers le tableau de bord ou afficher un message de succès
    // ...
}

}