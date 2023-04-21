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

<h3 class="text-center m-5">Liste des espèces existantes:</h3>

<div class="d-flex justify-content-center mb-5">
  <div class="clickToAdd d-flex px-5">
    <p class="mt-2"> Ajouter une espèce: </p>
    <a title="Ajouter une espèce" href="admin.php?action=createSpecies">
      <img class="pl-5" src="Public/img/ajouter.png" alt="icone ajout">
    </a>
  </div>
</div>

<!-- form to select species by category -->
<form class="filterSpeciesByCategoryForm" action="admin.php?action=findSpeciesByCategory" method="post" role="form">
  <div class="form-group">
    <label for="selection">Filtrer par catégorie d'animaux: </label>
    <select name="idCategory" class="filterSpeciesByCategorySelect form-control">
      <?php
        foreach($categories as $category) {
          echo '<option value="' . $category['idCategory'] . '">' . $category['name'] . '</option>';
        } ?>
      echo '<option value="all">Toutes les catégories</option>';
    </select>
  </div>
</form>

<div class="row">
  <!--foreach loop to display the picture, name and icon to interact with all the Species  -->
  <?php foreach ($speciesByCat as $species) : ?>
    <div class="col-lg-4 col-md-6 col-sm-12 my-5">
      <div class="card h-100">
        <img class="card-img-top imgRatio img-fluid mx-auto" alt="img de l'espèce" src="Public/img/<?php echo $species['picture']; ?>"
        alt="animal d'une catégorie" title="Crédit Photo: <?php echo $species['pictureCredit'];?>">
        <div class="card-body d-flex flex-column  justify-content-between">
          <h2 class="card-title text-center font-italic"><?php echo $species['scientificName']; ?></h2>
          <h2 class="card-title text-center"><?php echo $species['commonName']; ?></h2>
          <div class="d-flex justify-content-between">

            <!-- Button for modal box to READ one Species-->
            <button type="button" class="btnModal" data-toggle="modal"
            data-target="#readSpeciesModal<?php echo $species['idSpecies']; ?>">
              <img class="crudIcon" src="Public/img/voir.png" alt="icone oeil">
            </button>

            <!-- icons to modify -->
            <a title="Modifier l'espèce'"
            href="admin.php?action=readForUpdateSpecies&idSpecies=<?php echo $species['idSpecies']; ?>">
              <img class="crudIcon" src="Public/img/modifier.png" alt="icone modification">
            </a>

            <!-- button to delete: modal box -->
            <button type="button" id="confirmSpeciesDelete" class="btnModal confirmSpeciesDelete"
            data-id="<?php echo $species['idSpecies']; ?>">
              <img class="crudIcon" src="Public/img/poubelle.png" alt="icone poubelle">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal box: READ -->
    <div class="modal fade" id="readSpeciesModal<?php echo $species['idSpecies']; ?>" tabindex="-1"
      aria-labelledby="getSpeciesModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex flex-column align-items-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="getSpeciesModal">Espèce: <span><?php echo $species['scientificName']; ?></span>
            </h5>
            <h5 class="modal-title"><?php echo $species['commonName']; ?></h5>
          </div>
          <div id="contentSpeciesModal" class="modal-body d-flex flex-column">
            <img class="imgRatio mx-auto my-4" src="Public/img/<?php echo $species['picture']; ?>"
              alt="photo catégorie d'animal">
            <p><span>Description: </span></p>
            <p><?php echo $species['content']; ?></p>
            <p><span>Statut de conservation en Bretagne:</span> <?php echo $species['bretagneStatus']; ?></p>
            <p><span>Statut de conservation en France:</span> <?php echo $species['franceStatus']; ?></p>
            <p><span>Statut de conservation dans le monde:</span> <?php echo $species['worldStatus']; ?></p>
            <p><span>Poids:</span> <?php echo $species['height']; ?> cm</p>
            <p><span>Taille: </span><?php echo $species['weight']; ?> gr</p>
            <p><span>Régime alimentaire: </span></p>
            <p><?php echo $species['diet']; ?></p>
            <p><span>Menaces:</span></p>
            <p><?php echo $species['threats']; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal box to confirm the removal -->
    <div class="modal fade" id="modalSpeciesDelete-<?php echo $species['idSpecies']; ?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Etes-vous sûr de vouloir supprimer cette espèces: <span><?php echo $species['commonName']; ?>?</span></p>
          </div>
          <div class="modal-footer">
            <a href="admin.php?action=deleteSpecies&idSpecies=<?php echo urlencode($species['idSpecies']); ?>"
              title="supprimer?" class="btn"> Supprimer</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
          </div>
        </div>
      </div>
    </div>
  <?php  endforeach;?>
</div>

<!-- go top -->
<a title="Remonter en haut de la page" href="admin.php?action=findSpeciesByCategory">
  <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
</a>

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