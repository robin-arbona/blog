<?php

/**
 * Il contient un accès aux différentes pages. Il doit être inclus dans toutes les 
 *  pages du blog.
 */
?>

<footer>
    <nav class="navbar navbar-expand-lg bg-dark justify-content-around " >
       <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link" href="#">Acceuil</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Connexion</a> <!-- Ou Profil si session true-->
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Inscription</a> <!-- Ou Deconnexion si session true -->
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
               <a class="nav-link" href="#">Articles</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Commentaires</a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
               <a class="nav-link disabled" href="#">Create Article</a> <!--Activer si droit-->
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#">Admin</a> <!--Activer si droit-->
            </li>
        </ul>
    </nav>
</footer>

</body>

</html>