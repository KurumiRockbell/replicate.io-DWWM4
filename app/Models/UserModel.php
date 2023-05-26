<?php

namespace SYRADEV\Model;

use SYRADEV\app\UsersController;

class UserModel
{
    public string $username;
    public string $password;
    public string $email;
    public string $civilité;
    public string $datebirth;
    public string $country;
    public string $roles;


    /**
     * Système :
     * Constructeur du modèle User
     * @param $userInfos
     * @return UserModel $UserModel L'objet User
     */
    public function __construct($userInfos) {

        // Récupération du jeton CSRF pour le décryptage du mot de passe
        $usersObj = UsersController::getInstance();
        $csrfToken = $usersObj->getCsrfToken();

        // On affecte les valeurs du post à l'objet UserModel
        $this->username = (string)$userInfos['username'];
        $this->civilité = (string)$userInfos['civilité'];
        $this->datebirth = (string)$userInfos['datebirth'];
        $this->country = (string)$userInfos['country'];
        $this->roles = (string)$userInfos['roles'];
        // On décrypte l'adresse email reçue
        $this->email = (string)$usersObj->aesDecrypt(base64_decode($userInfos['cryptedEmail']), $csrfToken);

        // Si un mot de passe est foourni
        if(!empty($userInfos['cryptedPw'])) {
        // On décrypte le mot de passe reçu et on le hash avec l'algorythme argon2id
            $this->password = $usersObj->argon2idHash($usersObj->aesDecrypt(base64_decode($userInfos['cryptedPw']), $csrfToken));
        }
        return $this;
    }
}