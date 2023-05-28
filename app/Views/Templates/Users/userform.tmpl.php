<?php

use SYRADEV\app\UsersController;
use SYRADEV\app\ReplicateController;

/**
 * @var array $data Les données en provenance du controller
 * $data['action'] > newuser || edituser
 * $data['userid']
 * $data['userinfos']
 */
extract($data);

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
if (isset($_POST['useraction']) && !empty($_POST['useraction'])) {
    // Le champ username ne peut être vide
    if (empty($_POST['username'])) {
        $formErrors[] = 'username';
    }
    // Pour un nouvel utilisateur, le champ mot de passe encrypté ne peut être vide
    if ($action === 'newuser' && empty($_POST['cryptedPw'])) {
        $formErrors[] = 'password';
    }
    // Le champ adresse email encrypté ne peut être vide
    // et doit être valide
    if (empty($_POST['cryptedEmail']) || !$usersObj->validateEmail($usersObj->aesDecrypt(base64_decode($_POST['cryptedEmail']), $csrfToken))) {
        $formErrors[] = 'email';
    }
    // Le champ civilite ne peut être vide
    if (empty($_POST['civilite'])) {
        $formErrors[] = 'civilite';
    }
    // Le champ datebirth ne peut être vide
    if (empty($_POST['datebirth'])) {
        $formErrors[] = 'datebirth';
    }
    // Le champ country ne peut être vide
    if (empty($_POST['country'])) {
        $formErrors[] = 'country';
    }

    /** S'il n'y a pas d'erreur de saisie dans le formulaire */
    if (empty($formErrors)) {

        /** On valide le jeton csrf */
        if ($usersObj->validateFormRequest()) {

            /** Ajout du nouvel utilisateur */
            if ($action === 'newuser') {
                $insertUser = $usersObj->createUser($_POST);
                if ($insertUser) {
                    header('location: ' . UsersController::getRoute('users'));
                }
            }

            /** Modification d'un utilisateur existant */
            if ($action === 'edituser' && !empty($_POST['uid'])) {
                $updateUser = $usersObj->updateUser($_POST);
                if ($updateUser) {
                    header('location: ' . UsersController::getRoute('users'));
                }
            }
        }
    }
}
?>
<div class="text-teal-50 text-justify px-12 pt-6 flex-col flex w-full">
    <div>
        <?php
        // Détermination de l'action du formulaire
        $actionform = '';
        switch ($action) {
            case 'newuser':
                $actionform = UsersController::getRoute('newuser');
                break;
            case 'edituser':
                $actionform = UsersController::getRoute('edituser') . '/' . $userinfos['uid'];
                break;
        }
        ?>

        <form action="<?= $actionform; ?>" id="userform" method="post" autocomplete="off">

            <!-- Header Area -->
            <div class="flex justify-center text-teal-50 flex-col">
                <a href="<?= ReplicateController::getRoute('home'); ?>" class="flex justify-center mb-6 text-2xl font-semibold text-gray-900">
                    <img class="w-auto h-20 mr-2" src="<?= ReplicateController::assets('/imgs/rplc_header_logo.svg'); ?>" alt="logo" />
                </a>
                <div class="col-md-6 text-center p-3 bg-ui">
                    <a class="text-sm text-opacity-25 hover:text-opacity-100 link-underline link-underline-opacity-25 link-underline-opacity-100-hover" href="<?= UsersController::getRoute('users'); ?>">&lt; Retour à la liste</a>
                    <?php if ($action === 'newuser') { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#a3e635" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                        </svg>
                    <?php } elseif ($action === 'edituser') { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#a3e635" class="bi bi-person-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>
                    <?php } ?>
                    <div class="text-sm">Les champs précédés d'une astérisque <?= $mandatory; ?> sont <span class="text-lime-400">obligatoires</span>.</div>
                </div>
            </div>

            <!-- Formulaire Ajout/Modification d'un utilisateur -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 m-3 p-3 border rounded-3 bg-light">

                    <!-- Champs cachés -->
                    <?php if ($action === 'edituser') { ?>
                        <!-- Champ de stockage de l'uid de l'utilisateur à modifier -->
                        <input type="hidden" name="uid" value="<?= $userinfos['uid']; ?>">
                    <?php } ?>
                    <!-- Champ de stockage de l'email encrypté -->
                    <input type="hidden" id="cryptedEmail" name="cryptedEmail" value="">
                    <!-- Champ de stockage du mot de passe encrypté -->
                    <input type="hidden" id="cryptedPw" name="cryptedPw" value="">
                    <!-- Champ de stockage de l'action newuser/edituser  -->
                    <input type="hidden" id="useraction" name="useraction" value="<?= $action; ?>">
                    <!-- Champ de stockage du jeton CSRF -->
                    <?= UsersController::insertHiddenToken(); ?>

                    <!-- Champ Rôle -->
                    <div class="mb-5">
                        <?php
                        $roles = 'user';
                        if (isset($_POST['roles'])) {
                            $roles = $_POST['roles'];
                        } elseif ($action === 'edituser') {
                            $roles = $userinfos['roles'];
                        }
                        ?>
                        <label class="block bg-ui py-2 px-4 text-white font-semibold mb-2">Rôle <?= $mandatory; ?></label>
                        <div class="mb-1 text-teal-50">
                            <?php $checkedRoles = $roles === 'user' ? 'checked' : ''; ?>
                            <input type="radio" name="roles" id="roles-user" value="user" class="form-radio" <?= $checkedRoles; ?>>
                            <label for="roles-user" class="ml-2">Utilisateur</label>
                        </div>
                        <div class="mb-1 text-teal-50">
                            <?php $checkedRoles = $roles === 'admin' ? 'checked' : ''; ?>
                            <input type="radio" name="roles" id="roles-admin" value="admin" class="form-radio" <?= $checkedRoles; ?>>
                            <label for="roles-admin" class="ml-2">Administrateur</label>
                        </div>
                    </div>



                    <!-- Champ Username -->
                    <div class="mb-5">
                        <?php
                        $username = (isset($userinfos) && $action === 'edituser')
                            ? $userinfos['username'] : ((isset($_POST['username']) && !empty($_POST['username']))
                                ? $_POST['username'] : '');

                        $usernameValidationClass = in_array('username', $formErrors) ? 'border-red-500' : '';
                        ?>
                        <label for="username" class="block bg-ui py-2 px-4 text-white font-semibold">Username <?= $mandatory; ?></label>
                        <input type="text" id="username" name="username" class="border rounded-md px-4 py-2 w-full text-black <?= $usernameValidationClass; ?>" value="<?= $username; ?>" required>
                        <?php if (in_array('username', $formErrors)) : ?>
                            <div class="text-red-500 text-sm">Choose your Username!</div>
                        <?php endif; ?>
                    </div>


                    <!-- Champ Mot de passe -->
                    <div class="mb-5">
                        <?php
                        $password = (isset($userinfos) && $action === 'edituser')
                            ? '' : ((isset($_POST['cryptedPw']) && !empty($_POST['cryptedPw']))
                                ? $usersObj->aesDecrypt(base64_decode($_POST['cryptedPw']), $csrfToken) : '');
                        $passwordValidationClass = in_array('password', $formErrors) ? 'border-red-500' : '';
                        ?>
                        <label for="password" class="block bg-ui py-2 px-4 text-white font-semibold">Mot de passe <?= $action === 'newuser' ? $mandatory : ''; ?></label>
                        <input type="password" id="password" class="border rounded-md px-4 py-2 w-full text-black <?= $passwordValidationClass; ?>" value="<?= $password; ?>" autocomplete="new-password" required>
                        <?php if (in_array('password', $formErrors)) : ?>
                            <div class="text-red-500 text-sm">Veuillez saisir un mot de passe !</div>
                        <?php endif; ?>
                        <?php if ($action === 'edituser') : ?>
                            <span class="text-sm">Saisissez un mot de passe seulement si vous souhaitez le changer.</span>
                        <?php endif; ?>
                    </div>


                    <!-- Champ Email -->
                    <div class="mb-5">
                        <?php
                        $email = (isset($userinfos) && $action === 'edituser')
                            ? $userinfos['email'] : ((isset($_POST['cryptedEmail']) && !empty($_POST['cryptedEmail']))
                                ? $usersObj->aesDecrypt(base64_decode($_POST['cryptedEmail']), $csrfToken) : '');
                        $emailValidationClass = in_array('email', $formErrors) ? 'border-red-500' : '';
                        ?>
                        <label for="email" class="block bg-ui py-2 px-4 text-white font-semibold"><?= $mandatory; ?> Adresse email</label>
                        <input type="text" id="email" class="border rounded-md px-4 py-2 w-full text-black <?= $emailValidationClass; ?>" value="<?= $email; ?>" required>
                        <?php if (in_array('email', $formErrors)) : ?>
                            <div class="text-red-500 text-sm">Veuillez saisir une adresse mail valide !</div>
                        <?php endif; ?>
                    </div>


                    <!-- Champs Civilité -->
                    <div class="mb-5">
                        <?php
                        $civilite = (isset($userinfos) && $action === 'edituser')
                            ? $userinfos['civilite'] : ((isset($_POST['civilite']) && !empty($_POST['civilite']))
                                ? $_POST['civilite'] : '');
                        $civiliteValidationClass = in_array('civilite', $formErrors) ? 'border-red-500' : '';
                        ?>
                        <label for="civilite" class="block bg-ui py-2 px-4 text-white font-semibold"><?= $mandatory; ?> Civilité</label>
                        <input type="text" id="civilite" name="civilite" class="border rounded-md px-4 py-2 w-full text-black <?= $civiliteValidationClass; ?>" value="<?= $civilite; ?>" required>
                        <?php if (in_array('civilite', $formErrors)) : ?>
                            <div class="text-red-500 text-sm">Choose your gender!</div>
                        <?php endif; ?>
                    </div>



                    <!-- Champ Date de naissance -->
                    <div class="mb-5">
                        <?php
                        $datebirth = (isset($userinfos) && $action === 'edituser')
                            ? $userinfos['datebirth'] : ((isset($_POST['datebirth']) && !empty($_POST['datebirth']))
                                ? $_POST['datebirth'] : '');
                        $datebirthValidationClass = in_array('datebirth', $formErrors) ? 'border-red-500' : '';
                        ?>
                        <label for="datebirth" class="block bg-ui py-2 px-4 text-white font-semibold"><?= $mandatory; ?> Date of birth</label>
                        <input type="text" id="datebirth" name="datebirth" class="border rounded-md px-4 py-2 w-full text-black <?= $datebirthValidationClass; ?>" value="<?= $datebirth; ?>" required>
                        <?php if (in_array('datebirth', $formErrors)) : ?>
                            <div class="text-red-500 text-sm">Enter your date of birth!</div>
                        <?php endif; ?>
                    </div>


                    <!-- Champ Country -->
                    <div class="mb-5">
                        <?php
                        $country = (isset($userinfos) && $action === 'edituser')
                            ? $userinfos['country'] : ((isset($_POST['country']) && !empty($_POST['country']))
                                ? $_POST['country'] : '');
                        $countryValidationClass = in_array('country', $formErrors) ? 'border-red-500' : '';
                        ?>
                        <label for="country" class="block bg-ui py-2 px-4 text-white font-semibold"><?= $mandatory; ?> Country</label>
                        <input type="text" id="country" name="country" class="border rounded-md px-4 py-2 w-full <?= $countryValidationClass; ?>" value="<?= $country; ?>" required>
                        <?php if (in_array('country', $formErrors)) : ?>
                            <div class="text-red-500 text-sm">Enter your location!</div>
                        <?php endif; ?>
                    </div>


                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="flex justify-center mt-4">
                <div class="w-2/3 bg-ui p-3">
                    <div class="mb-3 flex justify-between">
                        <a href="<?= UsersController::getRoute('users'); ?>" class="btn btn-secondary text-teal-50">Annuler</a>
                        <?php $actionLabel = $action === 'newuser' ? 'Enregistrer' : 'Mettre à jour'; ?>
                        <button id="actionuser" type="button" class=" text-teal-50">
                            <?= $actionLabel; ?>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>