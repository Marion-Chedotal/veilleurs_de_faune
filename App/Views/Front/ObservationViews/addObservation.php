<?php 
    include('./App/Views/Front/Layout/head.php') ;
    include('./App/Views/Front/Layout/header.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isUserLogged']) || !empty($_SESSION['isAdmin'])) { ;?>

<!-- display controller's message when add observation done -->
<div class="mt-5 text-center font-italic font-bold message">
    <?php 
        if (!empty($message)) {
            echo $message;
        }       
    ?>
</div>

<div class="d-flex mt-4">
    <a title="Retournez à la page d'accueil" href="index.php?action=findAllObservations">
        <img class="crudIcon" src="Public/img/back.png" alt="icone retour en arrière">
    </a>
</div>

<h2 class="text-center mb-5">Ajout d'une observation</h2>

<!-- Form to add species observation -->
<form action="index.php?action=createObservation" class="filterSpeciesByCategoryForm" method="post" role="form">

    <!-- Choose the category of the species observed -->
    <div class="mt-4 form-group">
        <label for="filterSpecies">Indiquer la catégorie de l'espèce observée</label>
        <select id="filterSpecies" name="idCategory" class="form-control">
            <?php 
                foreach ($categories as $category) {
                    echo '<option value="' . $category['idCategory'] . '">' . $category['name'] . '</option>';
                }
            ?>
        </select>
    </div>

    <!-- Choose the species observed -->
    <div class="mt-4 form-group">
        <label for="foundSpeciesByCat">Indiquer l'espèce observée</label>
        <select id="foundSpeciesByCat" name="idSpecies" class="form-control">
            <?php 
                foreach ($speciesByCat as $species) {
                    echo '<option value="' . $species['idSpecies'] . '">' . $species['commonName'] . '</option>';   
                }
            ?>
        </select>
    </div>

    <!-- Date of the observation -->
    <div class="mt-2 form-group">
        <label for="observationdate">Date: </label>
        <input type="datetime-local" class="form-control" id="observationdate" name="date"
            required
            value="<?php echo $_POST['date'] ?? '';?>">
    </div>

    <!-- Department -->
    <div class="mt-4 form-group">
        <label for="obersvationDepartment">Département</label>
        <select class="custom-select" id="obersvationDepartment" name="department">
            <option selected>Sélectionner le département</option>
            <option value="Côtes d'Armor (22)">Côtes d'Armor (22)</option>
            <option value="Finistère (29)">Finistère (29)</option>
            <option value="Ille-et-Vilaine (35)">Ille-et-Vilaine (35)</option>.
            <option value="Morbihan (56)">Morbihan (56)</option>
        </select>
    </div>

    <!-- Location  -->
    <div class="mt-4 form-group">
        <label for="observationLocation">Ville: </label>
        <input type="text" class="form-control" id="observationLocation" name="location" placeholder="Indiquer la ville"
            value="<?php echo $_POST['location'] ?? '';?>">
    </div>

    <!-- Counting -->
    <div class="mt-4 form-group">
        <label for="observationCounting">Recensement: </label>
        <input type="text" class="form-control" id="observationCounting" name="counting"
            placeholder="Combien d'animaux avez-vous observé?" required value="<?php echo $_POST['counting'] ?? '';?>">
    </div>

    <!-- Picture  -->
    <div class="mt-4 form-group">
        <label for="observationPicture">Insérer une photo</label>
        <input type="file" class="form-control-file" id="observationPicture" name="picture"
            value="<?php echo $_POST['picture'] ?? '';?>">
    </div>

     <!-- Picture credit  -->
     <div class="mt-4 form-group">
        <label for="observationPictureCredit">Crédit Photo: </label>
        <input type="text" class="form-control" id="observationPictureCredit" name="pictureCredit"
            placeholder="Indiquer le crédit photo" value="<?php echo $_POST['pictureCredit'] ?? '';?>">
    </div>
    
    <!-- Comments -->
    <div class="mt-4 form-group">
        <label for="observationComments">Commentaires sur cette observation</label>
        <textarea class="form-control" rows="5" id="observationComments" name="comments"
            placeholder="Décrire les conditions de l'observation, et vos commentaires" required
            value="<?php echo $_POST['comments'] ?? '';?>"></textarea>
    </div>

    <!-- submit -->
    <div class="text-center mt-5">
        <button type="submit" class="btn mb-5">Valider l'observation</button>
    </div>
</form>

<!-- access permit only with account -->
<?php 
    } else { 
?>
<div class="text-center my-5">
    <h2>Vous devez êtes connecté pour accéder à votre compte</h2>
    <a href="index.php?action=login" title="bouton se connecter" class="btn mt-5"> Se connecter</a>
    <?php } ;
  ?>
</div>

<?php    
    include('./App/Views/Front/Layout/footer.php') ;
?>