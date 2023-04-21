<?php 
  include('./App/Views/Front/Layout/head.php') ;
  include('./App/Views/Front/Layout/header.php') ;
?>

<!-- return  -->
<div class="d-flex mt-4">
  <a title="Retournez à la page d'accueil" href="index.php">
    <img class="crudIcon mb-2" src="Public/img/back.png" alt="icone retour en arrière">
  </a>
</div>

<article>
  <h2 class="mb-5 text-center">Qu'est ce qu'<span>une espèce menacée</span>, et quelles sont les statuts existants ?
  </h2>
  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
    laborum.</p>

  <figure class="IUCNStatus text-center">
    <img class="img-fluid imgRatio" src="Public/img/statut_conservation_iucn.jpg"
      alt="description des catégories de statut pour les espèces menacées">
    <figcaption>Statut de conservation des espèces - <span>Source: www.iucn.fr</span></figcaption>
  </figure>
</article>

<h3 class="my-5">Liste des espèces menacées:</h3>

<!-- filter to choose species by category -->
<form class="filterSpeciesByCategoryForm" action="index.php?action=findSpeciesByCategory" method="post" role="form">
  <div class="form-group">
    <label for="selectThreatenSpecies">Filtrer par catégorie d'animaux: </label>
    <select name="idCategory" id="selectThreatenSpecies" class="filterSpeciesByCategorySelect form-control">
      <option value="all" selected>Toutes les catégories</option>
      <?php foreach($categories as $category) { ?>
      <option value="<?php echo $category['idCategory']; ?>"><?php echo $category['name']; ?></option>
      <?php 
          } 
        ?>
    </select>
  </div>
</form>

<div class="row">
  <!--foreach loop to display the picture, name and icon to interact with all the Species  -->
  <?php foreach ($speciesByCat as $species) : ?>
    <div class="col-lg-4 col-md-6 col-sm-12 my-5 text-center">
      <div class="card h-100">
        <a href="index.php?action=readSpecies&idSpecies=<?php echo $species['idSpecies']; ?>"
          title="lien vers la fiche de l'animal">
          <img class="card-img-top imgRatio img-fluid" src="Public/img/<?php echo $species['picture']; ?>"
            alt="animal d'une catégorie" title="Crédit Photo: <?php echo $species['pictureCredit'];?>">
          <div class="card-body d-flex flex-column justify-content-between">
            <h2 class="card-title text-center font-italic"><?php echo $species['scientificName']; ?></h2>
            <h2 class="card-title text-center"><?php echo $species['commonName']; ?></h2>
          </div>
        </a>
      </div>
    </div>
  <?php  
    endforeach;
  ?>
</div>

<!-- go top -->
<a title="Remonter en haut de la page" href="index.php?action=findSpeciesByCategory">
  <img class="mr-5 float-right" src="Public/img/up.png" alt="flèche haut">
</a>

<?php
  include('./App/Views/Front/Layout/footer.php') ;
?>