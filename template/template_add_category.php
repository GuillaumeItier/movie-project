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
    <?php include 'component/navbar.php'?>
    <main class="container"></h1>
        <h1>Ajouter une catégorie</h1>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Saisir le nom de categorie">
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["error"] ?? "" ?></p>
        <p><?= $data["valid"] ?? "" ?></p>
    </main>
</body>
</html>