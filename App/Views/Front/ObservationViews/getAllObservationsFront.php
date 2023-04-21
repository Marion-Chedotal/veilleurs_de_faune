<?php 
  include('./App/Views/Front/Layout/head.php') ;
  include('./App/Views/Front/Layout/header.php') ;
?>

<!-- return -->
<div class="d-flex mt-4">
  <a title="Retournez à la page d'accueil" href="index.php">
    <img class="crudIcon" src="Public/img/back.png" alt="icone retour en arrière">
  </a>
</div>

<h2 class="text-center mb-5">Devenez un Veilleur de Faune!</h2>
<article class="text-justify">
  <p>Aidez-nous à recenser les espèces mencacés près de chez vous, ou lors de vos ballades. Rien de plus simple pour le
    faire, suivez le guide: </p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</article>

<!-- link to contact us -->
<div class="text-center mt-5">
  <p>Vous avez une question? N'hésitez pas à nous contact via notre formulaire de contact:</p>
  <a href="index.php?action=contact" title="contactez-nous" class="btn">Contactez-nous</a>
</div>

<h3 class="text-center m-5">Liste des Observations réalisées:</h3>

<!-- button to add Observation  -->
<div class="d-flex justify-content-center mb-5">
  <div class="clickToAdd d-flex px-5">
    <p class="mt-2"> Ajouter une observation: </p>
    <a title="Ajouter une observation" href="index.php?action=createObservation"><img class="pl-5"
        src="Public/img/ajouter.png" alt="icone ajout"></a>
  </div>
</div>

<table class="table table-hover table-responsive-xs">
  <thead>
    <tr>
      <!-- in small device, hidd the 3 first column, to have more place because table is large -->
      <th scope="col" class="align-middle">Date</th>
      <th scope="col" class="align-middle">Espèce </th>
      <th scope="col" class="align-middle">Département</th>
      <th scope="col" class="d-none d-sm-table-cell align-middle">Ville</th>
      <th scope="col" class="d-none d-sm-table-cell align-middle" >Recensement (unité)</th>
      <th scope="col" class="d-none d-sm-table-cell align-middle">Commentaires</th>
      <th scope="col" class="align-middle">Lire</th>
    </tr>
  </thead>
  <?php foreach ($observations as $observation) : ?>
    <tbody>
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
            data-target="#readObsModalFront<?php echo $observation['idObservation']; ?>">
            <img class="crudIconMessage" src="Public/img/voir.png" alt="icone oeil">
          </button>
        </td>
      </tr>

      <!-- Modal box: READ observation -->
      <div class="modal fade" id="readObsModalFront<?php echo $observation['idObservation']; ?>" tabindex="-1"
        aria-labelledby="getObsModalFront" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="getObsModalFront">Observation de : <?php echo $observation['commonName']; ?></h5>
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
              <img class="imgRatio mx-auto my-4" alt="img observation espece" src="Public/img/<?php echo $observation['picture']; ?>" title="Crédit Photo: <?php echo $observation['pictureCredit'];?>">
              <p><u>Commentaires:</u><?php echo $observation['comments']; ?></p>
            </div>
            <!-- quit the modal -->
            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>
    </tbody>
  <?php endforeach; ?>
</table>

<!-- go top -->
<div>
  <a title="Remonter en haut de la page" href="index.php?action=findAllObservations">
    <img class="mr-5 mt-5 float-right" src="Public/img/up.png" alt="flèche haut">
  </a>
</div>

<?php
  include('./App/Views/Front/Layout/footer.php') ;
?>