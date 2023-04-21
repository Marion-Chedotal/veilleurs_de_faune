<body class="container-fluid">

    <!-- top banner -->
    <header role="banner" >
        <div class="topBanner myNoGutters d-flex flex-wrap align-items-center justify-content-center">
            <div class="logo mr-4">
                <a title="retour à l'accueil" href="index.php">
                    <img src="Public/img/veilleursDeFauneLogo2.png" alt="logo" class="img-fluid">
                </a>
            </div>

            <!-- Menu: access account -->
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h1 class="ml-1">Les veilleurs de Faune</h1>
                <ul class="nav nav-pills accountNavLink">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bg-transparent" data-toggle="dropdown" href="#"><img
                                src="Public/img/logo-account.png" alt="icone pour accéder se connecter"
                                class="accountImgRatio"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-dark" title="connexion" href="index.php?action=createAccount">Me connecter</a>
                            <a class="dropdown-item text-dark" title="accéder à mon compte" href="index.php?action=readAccount">Mon compte</a>
                            <a class="dropdown-item text-dark" title="se déconnecter" href="index.php?action=logout">Me déconnecter</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Menu  -->
        <div class="menu">

            <!-- Burger menu -->
            <nav class="navbar navbar-expand-xl navbar-dark myNoGutters justify-content-center" role="navigation">
                <a class="navbar-brand" href="#" title="menu burger"></a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                    <ul class="navbar-nav text-center">
                        <li class="nav-item">
                            <a class="nav-link" title="accéder à l'accueil" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" title="voir les espèces menacées" href="index.php?action=findSpeciesByCategory">Les Espèces menacées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" title="voir les observations" href="index.php?action=findAllObservations">Observatoire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" title="accéder au formulaire de contact" href="index.php?action=contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>