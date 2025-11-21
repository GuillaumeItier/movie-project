<header>
    <nav class="container">
        <ul>
            <li><strong>Movies Project</strong></li>
        </ul>
        <ul>
            <li><strong><a href="/" data-tooltip="Accueil">Accueil</a></strong></li>
            <!-- Condition test si connecté -->
            <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true) : ?>
                <!-- Si le role est ROLE_ADMIN -->   
                <?php if (isset($_SESSION["grant"]) && $_SESSION["grant"] === "ROLE_ADMIN") : ?>
                 
                <li>
                    <details class="dropdown">
                        <summary>
                            Categorie
                        </summary>
                        <ul dir="rtl">
                            <li><a href="/category/add">Ajouter une Categorie</a></li>
                            <li><a href="/categories">Liste des Categories</a></li>
                        </ul>
                    </details>
                </li>
                <?php endif ?>
                <li>
                    <details class="dropdown">
                        <summary>
                            Film
                        </summary>
                        <ul dir="rtl">
                            <li><a href="/movie/add">Ajouter un Film</a></li>
                            <li><a href="/movies">Liste des Films</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="/logout" data-tooltip="Déconnexion">Déconnexion</a></li>
            <!-- Condition test si deconnecté -->
            <?php else : ?>
                <li><a href="/login" data-tooltip="Connexion">Connexion</a></li>
                <li><a href="/register" data-tooltip="Inscription">Inscription</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>