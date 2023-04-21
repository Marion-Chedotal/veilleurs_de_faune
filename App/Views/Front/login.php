<?php
  include('./App/Views/Front/Layout/head.php') ;
  include('./App/Views/Front/Layout/header.php') ;
?>

<div class="row">
  <div class="col-md-6 col-12">

    <!-- when you're in small device (flex-wrap), show up this message to go to the inscription part -->
    <div class="text-center d-md-none .d-lg-block mt-5">
      <h2>Vous n'êtes pas encore inscrit?</h2>
      <a href="#register" title="s'inscrire" id="registerAnchor">C'est par ICI</a>
    </div>

    <!-- login form -->
    <form action="index.php?action=login" method="post" role="form">

      <div class="d-flex justify-content-center align-items-center mt-2">
        <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
        <p>Se connecter </p>
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
        <label for="logPseudoUser">Pseudo :</label>
        <input type="text" class="form-control" id ="logPseudoUser" name="pseudo" placeholder="Votre pseudo" required>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe :</label>
        <input type="password" name="password" class="form-control" placeholder="Votre mot de passe"
          required>
      </div>

      <!-- submit login form -->
      <div class="text-center my-5">
        <button type="submit" class="btn">Se connecter</button>
      </div>
    </form>
  </div>

  <div class="col-md-6 col-12">

    <!-- create Account form -->
    <form action="index.php?action=createAccount" method="post" role="form">

      <!-- display controller's message when creating account -->
      <div class="mt-3 text-center font-italic font-bold message">
        <?php 
          if (!empty($registerMessage)) { 
            echo $registerMessage; 
          } 
        ?>
      </div>

      <div class="d-flex justify-content-center align-items-center mt-2">
        <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
        <p id="register">Créer mon compte </p>
        <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
      </div>

      <!-- Pseudo -->
      <div class="form-group">
        <label for="CreatePseudoUser">Pseudo :</label>
        <input type="text" class="form-control" id="CreatePseudoUser" name="pseudo" placeholder="Indiquer un pseudo" required>
        <small class="text-muted font-italic"> Le pseudo doit comprendre au minimum 8 caractères et des caractères
          alphanumériques (chiffres, minuscules et majuscules).</small>
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="CreateEmailUser">Email :</label>
        <input type="email" name="email" id="CreateEmailUser" class="form-control" placeholder="Indiquer votre email"
        required>
        <small class="text-muted font-italic">Format de l'email attendu: example@kercode.com </small>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="CreatePasswordUser">Mot de passe :</label>
        <input type="password" name="password" id="CreatePasswordUser" class="form-control"
          placeholder="Indiquer votre mot de passe" required>
        <small class="text-muted font-italic"> Le mot de passe doit comprendre au minimum 8 caractères et des caractères
          alphanumériques (chiffres, minuscules et majuscules).</small>
      </div>

      <!-- submit creation account -->
      <div class="text-center mt-5">
        <button type="submit" class="btn">Inscription</button>
      </div>

    </form>
  </div>
</div>

<?php 
  include('./App/Views/Front/Layout/footer.php') ;
?>