<?php 
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>

<!-- Message wich confirm the modification when submit done -->
<div class="mt-5 text-center font-italic font-bold message">
  <?php 
    if (!empty($message)) {
      echo $message;
    } 
  ?>
</div>

<!-- return -->
<div class="d-flex mt-4">
  <a title="Retournez à la page d'accueil" href="admin.php?action=findSpeciesByCategory">
    <img class="crudIcon" src="Public/img/back.png" alt="icone retour en arrière">
  </a>
</div>

<h2 class="text-center mb-5">Modifier une espèce</h2>
<!--     ------- Form to modify species category  -------    -->
<form action="admin.php?action=updateSpecies&idSpecies=<?php echo $species->idSpecies; ?>" method="post" role="form">

  <!-- ScientificName of the species -->
  <div id="getIdCategoryForm" class="mt-2 form-group">
    <input type="text" class="form-control" name="idSpecies" value="<?php echo $species->idSpecies; ?>">
  </div>
  <div class="mt-2 form-group">
    <label for="changeScientificNameSpecies">Nom scientifique:</label>
    <input type="text" class="form-control" id="changeScientificNameSpecies" name="scientificName"
      placeholder="Modifier le nom scientifique de l'espèce'" value="<?php echo $species->scientificName; ?>">
  </div>

  <!-- commonName of the species -->
  <div class="mt-2 form-group">
    <label for="changeCommonNameSpecies">Nom commun:</label>
    <input type="text" class="form-control" id="changeCommonNameSpecies" name="commonName"
      placeholder="Modifier le nom commun de l'espèce'" value="<?php echo $species->commonName; ?>">
  </div>

  <!-- Picture  -->
  <div class="mt-4 form-group">
    <label for="changePictureSpecies">Photo actuelle: <?php echo $species->picture;?></label>
    <input type="file" class="form-control-file" id="changePictureSpecies" name="picture">
  </div>

  <!-- Picture credit  -->
  <div class="mt-4 form-group">
    <label for="changePictureCreditSpecies">Crédit Photo: </label>
    <input type="text" class="form-control" id="changePictureCreditSpecies" name="pictureCredit"
      placeholder="Modifier le crédit photo" value="<?php echo $species->pictureCredit;?>">
  </div>

  <!-- description of the species -->
  <div class="mt-4 form-group">
    <label for="changeContentSpecies">Description </label>
    <textarea class="form-control" rows="5" id="changeContentSpecies" name="content"
      placeholder="Modifier la description"><?php echo $species->content; ?></textarea>
  </div>

  <!-- Bretagne status preservation of the species -->
  <div class="mt-4 form-group">
    <label for="changeBretagneStatusSpecies">Statut de conservation de l'espèce en Bretagne</label>
    <textarea class="form-control" rows="5" id="changeBretagneStatusSpecies" name="bretagneStatus"
      placeholder="Modifier le statut en Bretagne"><?php echo $species->bretagneStatus; ?></textarea>
  </div>

  <!-- France status preservation of the species -->
  <div class="mt-4 form-group">
    <label for="changeFranceStatusSpecies">Statut de conservation de l'espèce en France</label>
    <textarea class="form-control" rows="5" id="changeFranceStatusSpecies" name="franceStatus"
      placeholder="Modifier le statut en France"><?php echo $species->franceStatus; ?></textarea>
  </div>

  <!-- World status preservation of the species -->
  <div class="mt-4 form-group">
    <label for="changeWorldStatusSpecies">Statut de conservation de l'espèce dans le monde</label>
    <textarea class="form-control" rows="5" id="changeWorldStatusSpecies" name="worldStatus"
      placeholder="Modifier le statut dans le monde"><?php echo     $species->worldStatus; ?></textarea>
  </div>

  <!-- Data: Height of the species -->
  <div class="mt-4 form-group">
    <label for="changeHeightSpecies">Taille moyenne</label>
    <input type="text" class="form-control" id="changeHeightSpecies" name="height" placeholder="Modifier la taille'"
      value="<?php echo $species->height; ?>">
  </div>

  <!-- Data: Weight of the species -->
  <div class="mt-4 form-group">
    <label for="changeWeightSpecies">Poids moyen</label>
    <input type="text" class="form-control" id="changeWeightSpecies" name="weight" placeholder="Modifier le poids'"
      value="<?php echo $species->weight; ?>">
  </div>

  <!-- Diet of the species -->
  <div class="mt-4 form-group">
    <label for="changeDietSpecies">Régime alimentaire</label>
    <textarea class="form-control" rows="5" id="changeDietSpecies" name="diet"
      placeholder="Modifier le régime alimentaire"><?php echo $species->diet; ?></textarea>
  </div>

  <!-- Threats of the species -->
  <div class="mt-4 form-group">
    <label for="changeThreatsSpecies">Menaces</label>
    <textarea class="form-control" rows="5" id="changeThreatsSpecies" name="threats"
      placeholder="Modifier les menaces"><?php echo $species->threats; ?></textarea>
  </div>
  
  <!-- Find category -->
  <label for="changeIdCategorySpecies">Indiquer la catégorie de l'espèce</label>
  <select name="idCategory" id="changeIdCategorySpecies" class="form-control">
    <?php foreach ($categories as $category) {
        echo '<option value="' . $category['idCategory'] . '">' . $category['name'] . '</option>';
      }
    ?>
  </select>

  <!-- Modal box to confirm the update -->
  <div class="text-center mt-5">
    <button id="confirmSpeciesUpdate" type="button" class="btn mt-3">Mettre à jour</button>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="modalSpeciesUpdate">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>Etes-vous sûr de vouloir modifier l'espèce <?php  echo $species->commonName; ?> </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn">Confirmer</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>
</form>

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