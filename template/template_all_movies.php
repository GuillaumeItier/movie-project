<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php include 'component/navbar.php'; ?>
    <main class="container">
        <section class="grid">
            <!-- Boucle pour afficher les movies -->
            <?php foreach ($data["movies"] as $movie): ?>
            <article>
                <header><h2><?= $movie["title"] ?></h2></header>
                <p><?= $movie["description"] ?></p> 
                <p><?=  $movie["publish_at"]?></p>
                <?php
                    //transformer la chaine en tableau 
                    $categories = explode(",", $movie["categories"]);
                ?>
                <footer>
                    <!-- Boucle pour afficher les categories -->
                    <?php foreach ($categories as $category): ?>
                    <h3><?= $category . " "?></h3>
                    <?php endforeach ?>
                </footer>
            </article>
            <?php endforeach ?>
        </section>
    </main>
</body>

</html>