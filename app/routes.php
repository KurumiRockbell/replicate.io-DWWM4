<?php
use SYRADEV\app\ReplicateController;
use SYRADEV\app\DemoController;
return [
    'login' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/login',
        'class' => ReplicateController::class,
        'action' => 'login',
        'info' => 'Affiche la bannière de login.'
    ],
    'register' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/register',
        'class' => ReplicateController::class,
        'action' => 'register',
        'info' => 'Affiche la bannière de register.'
    ],
    '500' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/500',
        'class' => ReplicateController::class,
        'action' => 'error500',
        'info' => 'Affiche la page d\'erreur 500.'
    ],
    '404' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/404',
        'class' => ReplicateController::class,
        'action' => 'error404',
        'info' => 'Affiche la page d\'erreur 404.'
    ],
    '403' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/403',
        'class' => ReplicateController::class,
        'action' => 'error403',
        'info' => 'Affiche la page d\'erreur 403.'
    ],
    '401' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/401',
        'class' => ReplicateController::class,
        'action' => 'error401',
        'info' => 'Affiche la page d\'erreur 401.'
    ],
    'home' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/',
        'class' => ReplicateController::class,
        'action' => 'home',
        'info' => 'Affiche la page d\'accueil.'
    ],
    'news' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/news',
        'class' => ReplicateController::class,
        'action' => 'news',
        'info' => 'Affiche la page des news.'
    ],
    'market' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/market',
        'class' => ReplicateController::class,
        'action' => 'market',
        'info' => 'Affiche la page du marketplace.'
    ],
    'checkout' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/checkout',
        'class' => ReplicateController::class,
        'action' => 'checkout',
        'info' => 'Affiche la page du checkout.'
    ],
    'profile' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/profile',
        'class' => ReplicateController::class,
        'action' => 'profile',
        'info' => 'Affiche la page du profile.'
    ],
    'contact' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/contact',
        'class' => ReplicateController::class,
        'action' => 'contact',
        'info' => 'Affiche le formulaire de contact.'
    ],
    'privacy' => [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/privacy',
        'class' => ReplicateController::class,
        'action' => 'privacy',
        'info' => 'Affiche les mentions légales du site.'
    ],
    'dashboard' => [
        'access' => 'web',
        'privacy' => 'private',
        'method' => 'get',
        'route' => '/dashboard',
        'class' => ReplicateController::class,
        'action' => '',
        'info' => 'Page d\'accueil du Backend.'
    ],
    'connect' => [
        'access' => 'api',
        'privacy' => 'public',
        'method' => 'post',
        'route' => '/api/connect',
        'class' => ReplicateController::class,
        'action' => 'connect',
        'info' => 'Connecte un utilisateur.'
    ],
    'disconnect' => [
        'access' => 'api',
        'privacy' => 'private',
        'method' => 'post',
        'route' => '/api/disconnect',
        'class' => ReplicateController::class,
        'action' => 'disconnect',
        'info' => 'Déconnecte un utilisateur.'
    ],
    'apidoc'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/apidoc',
        'class' => ReplicateController::class,
        'action' => 'apidoc',
        'info' => 'Documentation classe MvcUI.'
    ],
    'dbdoc'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/dbdoc',
        'class' => ReplicateController::class,
        'action' => 'dbdoc',
        'info' => 'Documentation de la base de données northwind.'
    ],
    'relationsdoc'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/relationsdoc',
        'class' => ReplicateController::class,
        'action' => 'relationsdoc',
        'info' => 'Documentation relations base de données.'
    ],

    'redirectpagination'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/demo/redirectpagination',
        'allowed_params_regex' => 'int+',
        'elements_per_page' => 12,
        'class' => DemoController::class,
        'action' => 'redirectPaginateDemo',
        'info' => 'Exemple de pagination redirigée.'
    ],
    'ajaxpagination'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/demo/ajaxpagination',
        'allowed_params_regex' => 'int+',
        'class' => DemoController::class,
        'action' => 'ajaxPaginateDemo',
        'info' => 'Exemple de pagination gérée en Ajax.'
    ],
    'productslist'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/demo/productslist',
        'class' => DemoController::class,
        'action' => 'productslist',
        'info' => 'Demo scroll infini.'
    ],
    'productsbycategory'=> [
        'access' => 'web',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/productsbycategory',
        'class' => DemoController::class,
        'action' => 'productsByCategory',
        'info' => 'Demo blog.'
    ],
    'clientslist'=> [
        'access' => 'api',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/api/clients',
        'allowed_params_regex' => 'int+',
        'elements_per_page' => 8,
        'class' => DemoController::class,
        'action' => 'clientslist',
        'info' => 'Requête une liste de clients paginée en base de données.'
    ],
    'products' => [
        'access' => 'api',
        'privacy' => 'public',
        'method' => 'get',
        'route' => '/api/products',
        'allowed_params_regex' => 'int+',
        'elements_per_page' => 3,
        'class' => DemoController::class,
        'action' => 'infinitescroll',
        'info' => 'Renvoie un partiel de produits.'
    ]
];