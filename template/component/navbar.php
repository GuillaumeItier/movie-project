<header>
    <nav class="container">
        <ul>
            <li><strong>Movies Project</strong></li>
        </ul>
        <ul>
            <li><a href="/">Accueil</a></li>
            <?php if(isset($_SESSION["connected"]) && $_SESSION["connected"] == true) : ?>
            <li><a href="/category/add">Ajouter categorie</a></li>
            <li><a href="/categories">Liste categories</a></li>
            <li><a href="/logout">Déconnexion</a></li>
            <?php else : ?>
            <li><a href="/login">Connexion</a></li>
            <li><a href="/register">Inscription</a></li>
            <?php endif ?>
        </ul>
    </nav>
</header>