<?php
namespace SYRADEV\app;

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
     * Constructeur de la classe UsersController
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
     * Renvoie la liste des news
     * @return void
     */
    public function listNews(): void
    {
        // On se connecte à la database
        $cnx = PdoMySQL::getInstance();

        $data = [];
        $data['color'] = '#ffffff';

        // Requête les utilisateurs en base de données
        $requeteNews = 'SELECT * FROM `news` ORDER BY `id`';
        $data['news'] = $cnx->requete($requeteNews);

        // Envoie les données des utilisateurs au template
        echo $this->render('Layouts.default', 'Templates.MvcUI.news', $data, 'Liste des news');
    }

    
}