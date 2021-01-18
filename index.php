<?php

use App\Controller\IndexController;
use App\Controller\AdminController;
use App\Controller\InscriptionController;
use App\Controller\ConnexionController;
use App\Controller\ArticleController;
use App\Controller\ArticlesController;
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
        new IndexController;
    } elseif ($page == 'admin') {
        // Controller Admin
        $adminpage = new AdminController;
    } elseif ($page == 'inscription') {
        // Controller Inscription
        $inscriptionpage = new InscriptionController;
    } elseif ($page == 'connexion') {
        // Controller Connexion
        $connexionpage = new ConnexionController;
    } elseif ($page == 'article') {
        // Controller Article
        if (isset($_GET['id']) && ((int) $_GET['id'] > 0)) {
            $articlepage = new ArticleController($_GET['id']);
        } else {
            throw new Exception('Article id has to be a positif integrer, id provided' . $_GET['id']);
        }
    } elseif ($page == 'articles') {
        // Controller Articles
        new ArticlesController;
    } elseif ($page == 'creer-article') {
        // Controller Creer-Article
        $creerarticlepage = new CreerarticleController;
<<<<<<< HEAD
        $creerarticlepage->render();
    }elseif ($page == 'profil'){
=======
    } elseif ($page == 'profil') {
>>>>>>> lecture
        // Controller Profil
        $profilpage = new ProfilController;
    }
} else {
    new IndexController;
}
