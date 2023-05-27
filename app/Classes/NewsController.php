<?php
namespace SYRADEV\app;

use SYRADEV\Model\NewsModel;

/**
 * Classe DemoController étends MvcUIControlller
 * Gestion de la pagination
 */
class NewsController extends ReplicateController
{


    /**
     * Instance de la classe
     * @protected ReplicateController|null $instance
     */
    protected static ?ReplicateController $instance = null;
    private string $cipherAlgo;
    private string $hashAlgo;
    private string $secret;


    /**
     * Constructeur de la classe NewsController
     */
    private function __construct()
    {
        parent::__construct();
        $conf = $this->getConf();
        $this->cipherAlgo = $conf->cipherAlgo;
        $this->hashAlgo = $conf->hashAlgo;
        $this->secret = $conf->hmacData;
    }


    /**
     * Système :
     * Instantie l'objet NewsController
     * @return NewsController object *
     */
    public static function getInstance(): ReplicateController
    {
        if (NewsController::$instance === null) {
            NewsController::$instance = new NewsController;
        }
        return NewsController::$instance;
    }

    /**
     * CRUD UTILISATEUR :
     * Renvoie la liste des utilisateurs
     * @return void
     */
    public function listUsers(): void
    {
        // On se connecte à la database
        $cnx = PdoMySQL::getInstance();

        $data = [];
        $data['color'] = '#ffffff';
        $data['color2'] = '#a3e635';
        $data['color3'] = '#3730a3';

        // Requête les utilisateurs en base de données
        $requeteUsers = 'SELECT * from `news` ORDER BY `uid`';
        $data['users'] = $cnx->requete($requeteUsers);

        // Envoie les données des utilisateurs au template
        echo 'USERS';
        echo $this->render('Layouts.default', 'Templates.Users.listusers', $data, 'Liste des utilisateurs');
    }
// A FINIR !

}