<?php
  include('./App/Views/Front/Layout/head.php') ;
  include('./App/Views/Front/Layout/header.php') ;
?>

<!-- access authorized with an account only -->
<?php if (!empty($_SESSION['isUserLogged'])) { ;?>

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
  <!-- account buttons: update, disconnect, delete -->
  <div class="mt-5 d-flex flex-column">
    <a title="modifier mon compte" href="index.php?action=readForUpdateAccount&idAccount=<?php echo $account->idAccount; ?>"
      class="btn btn-sm btnAccount mb-2">Modifier mon compte</a>
    <a title="me déconnecter" href="index.php?action=logout" class="btn btn-sm btnAccount mb-2">Me deconnecter</a>
    <button type="button" id="confirmAccountDelete" class="btnAccount btn btn-sm confirmAccountDelete"
      data-id="<?php echo $account->pseudo; ?>">Supprimer mon compte</button>
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
            data-target="#readObsModalAccount<?php echo $observation['idObservation']; ?>">
            <img class="crudIconMessage" src="Public/img/voir.png" alt="icone oeil">
          </button>
        </td>
      </tr>

      <!-- Modal box: READ observation -->
      <div class="modal fade" id="readObsModalAccount<?php echo $observation['idObservation']; ?>" tabindex="-1"
        aria-labelledby="getObsModalAccount" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="getObsModalAccount">Observation de : <?php echo $observation['commonName']; ?></h5>
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
              <img class="imgRatio mx-auto my-4" alt="img observation espèces" src="Public/img/<?php echo $observation['picture']; ?>">
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

<!-- Modal box to confirm the removal -->
<div class="modal fade" id="modalAccountDelete-<?php echo $account->pseudo; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Etes-vous sûr de vouloir supprimer ce compte: <span><?php echo $account->pseudo; ?>?</span></p>
      </div>
      <div class="modal-footer">
        <a href="index.php?action=deleteAccount&idAccount=<?php echo urlencode($account->idAccount); ?>" title="supprimer"
          class="btn"> Supprimer</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>

<!-- access permit only with account -->
<div class="text-center my-5">
  <h2>Vous devez êtes connecté pour accéder à votre compte</h2>
  <a href="index.php?action=login" title="bouton se connecter" type="button" class="btn mt-5"> Se connecter</a>
  <?php 
    } ;
  ?>
</div>

<?php 
  include('./App/Views/Front/Layout/footer.php') ;
?>