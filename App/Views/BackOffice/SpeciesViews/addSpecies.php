<?php 
    include('./App/Views/BackOffice/Layout/headAdmin.php') ;
    include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>

<!-- display controller's message when add species -->
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

<h2 class="text-center mb-5">Ajout d'une espèce</h2>
<!-- ------- Form to add species   -------  -->
<form action="admin.php?action=createSpecies" method="post" role="form">

    <!-- Choose the category of the species -->
    <div class="mt-4 form-group">
        <label for="addIdCategorySpecies">Indiquer la catégorie de l'espèce</label>
        <select id="addIdCategorySpecies" name="idCategory" class="form-control">
            <?php foreach ($categories as $category) {
                echo '<option value="' . $category['idCategory'] . '">' . $category['name'] . '</option>';
                }
            ?>
        </select>
    </div>

    <!-- Scientific name of the species -->
    <div class="mt-4 form-group">
        <label for="addScientificNameSpecies">Nom scientifique de l'espèce</label>
        <input type="text" class="form-control" id="addScientificNameSpecies" name="scientificName"
            placeholder="Exemple: Tritirus cristatus" required value="<?php  echo $_POST['scientificName'] ?? '';?>">
    </div>

    <!-- Common name of the species -->
    <div class="mt-4 form-group">
        <label for="addCommonNameSpecies">Nom commun de l'espèce</label>
        <input type="text" class="form-control" id="addCommonNameSpecies" name="commonName" placeholder="Exemple: Triton crêté"
            required value="<?php echo $_POST['commonName'] ?? '';?>">
    </div>

    <!-- Picture  -->
    <div class="mt-4 form-group">
        <label for="addPictureSpecies">Insérer une photo</label>
        <input type="file" class="form-control-file" id="addPictureSpecies" name="picture" required
            value="<?php echo $_POST['picture'] ?? '';?>">
    </div>

    <!-- Picture credit  -->
    <div class="mt-4 form-group">
        <label for="addPictureCreditSpecies">Crédit Photo: </label>
        <input type="text" class="form-control" id="addPictureCreditSpecies" name="pictureCredit"
            placeholder="Indiquer le crédit photo" value="<?php echo $_POST['pictureCredit'] ?? '';?>">
    </div>

    <!-- description of the species -->
    <div class="mt-4 form-group">
        <label for="addContentSpecies">Description de l'espèce</label>
        <textarea class="form-control" rows="5" id="addContentSpecies" name="content" placeholder="Décrire l'espèce brièvement"
            required value="<?php echo $_POST['content'] ?? '';?>"></textarea>
    </div>

    <!-- Bretagne status preservation of the species -->
    <div class="form-group mt-4">
        <label for="addBretagneStatusSpecies">Statut de conservation de l'espèce en Bretagne</label>
        <select id="addBretagneStatusSpecies" name="bretagneStatus" class="form-control">
            <option value="">Sélectionner un statut</option>
            <optgroup label="Menacée">
                <option>CR: En danger critique</option>
                <option>EN: En danger</option>
                <option>VU: Vulnérable</option>
            </optgroup>
            <optgroup label="Evaluée">
                <option>NT: Quasi-menacée</option>
                <option>LC: Préocuppation mineure</option>
            </optgroup>
            <optgroup label="Autres">
                <option>DD: Données insuffisantes</option>
                <option>NE: Non-évaluée</option>
                <option>NA: Non-applicable</option>
            </optgroup>
        </select>
    </div>

    <!-- France status preservation of the species -->
    <div class="form-group mt-4">
        <label for="addFranceStatusSpecies">Statut de conservation de l'espèce en France</label>
        <select id="addFranceStatusSpecies" name="franceStatus" class="form-control">
            <option value="">Sélectionner un statut</option>
            <optgroup label="Menacée">
                <option>CR: En danger critique</option>
                <option>EN: En danger</option>
                <option>VU: Vulnérable</option>
            </optgroup>
            <optgroup label="Evaluée">
                <option>NT: Quasi-menacée</option>
                <option>LC: Préocuppation mineure</option>
            </optgroup>
            <optgroup label="Autres">
                <option>DD: Données insuffisantes</option>
                <option>NE: Non-évaluée</option>
                <option>NA: Non-applicable</option>
            </optgroup>
        </select>
    </div>

    <!-- World status preservation of the species -->
    <div class="form-group mt-4">
        <label for="addWorldStatusSpecies">Statut de conservation de l'espèce dans le monde</label>
        <select id="addWorldStatusSpecies" name="worldStatus" class="form-control">
            <option value="">Sélectionner un statut</option>
            <optgroup label="Menacée">
                <option>CR: En danger critique</option>
                <option>EN: En danger</option>
                <option>VU: Vulnérable</option>
            </optgroup>
            <optgroup label="Evaluée">
                <option>NT: Quasi-menacée</option>
                <option>LC: Préocuppation mineure</option>
            </optgroup>
            <optgroup label="Autres">
                <option>DD: Données insuffisantes</option>
                <option>NE: Non-évaluée</option>
                <option>NA: Non-applicable</option>
            </optgroup>
        </select>
    </div>

    <!-- Data: Height of the species -->
    <div class="mt-4 form-group">
        <label for="addHeightSpecies">Taille moyenne</label>
        <input type="text" class="form-control" id="addHeightSpecies" name="height" placeholder="Exemple: 48 cm" required
            value="<?php echo $_POST['height'] ?? '';?>">
    </div>

    <!-- Data: Weight of the species -->
    <div class="mt-4 form-group">
        <label for="addWeightSpecies">Poids moyen</label>
        <input type="text" class="form-control" id="addWeightSpecies" name="weight" placeholder="Exemple: 500gr"
            value="<?php echo $_POST['weight'] ?? '';?>">
    </div>

    <!-- Diet of the species -->
    <div class="mt-4 form-group">
        <label for="addDietSpecies">Régime alimentaire</label>
        <textarea class="form-control" rows="5" id="addDietSpecies" name="diet"
            placeholder="Décrire le régime alimentaire de l'espèce" required
            value="<?php echo $_POST['diet'] ?? '';?>"></textarea>
    </div>

    <!-- Threats of the species -->
    <div class="mt-4 form-group">
        <label for="addThreatsSpecies">Menaces</label>
        <textarea class="form-control" rows="5" id="addThreatsSpecies" name="threats"
            placeholder="Décrire les raisons de l'extinction de l'espèce en Bretagne" required
            value="<?php echo $_POST['threats'] ?? '';?>"></textarea>
    </div>

    <!-- submit -->
    <div class="text-center mt-5">
        <button type="submit" class="btn">Ajouter l'espèce</button>
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