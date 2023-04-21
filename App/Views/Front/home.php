<?php
  include('./App/Views/Front/Layout/head.php');
  include('./App/Views/Front/Layout/header.php');
?>

<main role="main" class="no-gutters">
  <h2 class="text-center my-5">Bienvenue dans l'observatoire des Veilleurs de Faune !</h2>

  <!-- SLIDER -->
  <div id="carouselExampleIndicators" class="carousel slide myNoGutters" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <!-- slide 1 -->
      <div class="carousel-item active">
        <img src="Public/img/slider1_gaze.jpg" class="d-block w-100 sliderPicture mx-auto"
          alt="papillon ailes transparentes">
        <div class="carousel-caption d-none d-md-block captionTop">
          <h5>Le gazé</h5>
          <p>Espèce vulnérable</p>
        </div>
      </div>
      <!-- slide 2 -->
      <div class="carousel-item">
        <img src="Public/img/slider2_phoqua.jpg" class="d-block w-100 sliderPicture mx-auto"
          alt="zoom phoque sur plage">
        <div class="carousel-caption d-none d-md-block">
          <h5>Le phoque veau-marin</h5>
          <p>Espèce en danger</p>
        </div>
      </div>
      <!-- slide 3 -->
      <div class="carousel-item">
        <img src="Public/img/slider3_pingouin.jpg" class="d-block w-100 sliderPicture mx-auto"
          alt="duo de pinguoin">
        <div class="carousel-caption d-none d-md-block">
          <h5>Le pinguoin torda</h5>
          <p>Espèce en danger</p>
        </div>
      </div>
    </div>
    <!-- slider button prev-next -->
    <button class="carousel-control-prev" data-target="#carouselExampleIndicators" data-slide="prev"></button>
    <button class="carousel-control-next" data-target="#carouselExampleIndicators" data-slide="next"></button>
  </div>

  <section class="row justify-content-center access">

    <!-- Aim of the website-->
    <h3 class="my-5 col-lg-12 text-center">Quelle est la mission des Veilleurs de Faune? </h3>
    <div class="col-lg-4 card text-center m-4">
      <div class="card-body">
        <h3 class="card-title font-weight-bold">1) Sensibiliser</h3>
        <p class="card-text">Notre but est de sensibiliser les internautes à l'une des nombreuses problématiques
          écologiques: <span>l'extinction des espèces animales</span>. Et ce au niveau local,<span>en Bretagne</span>;
          car cela se passe aussi chez nous. Et oui, il n’y a pas que les pandas ou les éléphants qui sont concernés !
          Serais-tu devinez les espèces concernées? </p>
      </div>
    </div>
    <div class="col-lg-4 card text-center m-4 ">
      <div class="card-body ">
        <h3 class="card-title font-weight-bold">2) Référencer</h3>
        <p class="card-text">Notre travail est de répertorier et de mettre à jour l'ensemble des espèces animales qui
          sont menacées en Bretagne. Les données sont issues de l'IUCN France: Union internationale pour la conservation
          de la nature. </p>
      </div>
    </div>
    <div class="col-lg-4 card text-center m-4">
      <div class="card-body">
        <h3 class="card-title font-weight-bold">3) Participatif</h3>
        <p class="card-text">Vous aimez la Nature? Vous aimez observez les animaux? Vous avez des espèces menacées près
          de chez vous ou vous en avez apperçu lors d'une randonnée ? Dites-le nous ! Ajouter votre observation
          personnelle à la base de données! </p>
      </div>
    </div>
  </section>

  <!-- Categories part's -->
  <section id="categories" class="mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
        <div class="card mx-auto">
          <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <a href="index.php?action=findSpeciesByCategory" title="voir les espèces menacées">
              <h3 class="card-text">Les espèces</h3>
              <h3 class="card-text">menacées</h3>
            </a>
          </div>
        </div>
      </div>
      <?php foreach ($categories as $category) : ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
          <div class="card mx-auto">
            <a href="index.php?action=findSpeciesByCategory&idCategory=<?php echo $category['idCategory']; ?>" title="se dirigez vers cette catégorie">
              <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h3 class="card-text">Les </h3>
                <h3 class="card-text text-center"><?php echo mb_strtoupper($category['name']); ?></h3>
              </div>
              <img class="card-img-top imgRatioHomeCard img-fluid mx-auto mt-1"
                src="Public/img/<?php echo $category['picture']; ?>" alt="animal d'une catégorie"
                title="Crédit Photo: <?php echo $category['pictureCredit'];?>">
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Observation part's  -->
  <section>
    <div class="d-flex flex-wrap justify-content-around mt-5">
      <div class="card-flip mb-5">
        <div class="card-flip-inner">
          <div class="card-flip-recto observationCard">
            <h3 class="card-title observationCardTitle py-5 px-3">Envie de devenir un veilleur de faune !</h3>
          </div>
          <div class="card-flip-verso observationCard">
            <p class="card-title observationCardTitle py-5 px-3">Aidez-nous à recenser les espèces menacés près de chez
              vous, ou lors de vos ballades !</p>
          </div>
        </div>
      </div>
      <div class="card-flip observationCard">
        <div class="card-body text-center">
          <a href="index.php?action=findAllObservations" title="se diriger vers les observations">
            <h3 class="card-title observationCardTitle2 py-5 px-3">Toutes les observations !</h3>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- go top -->
  <a title="Remonter en haut de la page" href="index.php">
    <img class="my-5 float-right" src="Public/img/up.png" alt="flèche haut">
  </a>

</main>

<?php 
  include('./App/Views/Front/Layout/footer.php') ;
?>