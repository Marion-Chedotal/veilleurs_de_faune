<?php 
  include('./App/Views/BackOffice/Layout/headAdmin.php') ;
  include('./App/Views/BackOffice/Layout/headerAdmin.php') ;
?>

<!-- access authorized with an account -->
<?php if (!empty($_SESSION['isAdmin'])) { ;?>

<!-- display controller's message on my message -->
<div class="mt-5 text-center font-italic font-bold message">
  <?php 
    if (!empty($message)) {
      echo $message;
    } 
  ?>
</div>

<h3 class="text-center m-5">Liste des messages reçus:</h3>

<div>
  <table class="table table-hover table-responsive-xs">
    <thead>
      <tr>
        <!-- in small device, hidd the 3 first column, to have more place because table is large -->
        <th scope="col" class="d-none d-sm-table-cell">N°</th>
        <th scope="col" class="d-none d-sm-table-cell">Nom</th>
        <th scope="col" class="d-none d-sm-table-cell">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Sujet</th>
        <th scope="col">Lire</th>
        <th scope="col">Supp</th>
      </tr>
    </thead>
    <?php foreach ($contacts as $contact) : ?>
      <tbody>
        <tr>
          <th scope="row" class="d-none d-sm-table-cell col-1"><?php echo $contact['idContact']; ?></th>
          <td class="col-1 d-none d-sm-table-cell"><?php echo $contact['lastName']; ?></td>
          <td class="col-1 d-none d-sm-table-cell "><?php echo $contact['firstName']; ?></td>
          <td class="col-2 d-none d-md-table-cell"><?php echo $contact['email']; ?></td>
          <!-- in small device, trunk the mail -->
          <td class="col-2 d-md-none"><?php echo substr($contact['email'], 0, 10); ?></td>
          <td class="col-2"><?php echo $contact['topic']; ?></td>

          <!-- Button for modal box ->Read the message -->
          <td class="col-1">
            <button type="button" class="btnModal" data-toggle="modal"
              data-target="#readMsgModal<?php echo $contact['idContact']; ?>">
              <img class="crudIconMessage" src="Public/img/voir.png" alt="icone oeil">
            </button>
          </td>
          <!-- Button for modal box ->Delete the message -->
          <td class="col-1">
            <button type="button" id="confirmMsgDelete" class="btnModal confirmMsgDelete"
              data-id="<?php echo $contact['idContact']; ?>">
              <img class="crudIcon" src="Public/img/poubelle.png" alt="icone poubelle">
            </button>
          </td>
        </tr>

        <!-- Modal box: READ message -->
        <div class="modal fade" id="readMsgModal<?php echo $contact['idContact']; ?>" tabindex="-1"
          aria-labelledby="getMsgModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="getMsgModal">Message de :
                  <?php echo $contact['lastName'] . " " . $contact['firstName']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body row d-flex flex-column text-justify my-2 mx-2">
                <p><u>Email:</u><?php echo  " " . $contact['email']; ?></p>
                <p><u>Sujet:</u><?php echo " " . $contact['topic']; ?></p>
                <p><u>Message: </u></p>
                <p><?php echo $contact['message']; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal box to confirm the removal -->
        <div class="modal fade" id="modalMsgDelete-<?php echo $contact['idContact']; ?>" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <p>Etes-vous sûr de vouloir supprimer ce message?</p>
              </div>
              <div class="modal-footer">
                <a href="admin.php?action=deleteMessage&idContact=<?php echo urlencode($contact['idContact']); ?>"
                title="supprimer" class="btn"> Supprimer</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              </div>
            </div>
          </div>
        </div>
      </tbody>
    <?php endforeach; ?>
  </table>
</div>

<!-- go top -->
<div>
  <a title="Remonter en haut de la page" href="admin.php?action=findAllCategories">
    <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
  </a>
</div>

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