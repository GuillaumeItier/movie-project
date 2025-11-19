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
        <h1>Ajouter un compte</h1>
        <form action="" method="post">
            <input type="text" name="firstname" placeholder="Saisir votre prénom">
            <input type="text" name="lastname" placeholder="Saisir votre nom">
            <input type="email" name="email" placeholder="Saisir votre email">
            <input type="password" name="password" placeholder="Saisir le mot de passe">
            <input type="password" name="confirm-password" placeholder="Confirmer le mot de passe">
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["error"] ?? "" ?></p>
        <p><?= $data["valid"] ?? "" ?></p>
    </main>
</body>
</html>