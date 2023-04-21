<?php 
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>


<!-- display controller's message on myaccount -->
<div class="mt-5 text-center font-italic font-bold message">
  <?php 
    if (!empty($message)) {
      echo $message;
    } 
  ?>
</div>

<h3 class="text-center m-5">Liste des catégories existantes:</h3>

<!-- add category -->
<div class="d-flex justify-content-center mb-5">
  <div class="clickToAdd d-flex px-5">
    <p class="mt-2"> Ajouter une catégorie: </p>
    <a title="Ajouter une catégorie" href="admin.php?action=createCategory"><img class="pl-5"
        src="Public/img/ajouter.png" alt="icone ajout"></a>
  </div>
</div>

<!-- display category -->
<div class="row">

  <!--foreach loop to display the picture, name and icon to interact with all the categories  -->
  <?php foreach ($categories as $category) : ?>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
      <div class="card h-100">
        <img class="card-img-top imgRatio img-fluid mx-auto"
          src="Public/img/<?php echo $category['picture']; ?>" alt="animal d'une catégorie"
          title="Crédit Photo: <?php echo $category['pictureCredit'];?>">
        <div class="card-body d-flex flex-column justify-content-between">
          <!-- mb_strtoupper: to->Uppercase mb->manage é maj -->
          <h2 class="card-title text-center"><?php echo mb_strtoupper($category['name']); ?></h2>
          <div class="d-flex justify-content-between">

            <!-- Button for modal box to READ one category-->
            <button type="button" class="btnModal" data-toggle="modal"
              data-target="#readCatModalBack<?php echo $category['idCategory']; ?>">
              <img class="crudIcon" src="Public/img/voir.png" alt="icone oeil">
            </button>

            <!-- icons to modify -->
            <a title="Modifier la catégorie"
              href="admin.php?action=readCategory&idCategory=<?php echo $category['idCategory']; ?>">
              <img class="crudIcon" src="Public/img/modifier.png" alt="icone modification">
            </a>
            
            <!-- button to delete: modal box -->
            <button type="button" id="confirmCategoryDelete" class="btnModal confirmCategoryDelete"
            data-id="<?php echo $category['idCategory']; ?>">
              <img class="crudIcon" src="Public/img/poubelle.png" alt="icone poubelle">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal box: READ -->
    <div class="modal fade" id="readCatModalBack<?php echo $category['idCategory']; ?>" tabindex="-1"
      aria-labelledby="getCatModalBack" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="getCatModalBack">Catégorie: <?php echo $category['name']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body row text-center">
            <img class="imgRatio mx-auto my-4" src="Public/img/<?php echo $category['picture']; ?>"
              alt="photo catégorie d'animal">
            <p><?php echo $category['content']; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal box to confirm the removal -->
    <div class="modal fade" id="modalCategoryDelete-<?php echo $category['idCategory']; ?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4>Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-center">
            <p>Etes-vous sûr de vouloir supprimer cette catégorie: <span><?php echo $category['name']; ?>?</span></p>
          </div>
          <div class="modal-footer">
            <a href="admin.php?action=deleteCategory&idCategory=<?php echo urlencode($category['idCategory']); ?>" title="supprimer?"
              class="btn"> Supprimer</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- go top -->
<div>
  <a title="Remonter en haut de la page" href="admin.php?action=findAllCategories">
    <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
  </a>
</div>

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