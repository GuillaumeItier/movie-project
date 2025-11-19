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
    <main class="container">
        <h1>Liste des categories</h1>
        <?php foreach($data as $category): ?>
            <p id="<?= $category["id"] ?>"><?= $category["name"] ?></p>
        <?php endforeach ?>
    </main>
</body>
</html>