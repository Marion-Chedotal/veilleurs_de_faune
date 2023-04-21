<?php
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- login form -->
<form action="admin.php?action=login" method="post">
  <div class="d-flex justify-content-center align-items-center mt-2">
    <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
    <p>Connexion Administrateur </p>
    <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
  </div>

  <!-- display controller's message when log ing -->
  <div class="mt-3 text-center font-italic font-bold message">
    <?php 
      if (!empty($message)) { 
        echo $message; 
      } 
    ?>
  </div>

  <!-- Pseudo -->
  <div class="form-group">
    <label for="logPseudoAdmin">Pseudo :</label>
    <input type="text" class="form-control" id ="logPseudoAdmin" name="pseudo" placeholder="Votre pseudo" required>
  </div>

  <!-- Password -->
  <div class="form-group">
    <label for="logPasswordAdmin">Mot de passe :</label>
    <input type="password" name="password" id="logPasswordAdmin" class="form-control" placeholder="Votre mot de passe"
      required>
  </div>

  <!-- submit login form -->
  <div class="text-center my-5">
    <button type="submit" class="btn">Se connecter</button>
  </div>
</form>

<?php
  include('./App/Views/BackOffice/Layout/footerAdmin.php') ;
?>