<?php

use App\Controller\IndexController;
use App\Controller\AdminController;
use App\Controller\InscriptionController;
use App\Controller\ConnexionController;
use App\Controller\ArticleController;
use App\Controller\CreerarticleController;
use App\Controller\ProfilController;

// Autoloader
function autoloader($class)
{
    $path = str_replace('\\', '/', $class) . '.php';
    require $path;
}
spl_autoload_register('autoloader');


// Rooter
if (!empty($_GET) && isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'index') {
        // Controller Index
        $homepage = new IndexController;
        $homepage->render();
    } elseif ($page == 'admin') {
        // Controller Admin
        $adminpage = new AdminController;
        $adminpage->render();
    }elseif ($page == 'inscription'){
        // Controller Inscription
        $inscriptionpage = new InscriptionController;
        $inscriptionpage->render();
    }elseif ($page == 'connexion'){
        // Controller Connexion
        $connexionpage = new ConnexionController;
        $connexionpage->render();
    }elseif ($page == 'article'){
        // Controller Article
        $articlepage = new ArticleController;
        $articlepage->render();
    }elseif ($page == 'creer-article'){
        // Controller Creer-Article
        $creerarticlepage = new CreerarticleController;
        $creerarticlepage->render();
    }elseif ($page == 'profil'){
        // Controller Profil
        $profilpage = new ProfilController;
        $profilpage->render();
    }
}
