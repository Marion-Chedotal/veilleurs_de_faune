<body class="container-fluid">

    <!-- top banner -->
    <header role="banner" >
        <div class="topBanner myNoGutters">
            <div class=" row justify-content-around align-items-center">
                <div class="col-xs-3 logo">
                    <a title="retour à l'accueil" href="admin.php">
                        <img src="Public/img/veilleursDeFauneLogo2.png" alt="logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-xs-9 text-center ">
                    <h1>Les veilleurs de Faune</h1>
                    <h2>Espace administrateur</h2>
                </div>
            </div>
            <!-- access authorized with an account -->
            <?php if (!empty($_SESSION['isAdmin'])) { ;?>

                <div class="menu ">
                    <!-- Burger menu -->
                    <nav class="navbar navbar-expand-xl navbar-dark myNoGutters text-center">
                        <a href="#" class="navbar-brand" title="menu burger" href="#" role="navigation"></a>

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" title="aller sur l'accueil" href="admin.php">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="accéder à mon compte" href="admin.php?action=readAccount">Mon compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="accéder aux catégories" href="admin.php?action=findAllCategories">Accès Catégories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="voir les espèces" href="admin.php?action=findSpeciesByCategory">Accès Espèces</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="voir les observations" href="admin.php?action=findAllObservations">Accès Observatoire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="accéder aux messages" href="admin.php?action=findAllMessages">Accès Messagerie</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            <?php 
                } ; 
            ?>
        </div>
    </header>