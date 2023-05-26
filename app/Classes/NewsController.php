<?php

namespace SYRADEV\app;

class NewsController extends ReplicateController
{
    protected static ?ReplicateController $instance = null;

    public static function getInstance(): ReplicateController
    {
        if (NewsController::$instance === null) {
            NewsController::$instance = new NewsController;
        }
        return NewsController::$instance;
    }


    public function showNews(): void
    {
        // On se connecte à la base de données
        $cnx = PdoMySQL::getInstance();

        // Récupération des articles depuis la base de données
        $articles = $cnx->requete("SELECT * FROM `news`");

        // Passer les données à la vue
        echo $this->render('Layouts.default', 'Templates.MvcUI.news', [
            'articles' => $articles
        ]);
        
    }
}
