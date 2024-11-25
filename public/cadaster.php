<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Dos Glitches</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>

<body>
    <header>
        <a href="index.php">
            <img src="../images/pageLogo.svg" alt="Logo da página" class="iconLogo">
        </a>
    </header>

    <form action="/gameCadaster.php" method="post">

        <?php if (isset($_GET['error'])): ?>
            <p class="errorMessage"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>


        <label for="gameName">
            Nome
            <input type="text" name="gameName" required>
        </label>

        <label for="gameLaunch">
            Ano de lançamento
            <input type="number" name="gameLaunch" required>
        </label>

        <label for="gamePicture">
            Url da foto
            <input type="text" name="gamePicture">
        </label>

        <label for="gameGender">
            Gênero
            <input type="text" name="gameGender" required>
        </label>

        <button class="styledButon" type="submit">
            Confirmar
        </button>
    </form>
</body>

</html>