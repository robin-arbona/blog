<?php

/**
 * Il contient un accès aux différentes pages. Il doit être inclus dans toutes les 
 *  pages du blog.
 */
?>

<footer class="">
   <nav class="navbar navbar-expand-lg bg-dark justify-content-around ">
      <ul class="nav flex-column">
         <li class="nav-item">
            <a class="nav-link" href="index.php">Acceuil</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a> <!-- Ou Profil si session true-->
         </li>
         <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a> <!-- Ou Deconnexion si session true -->
         </li>
      </ul>
      <ul class="nav flex-column">
         <li class="nav-item">
            <a class="nav-link" href="articles.php">Articles</a>
         </li>

      </ul>
      <ul class="nav flex-column">
         <li class="nav-item">
            <a class="nav-link " href="creer-article.php">Create Article</a>
            <!--Activer si droit-->
         </li>
         <?php if (isset($_SESSION['id_droits']) && $_SESSION['id_droits'] == 1337) { ?>

            <li class="nav-item">
               <a class="nav-link" href="admin.php">Admin</a>
            </li>

         <?php } ?>

      </ul>
   </nav>
</footer>

</body>

</html>