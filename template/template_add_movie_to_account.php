<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include 'component/navbar.php' ?>
    <main class="container">
        <form action="" method="post">
            <select aria-label="Sélectionner le Film..." name="movie" required>
                <option selected disabled value="">
                    Sélectionner le film...
                </option>
                <?php foreach ($data["movies"] as $movie) :?>
                <option value="<?= $movie["id"] ?>"><?= $movie["title"] ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["error"] ?? "" ?></p>
        <p><?= $data["valid"] ?? "" ?></p>
    </main>
</body>

</html>