<?php

use SYRADEV\app\UsersController;
use SYRADEV\app\ReplicateController;

/**
 * @string $mandatory Message pour les champs obligatoires
 */
$mandatory = '(<span class="text-lime-400">*</span>)';

/**
 * @array $formErrors Tableau pour stocker le nom des champs en erreur
 */
$formErrors = [];

/**
 * @string $xxxValidationClass Chaines pour stocker les classes à appliquer aux champs en erreur
 */
$usernameValidationClass = $passwordValidationClass = $emailValidationClass = $civiliteValidationClass = $countryValidationClass = $datebirthValidationClass = '';

/**
 * Instanciation du contrôleur UsersController
 */
$usersObj = UsersController::getInstance();

/**
 * On récupère le jeton CSRF
 */
$csrfToken = UsersController::getCSRFToken();

/** Validation du formulaire */
if (isset($_POST['useraction']) && $_POST['useraction'] === "newUser") {
    // Le champ prénom ne peut être vide
    if (empty($_POST['username'])) {
        $formErrors[] = 'username';
    }
    // Le champ adresse email encrypté ne peut être vide
    // et doit être valide
    if (empty($_POST['cryptedEmail']) || !$usersObj->validateEmail($usersObj->aesDecrypt(base64_decode($_POST['cryptedEmail']), $csrfToken))) {
        $formErrors[] = 'email';
    }
    // Pour un nouvel utilisateur, le champ mot de passe encrypté ne peut être vide
    if (empty($_POST['cryptedPw'])) {
        $formErrors[] = 'password';
    }
    // Le champ datebirth ne peut être vide
    if (empty($_POST['datebirth'])) {
        $formErrors[] = 'datebirth';
    }
    // Le champ datebirth ne peut être vide
    if (empty($_POST['country'])) {
        $formErrors[] = 'country';
    }
    // Le champ datebirth ne peut être vide
    if (empty($_POST['civilite'])) {
        $formErrors[] = 'civilite';
    }


    /** S'il n'y a pas d'erreur de saisie dans le formulaire */
    if (empty($formErrors)) {

        /** On valide le jeton csrf */
        if ($usersObj->validateFormRequest()) {

            /** Ajout du nouvel utilisateur */
            $insertUser = $usersObj->createUser($_POST);
            if ($insertUser) {
                header('location: ' . UsersController::getRoute('login'));
            }
        }
    }
}
?>
<div class="grid grid-cols-1 text-teal-50 text-3xl">
    <div class="bg-secondary bg-gradient text-center">
        <h1 class="font-bold text-white my-4">REGISTER</h1>
    </div>
    <a href="<?= ReplicateController::getRoute('home'); ?>" class="flex justify-center mb-6 text-2xl font-semibold text-gray-900">
        <img class="w-auto h-20 mr-2" src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?>" alt="logo" />
    </a>
