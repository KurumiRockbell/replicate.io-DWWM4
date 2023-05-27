<?php
use SYRADEV\app\UsersController;


/**
 * @var array $data Les données en provenance du controller
 * $data['action'] > newuser || edituser
 * $data['userid']
 * $data['userinfos']
 */
// extract($data);

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
        <h1 class="font-bold text-white my-4">INSCRIPTION</h1>
    </div>
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


        <!-- Formulaire Ajout/Modification d'un utilisateur -->
        <div class="flex justify-center text-teal-50">
            <div class="col-md-6 p-3">

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
                    <label for="username" class="form-label bg-ui">username <?= $mandatory; ?></label>
                    <input type="text" id="username" name="username" class="form-input<?= $usernameValidationClass; ?>" value="<?= $username; ?>" required>
                    <div class="invalid-feedback">Veuillez saisir un username !</div>
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $password = (isset($_POST['cryptedPw']) && !empty($_POST['cryptedPw']))
                        ? $usersObj->aesDecrypt(base64_decode($_POST['cryptedPw']), $csrfToken) : '';

                    $passwordValidationClass = in_array('password', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="password" class="form-label bg-ui">Mot de
                        passe <?= $mandatory; ?></label>
                    <input type="password" id="password" class="form-input<?= $passwordValidationClass; ?>" value="<?= $password; ?>" autocomplete="new-password" required>
                    <div class="invalid-feedback">Veuillez saisir un mot de passe !</div>
                </div>

                <!-- Champ Email -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $email = (isset($_POST['cryptedEmail']) && !empty($_POST['cryptedEmail']))
                        ? $usersObj->aesDecrypt(base64_decode($_POST['cryptedEmail']), $csrfToken) : '';

                    $emailValidationClass = in_array('email', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="email" class="form-label bg-ui">Adresse email <?= $mandatory; ?></label>
                    <input type="text" id="email" class="form-input<?= $emailValidationClass; ?>" value="<?= $email; ?>" required>
                    <div class="invalid-feedback">Veuillez saisir une adresse mail valide !</div>
                </div>

                <!-- Champ Country -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $country = (isset($_POST['country']) && !empty($_POST['country']))
                        ? $_POST['country'] : '';
                    $countryValidationClass = in_array('country', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="country" class="form-label bg-ui">country <?= $mandatory; ?></label>
                    <input type="text" id="country" name="country" class="form-input<?= $countryValidationClass; ?>" value="<?= $country; ?>" required>
                    <div class="invalid-feedback">Veuillez saisir un country !</div>
                </div>

                <!-- Champ datebirth -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $datebirth = (isset($_POST['datebirth']) && !empty($_POST['datebirth']))
                        ? $_POST['datebirth'] : '';
                    $datebirthValidationClass = in_array('datebirth', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="datebirth" class="form-label bg-ui">datebirth <?= $mandatory; ?></label>
                    <input type="text" id="datebirth" name="datebirth" class="form-input<?= $datebirthValidationClass; ?>" value="<?= $datebirth; ?>" required>
                    <div class="invalid-feedback">Veuillez saisir un datebirth !</div>
                </div>

                <!-- Champ datebirth -->
                <div class="form-group has-validation mb-5">
                    <?php
                    $civilite = (isset($_POST['civilite']) && !empty($_POST['civilite']))
                        ? $_POST['civilite'] : '';
                    $civiliteValidationClass = in_array('civilite', $formErrors) ? ' is-invalid' : '';
                    ?>
                    <label for="civilite" class="form-label bg-ui">civilite <?= $mandatory; ?></label>
                    <input type="text" id="civilite" name="civilite" class="form-input<?= $civiliteValidationClass; ?>" value="<?= $civilite; ?>" required>
                    <div class="invalid-feedback">Veuillez saisir un civilite !</div>
                </div>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex justify-center">
            <div class="col-md-6 text-center pb-5 bg-ui">
                <div class="form-group mb-5">
                    <a href="<?= UsersController::getRoute('home'); ?>" class="btn btn-secondary float-start text-teal-50">Annuler</a>
                    <button id="actionuser" type="button" class="btn btn-primary text-white float-end">
                        Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
