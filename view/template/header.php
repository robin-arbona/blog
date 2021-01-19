<?php

/**
 * Un bouton de retour vers la page d’accueil, une liste déroulante contenant 
 * les différentes catégories d’articles, si l’utilisateur n’est pas connecté : une 
 * page d’inscription et une page de connexion, sinon une page permettant de
 * modifier son profil et une permettant de se déconnecter. Si l’utilisateur a
 * les droits de modérateur, il doit avoir accès à la page creer-article, si il est 
 * administrateur, il peut également accéder à la page admin. Le header doit
 * être présent dans chacune des pages du blog.

 * 
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Blog</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script><!--Pour editer article-->
    <script>tinymce.init({selector: '.edit'});
    </script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between " style='background-color: #e3f2fd'>
            <ul class="nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary">Home</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Connexion</a> <!-- Ou Profil si session true-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inscription</a> <!-- Ou Deconnexion si session true -->
                </li>
            </ul>
            <ul class="nav nav-pills ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Articles</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">catégorie1</a>
                        <a class="dropdown-item" href="#">catégorie2</a>
                        <a class="dropdown-item" href="#">catégorie3</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="#">publier un article</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Admin</a>
                </li>
            </ul>
        </nav>
    </header>