</div>
<div class="w-full">

    <form action="<?= UsersController::getRoute('register'); ?>" id="userform" method="post" autocomplete="off">

        <!-- Header Area -->
        <div class="flex justify-center text-teal-50">
            <div class="col-md-6 text-center p-3 mt-3 bg-ui">
                <div class="text-sm">
                    Les champs suivis d'une astérisque <?= $mandatory; ?> sont <span class="text-lime-400">obligatoires</span>.
                </div>
            </div>
        </div>


        <!-- Formulaire Ajout d'un utilisateur -->
        <div class="flex justify-center text-teal-50">
            <div class="col-md-6 border-4 border-indigo-800 rounded-lg p-8">

                <!-- Champs cachés -->

                <!-- Champ de stockage de l'email encrypté -->
                <input type="hidden" id="cryptedEmail" name="cryptedEmail" value="">
                <!-- Champ de stockage du mot de passe encrypté -->
                <input type="hidden" id="cryptedPw" name="cryptedPw" value="">
                <!-- Champ de stockage de l'action newuser  -->
                <input type="hidden" id="useraction" name="useraction" value="newUser">
                <!-- Champ Rôle -->
                <input type="hidden" name="role" value="user">
                <!-- Champ de stockage du jeton CSRF -->
                <?= UsersController::insertHiddenToken(); ?>

                <!-- Champ username -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $username = (isset($_POST['username']) && !empty($_POST['username']))
                        ? $_POST['username'] : '';

                    $usernameValidationClass = in_array('username', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="username" class="form-label bg-ui">Username <?= $mandatory; ?></label>
                    <br>
                    <input type="text" id="username" name="username" class="form-input<?= $usernameValidationClass; ?> text-black rounded-lg" value="<?= $username; ?>" required>
                    <div class="invalid-feedback text-indigo-800">Choose your username !</div>
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $password = (isset($_POST['cryptedPw']) && !empty($_POST['cryptedPw']))
                        ? $usersObj->aesDecrypt(base64_decode($_POST['cryptedPw']), $csrfToken) : '';

                    $passwordValidationClass = in_array('password', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="password" class="form-label bg-ui">Password <?= $mandatory; ?></label>
                    <br>
                    <input type="password" id="password" class="form-input<?= $passwordValidationClass; ?> text-black rounded-lg" value="<?= $password; ?>" autocomplete="new-password" required>
                    <div class="invalid-feedback text-indigo-800">Choose your password !</div>
                </div>

                <!-- Champ Email -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $email = (isset($_POST['cryptedEmail']) && !empty($_POST['cryptedEmail']))
                        ? $usersObj->aesDecrypt(base64_decode($_POST['cryptedEmail']), $csrfToken) : '';

                    $emailValidationClass = in_array('email', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="email" class="form-label bg-ui">Adresse email <?= $mandatory; ?></label>
                    <br>
                    <input type="text" id="email" class="form-input<?= $emailValidationClass; ?> text-black rounded-lg " value="<?= $email; ?>">
                    <div class="invalid-feedback text-indigo-800">Veuillez saisir une adresse mail valide !</div>
                </div>

                <!-- Champ Country -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $country = (isset($_POST['country']) && !empty($_POST['country']))
                        ? $_POST['country'] : '';
                    $countryValidationClass = in_array('country', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="country" class="form-label bg-ui">Country <?= $mandatory; ?></label>
                    <br>
                    <input type="text" id="country" name="country" class="form-input<?= $countryValidationClass; ?> text-black rounded-lg" value="<?= $country; ?>" required>
                    <div class="invalid-feedback text-indigo-800">Choose your country !</div>
                </div>

                <!-- Champ datebirth -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $datebirth = (isset($_POST['datebirth']) && !empty($_POST['datebirth']))
                        ? $_POST['datebirth'] : '';
                    $datebirthValidationClass = in_array('datebirth', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="datebirth" class="form-label bg-ui">Date of birth <?= $mandatory; ?></label>
                    <br>
                    <input type="text" id="datebirth" name="datebirth" class="form-input<?= $datebirthValidationClass; ?> text-black rounded-lg" value="<?= $datebirth; ?>" required>
                    <div class="invalid-feedback text-indigo-800">Choose your date of birth !</div>
                </div>

                <!-- Champ civilité -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $civilite = (isset($_POST['civilite']) && !empty($_POST['civilite']))
                        ? $_POST['civilite'] : '';
                    $civiliteValidationClass = in_array('civilite', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="civilite" class="form-label bg-ui">Gender <?= $mandatory; ?></label>
                    <br>
                    <input type="text" id="civilite" name="civilite" class="form-input<?= $civiliteValidationClass; ?> text-black rounded-lg" value="<?= $civilite; ?>" required>
                    <div class="invalid-feedback text-indigo-800">Choose your gender !</div>
                </div>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex justify-center mt-6">
            <div class="col-md-6 text-center pb-5 bg-ui">
                <div class="form-group mb-5">
                    <a href="<?= UsersController::getRoute('home'); ?>" class="btn text-teal-50 bg-indigo-800 hover:bg-indigo-950 rounded-lg p-4 mr-3 ">Annuler</a>
                    <button id="actionuser" type="button" class="btn text-black bg-lime-400 rounded-lg hover:bg-lime-600 p-3 ">
                        Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>