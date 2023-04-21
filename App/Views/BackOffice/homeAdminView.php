<?php
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>

<main role="main" class="no-gutters">
  <!-- ?= $account['name'] ?> -->
  <h3 class="mt-5 mb-5 text-center">Bienvenue <span><?php echo $_SESSION['pseudo']; ?></span>! </h3>

  <section class="row justify-content-center access">

    <!-- cards action of the admin 1) Category-->
    <div class="col-lg-4 card text-center m-4">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Accès Catégories</h5>
        <p class="card-text">Listing de l'ensemble des catégories d'espèces, accès à leur mise à jour (ajout,
          suppression, modification des datas etc..). </p>
        <a title="gérer les catégories" href="admin.php?action=findAllCategories" class="btn">Accéder aux Catégories</a>
      </div>
    </div>

    <!-- 2) Species -->
    <div class="col-lg-4 card text-center m-4 ">
      <div class="card-body ">
        <h5 class="card-title font-weight-bold">Accès Espèces:</h5>
        <p class="card-text">Listing de l'ensemble des espèces répertoriées sur le site, accès à leur mise à jour
          (ajout, suppression, modification des datas etc..).</p>
        <a title="Gérer les espèces" href="admin.php?action=findSpeciesByCategory" class="btn">Accéder aux Espèces</a>
      </div>
    </div>

    <!-- 3) Observations -->
    <div class="col-lg-4 card text-center m-4">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Section Observations</h5>
        <p class="card-text">Listing de l'ensemble les observations ajoutées par les utilisateurs</p>
        <a title="Voir les observations" href="admin.php?action=findAllObservations" class="btn">Accéder aux
          Observations</a>
      </div>
    </div>

    <!-- 4) Messagerie -->
    <div class="col-lg-4 card text-center m-4">
      <div class="card-body">
        <h5 class="card-title font-weight-bold">Accès Messagerie</h5>
        <p class="card-text">Permet de lire les messages envoyés par les utilisateurs</p>
        <a title="Gérer les messages" href="admin.php?action=findAllMessages" class="btn">Accéder à la messagerie</a>
      </div>
    </div>
  </section>

  <!-- go top -->
  <a title="Remonter en haut de la page" href="admin.php">
    <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
  </a>
</main>

<!-- access permit only for admin account -->
<?php 
  } else { 
?>
<div class="text-center my-5">
  <h2>Vous devez êtes connecté en tant qu'administrateur pour accéder à cette page</h2>
  <a href="admin.php?action=login" title="bouton se connecter" class="btn mt-5"> Se connecter</a>
  <?php 
    } ; 
  ?>
</div>

<?php
  include('./App/Views/BackOffice/Layout/footerAdmin.php') ;
?>