<?php 
    include('./App/Views/BackOffice/Layout/headAdmin.php') ;
    include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>


<!-- display controller's message when add category-->
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

<h2 class="text-center mb-5">Ajout d'une catégorie d'espèce</h2>
<!-- Form to add category -->
<form action="admin.php?action=createCategory" method="post" role="form">

    <!-- Name of the category -->
    <div class="mt-2 form-group">
        <label for="addNameCategory">Nom de la catégorie</label>
        <input type="text" class="form-control" id="addNameCategory" name="name" placeholder="Indiquer le nom de la catégorie"
            required value="<?php echo $_POST['name'] ?? '';?>">
    </div>

    <!-- Picture  -->
    <div class="mt-4 form-group">
        <label for="addPictureCategory">Insérer une photo</label>
        <input type="file" class="form-control-file" id="addPictureCategory" name="picture"
            value="<?php echo $_POST['picture'] ?? '';?>">
    </div>

    <!-- Picture credit  -->
    <div class="mt-4 form-group">
        <label for="addPictureCreditCategory">Crédit Photo: </label>
        <input type="text" class="form-control" id="addPictureCreditCategory" name="pictureCredit"
            placeholder="Indiquer le crédit photo" value="<?php echo $_POST['pictureCredit'] ?? '';?>">
    </div>

    <!-- description of the category -->
    <div class="mt-4 form-group">
        <label for="addContentCategory">Description de la catégorie</label>
        <textarea class="form-control" rows="5" id="addContentCategory" name="content" placeholder="Décrire la classe brièvement"
            required value="<?php echo $_POST['content'] ?? '';?>"></textarea>
    </div>

    <!-- submit -->
    <div class="text-center mt-5">
        <button type="submit" class="btn mb-5">Ajouter la catégorie</button>
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