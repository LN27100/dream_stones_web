<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex " id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0 text-light" href="{{ path('app') }}">DREAM STONES</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos pierres par couleur
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ path('products_by_color_blue') }}" data-categoryId="1">Bleues</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_green') }}" data-categoryId="1">Vertes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_purple') }}" data-categoryId="3">Violettes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_white') }}" data-categoryId="3">Blanches</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_red') }}" data-categoryId="3">Rouges</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_brown') }}" data-categoryId="3">Marrons</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_multicolor') }}" data-categoryId="3">Multicolores</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Jaunes</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Grises</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Noires</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Oranges</a></li>
                        <li><a class="dropdown-item" data-categoryId="3">Roses</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nos pierres par catégories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ path('products_by_category_rolled_stones') }}">Pierres roulées</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_category_raw_stones') }}">Pierres brutes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_category_spheres') }}">Sphères</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_category_points') }}">Pointes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_category_jewelry') }}">Bijoux</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_category_geodes') }}">Géodes</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="{{ path('products_by_category_jewelry') }}">Nos bracelets</a>
                </li>

                <!-- Onglet profil masqué si l'utilisateur n'est pas connecté -->
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="/controllers/controller-profil.php">Profil utilisateur</a>
                    </li>
                <?php endif; ?>

                <!-- Onglet historique des commandes masqué si l'utilisateur n'est pas connecté -->
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="/controllers/controller-historycom.php">Historique commandes</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
    <a class="nav-link active text-light" href="{{ path('app_login') }}">Me connecter</a>
</li>


                <!-- Panier d'achat -->
                <li class="nav-item">
                    <a class="nav-link text-light" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" t>
                        Panier
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Formulaire de recherche -->
    <form id="search-form" class="form-inline col-lg-2" action="/controllers/controller-search.php" method="GET">
        <button id="search-btn" class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
        <input id="search-input" name="search" class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
    </form>



</nav>