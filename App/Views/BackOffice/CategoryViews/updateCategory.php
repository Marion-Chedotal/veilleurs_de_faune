<?php 
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>


<!-- display controller's message when updating -->
<div class="mt-5 text-center font-italic font-bold message">
  <?php 
    if (!empty($message)) {
      echo $message;
    } 
  ?>
</div>

<!-- return -->
<div class="d-flex mt-4">
  <a title="Retournez à la page d'accueil" href="admin.php?action=findAllCategories">
    <img class="crudIcon" src="Public/img/back.png" alt="icone retour en arrière">
  </a>
</div>

<h2 class="text-center mb-5">Modifier une catégorie</h2>
<!-- Form to modify category  -->
<form action="admin.php?action=updateCategory&idCategory=<?php echo $category->idCategory; ?>" method="post" role="form">

  <!-- Name of the category -->
  <div class="mt-2 form-group">
    <label for="changeNameCategory">Nom:</label>
    <input type="text" class="form-control" id="changeNameCategory" name="name" placeholder="Modifier le nom de la catégorie"
      value="<?php echo $category->name; ?>">
  </div>

  <!-- Picture  -->
  <div class="mt-4 form-group">
    <label for="changePictureCategory">Photo actuelle: <?php echo $category->picture;?></label>
    <input type="file" class="form-control-file" id="changePictureCategory" name="picture">
  </div>

  <!-- Picture credit  -->
  <div class="mt-4 form-group">
    <label for="changePictureCreditCategory">Crédit Photo: </label>
    <input type="text" class="form-control" id="changePictureCreditCategory" name="pictureCredit"
      placeholder="Modifier le crédit photo" value="<?php echo $category->pictureCredit;?>">
  </div>

  <!-- description of the category -->
  <div class="mt-4 form-group">
    <label for="changeContentCategory">Description </label>
    <textarea class="form-control" rows="5" id="changeContentCategory" name="content"
      placeholder="Modifier la description de la catégorie"><?php echo $category->content; ?></textarea>
  </div>

  <!-- Button to open modal box -->
  <div class="text-center mt-5">
    <button id="confirmCategoryUpdate" type="button" class="btn mt-3">Mettre à jour</button>
  </div>

  <!-- Modal box to confirm the update -->
  <div class="modal fade" tabindex="-1" role="dialog" id="modalCategoryUpdate">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>Etes-vous sûr de vouloir modifier la catégorie <?php echo $category->name; ?> </p>
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