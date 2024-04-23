<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex " id="navbarsExample11">

            <a href="{{ path('app') }}">
                <img class="logo" src="{{ asset('assets/images/logo.JPG') }}" alt="logo dream stones">
            </a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">

                <!-- Catégories par couleur -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pierres par couleur
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ path('products_by_color_blue') }}" data-categoryId="1">Bleues</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_green') }}" data-categoryId="1">Vertes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_purple') }}" data-categoryId="3">Violettes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_white') }}" data-categoryId="3">Blanches</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_red') }}" data-categoryId="3">Rouges</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_brown') }}" data-categoryId="3">Marrons</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_multicolor') }}" data-categoryId="3">Multicolores</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_yellow') }}" data-categoryId="3">Jaunes</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_grey') }}" data-categoryId="3">Grises</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_black') }}" data-categoryId="3">Noires</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_orange') }}" data-categoryId="3">Oranges</a></li>
                        <li><a class="dropdown-item" href="{{ path('products_by_color_pink') }}" data-categoryId="3">Roses</a></li>
                    </ul>
                </li>

                <!-- Catégories par type -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pierres par catégories
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
                    <a class="nav-link active text-light" aria-current="page" href="{{ path('products_by_category_jewelry') }}">Bracelets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active text-light" href="{{ path('app_profil') }}">Profil utilisateur</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active text-light" href="{{ path('app_history') }}">Historique commandes</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active text-light" href="{{ path('app_login') }}">Me connecter</a>
                </li>

                <!-- Panier d'achat -->
                <li class="nav-item">
                    <a class="nav-link text-light" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" data-bs-toggle="offcanvas">
                        Panier
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-2 mt-2 d-flex flex-column">
    <!-- Formulaire de recherche -->
    <form class="form-inline" action="{{ path('search_product') }}" method="GET">
        <div class="input-group">
            <input id="search-input" name="search" class="form-control" type="search" placeholder="Rechercher" aria-label="Search">
            <button id="search-btn" class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>
    
    <!-- Recherche multicritères -->
    <div class="mt-2 d-flex btnSearch1">
        <a class="btn btnSearch btn-outline-light" href="{{ path('search_products') }}" role="button">
            Recherche multicritères
        </a>
    </div>
</div>





</nav>