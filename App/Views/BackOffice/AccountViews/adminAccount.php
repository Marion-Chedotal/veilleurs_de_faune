<?php
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account only -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>

<!-- display controller's message on myaccount -->
<div class="mt-5 text-center font-italic font-bold message">
  <?php 
    if (!empty($message)) {
      echo $message;
    } 
  ?>
</div>

<div class="d-flex justify-content-center align-items-center mt-2 text-center">
  <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
  <h2>Bienvenue sur ton compte <span><?php echo $_SESSION['pseudo'] ; ?></span></h2>
  <img src="Public/img/logo-account.png" alt="icone du site" class="accountImgRatio">
</div>

<!-- account information -->
<div class="d-flex flex-wrap justify-content-around">
  <div class="mt-5 ">
    <p>Mon pseudo: <span><?php echo $account->pseudo; ?></span></p>
    <p class="my-5">Mon adresse mail: <span><?php echo $account->email; ?></span></p>
  </div>
  <!-- account buttons: update, disconnect -->
  <div class="mt-5 d-flex flex-column">
    <a title="modifier mon compte" href="admin.php?action=readForUpdateAccount&idAccount=<?php echo $account->idAccount; ?>"
      class="btn btn-sm btnAccount mb-2">Modifier mon compte</a>
    <a title="me déconnecter" href="admin.php?action=logout" class="btn btn-sm btnAccount mb-2">Me deconnecter</a>
  </div>
</div>

<h3 class="my-5 text-center"><u><span>Mes observations </span></u></h3>
<table class="table table-hover table-responsive-xs">
  <thead>
    <tr class="align-items-center">
      <!-- in small device, hidd the 3 first column, to have more place because table is large -->
      <th scope="col" class="align-middle">Date</th>
      <th scope="col" class="align-middle">Espèce </th>
      <th scope="col" class="align-middle">Département</th>
      <th scope="col" class="d-none d-sm-table-cell align-middle">Ville</th>
      <th scope="col" class="d-none d-sm-table-cell align-middle">Recensement (unité)</th>
      <th scope="col" class="d-none d-sm-table-cell align-middle">Commentaires</th>
      <th scope="col" class="align-middle">Lire</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($observations as $observation) : ?>
      <tr>
        <td class="col-1"><?php echo $observation['date']; ?></td>
        <td class="col-1"><?php echo $observation['commonName']; ?></td>
        <td class="col-1"><?php echo $observation['department']; ?></td>
        <td class="col-1 d-none d-sm-table-cell"><?php echo $observation['location']; ?></td>
        <td class="col-1 d-none d-sm-table-cell"><?php echo $observation['counting']; ?></td>
        <td class="col-1 d-none d-sm-table-cell"><?php echo substr($observation['comments'], 0, 50); ?></td>

        <!-- Button for modal box ->Read the observation -->
        <td class="col-1">
          <button type="button" class="btnModal" data-toggle="modal"
            data-target="#readObsModalAdmin<?php echo $observation['idObservation']; ?>">
            <img class="crudIconMessage" src="Public/img/voir.png" alt="icone oeil">
          </button>
        </td>
      </tr>

      <!-- Modal box: READ observation -->
      <div class="modal fade" id="readObsModalAdmin<?php echo $observation['idObservation']; ?>" tabindex="-1"
        aria-labelledby="getObsModalAdmin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="getObsModalAdmin">Observation de : <?php echo $observation['commonName']; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body row d-flex flex-column text-justify my-2 mx-2">
              <p><u>Date:</u><?php echo  " " . $observation['date']; ?></p>
              <p><u>Vu par:</u><?php echo " " . $observation['pseudo']; ?></p>
              <p><u>Espèce:</u><?php echo " " . $observation['commonName']; ?></p>
              <p><u>Département:</u><?php echo " " . $observation['department']; ?></p>
              <p><u>Ville:</u><?php echo " " . $observation['location']; ?></p>
              <p><u>Quantité aperçue:</u><?php echo $observation['counting']; ?></p>
              <img class="imgRatio mx-auto my-4" alt="img observation animal" src="Public/img/<?php echo $observation['picture']; ?>">
              <p><u>Commentaires:</u><?php echo $observation['comments']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </tbody>
</table>

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