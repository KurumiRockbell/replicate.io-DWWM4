<?php

namespace SYRADEV\Model;

use SYRADEV\app\NewsController;

class NewsModel
{
    public int $id;
    public string $name;
    public string $description;
    public string $content;
    public string $date;
    public int $uid_user;


    /**
     * Système :
     * Constructeur du modèle News
     * @param $newsInfos
     * @return NewsModel $NewsModel L'objet News
     */
    public function __construct($newsInfos) {

        // Récupération du jeton CSRF pour le décryptage du mot de passe
        $newsObj = NewsController::getInstance();

        // On affecte les valeurs du post à l'objet UserModel
        $this->id = (int)$newsInfos['id'];
        $this->name = (string)$newsInfos['name'];
        $this->description = (string)$newsInfos['description'];
        $this->content = (string)$newsInfos['content'];
        $this->date = (string)$newsInfos['date'];
        $this->uid_user = (int)$newsInfos['uid_user'];
        return $this;
    }
}