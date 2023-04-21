<?php 
  include('./App/Views/Front/Layout/head.php') ;
  include('./App/Views/Front/Layout/header.php') ;
?>

<!-- return  -->
<div class="d-flex mt-4">
  <a title="Retournez à la liste des espèces" href="index.php?action=findSpeciesByCategory">
    <img class="crudIcon mb-2" src="Public/img/back.png" alt="icone retour en arrière">
  </a>
</div>

<!-- description of one species -->
<article>
  <div class="text-center mb-5">
    <h5>Espèce: <?php echo $species->commonName; ?></h5>
    <h5 class="mt-4 font-italic"><span><?php echo $species->scientificName; ?></span></h5>
    <img class="imgRatio my-4" src="Public/img/<?php echo $species->picture; ?>" alt="photo catégorie d'animal">
  </div>

  <div>
    <p class="text-center"><span>Description: </span></p>
    <p class="text-justify"><?php echo $species->content; ?></p>
    <p><span>Statut de conservation en Bretagne:</span> <?php echo $species->bretagneStatus; ?></p>
    <p><span>Statut de conservation en France:</span> <?php echo $species->franceStatus; ?></p>
    <p><span>Statut de conservation dans le monde:</span> <?php echo $species->worldStatus; ?></p>
    <figure class="IUCNStatus text-center">
      <img class="img-fluid imgRatio" src="Public/img/statut_conservation_iucn.jpg"
        alt="description des catégories de statut pour les espèces menacées">
      <figcaption>Statut de conservation des espèces <span>Source: www.iucn.fr</span></figcaption>
    </figure>
    <p><span>Poids:</span> <?php echo $species->height; ?> cm</p>
    <p><span>Taille: </span><?php echo $species->weight; ?> gr</p>
    <p><span>Régime alimentaire: </span></p>
    <p><?php echo $species->diet; ?></p>
    <p><span>Menaces:</span></p>
    <p><?php echo $species->threats; ?></p>
  </div>
</article>

<!-- Observations part -->
<div class="text-center my-5">
  <p class="observationTitle"><span>Voir les dernières observations des espèces?</span></p>
  <a title="notifier une observation" href="index.php?action=findAllObservations" class="btn mx-5 mb-5">C'est par ici</a>
  
  <p class="observationTitle mb-3"><span>Vous avez une observation à notifier ?</span></p>
  <a title="notifier une observation" href="index.php?action=createObservation" class="btn mx-5">C'est par là</a>
</div>

<div class="text-center">
  <a title="voir d'autres espèces" href="index.php?action=findSpeciesByCategory" class="button btn">Voir d'autres espèces ?</a>
</div>

<!-- go top -->
<a title="Remonter en haut de la page" href="index.php?action=findSpeciesByCategory">
  <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
</a>

<?php
  include('./App/Views/Front/Layout/footer.php') ;
?>