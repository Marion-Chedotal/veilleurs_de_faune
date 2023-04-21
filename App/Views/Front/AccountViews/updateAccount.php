<?php
    include('./App/Views/Front/Layout/head.php') ;
    include('./App/Views/Front/Layout/header.php') ;
?>

<!-- display controller's message when modifying -->
<div class="mt-5 text-center font-italic font-bold message">
    <?php 
        if (!empty($message)) {
            echo $message;
        } 
    ?>
</div>

<div class="d-flex justify-content-center align-items-center mt-2 text-center">
    <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
    <h2>Modifier mon compte <span><?php echo $account->pseudo; ?></span></h2>
    <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
</div>

<!-- Form to modify account -->
<form action="index.php?action=updateAccount&idAccount=<?php echo $account->idAccount; ?>" method="post" role="form">

    <!-- Pseudo -->
    <div class="mt-2 form-group">
        <label for="changePseudoUser">Pseudo:</label>
        <input type="text" class="form-control col-8" id="changePseudoUser" name="pseudo" placeholder="Modifier mon pseudo"
            value="<?php echo $account->pseudo; ?>">
        <small class="text-muted font-italic"> Le pseudo doit comprendre entre 8 et 12 caractères et des caractères
            alphanumériques (chiffres, minuscules et majuscules).</small>
    </div>

    <!-- email -->
    <div class="mt-5 form-group">
        <label for="changeEmailUser">Email:</label>
        <input type="text" class="form-control col-8" id="changeEmailUser" name="email" placeholder="Modifier mon email"
            value="<?php echo $account->email; ?>">
        <small class="text-muted font-italic">Format de l'email attendu: example@kercode.com </small>
    </div>

    <!-- new password -->
    <div class="mt-5 form-group">
        <label for="changePasswordUser">Nouveau mot de passe :</label>
        <input type="password" class="form-control col-8" id="changePasswordUser" name="newPassword"
            placeholder="Indiquer votre nouveau mot de passe">
        <small class="text-muted font-italic"> Le mot de passe doit comprendre au minimum 8 caractères et des caractères
            alphanumériques (chiffres, minuscules et majuscules).</small>
    </div>

    <div class="text-center mt-5">
        <button type="submit" class="btn">Modifier mon compte</button>
    </div>
</form>

<?php 
    include('./App/Views/Front/Layout/footer.php') ;
?>