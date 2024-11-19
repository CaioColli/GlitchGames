<?php

$jsonFilePath = __DIR__ . '/dataJson.json';

if (file_exists($jsonFilePath)) {
    $data = json_decode(file_get_contents($jsonFilePath), true);
} else {
    $data = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Mundo Dos Glitches</title>
</head>

<body>
    <header>
        <a href="index.php">
            <img src="./images/pageLogo.svg" alt="Logo da página" class="iconLogo">
        </a>

        <a href="/cadasterPage.php">
            <button class="registerButton">Cadastrar Game</button>
        </a>
    </header>

    <main class="registeredMain">
        <?php if (!empty($data)): ?>
            <ul class="listCardGame">
                <?php foreach ($data as $data): ?>
                    <li class="itemCardGame">
                        <article class="cardGame">
                            <img class="cardImage" src="<?php echo htmlspecialchars($data['picture']) ?>"></img>

                            <div class="textsCard">
                                <h1 class="titleCard">
                                    <?php echo htmlspecialchars($data['name']); ?>
                                </h1>
                                <p class="descriptionCard">
                                    <?php echo htmlspecialchars($data['gender']) ?>
                                </p>
                                <p class="descriptionCard">
                                    Data de lançamento
                                    <?php echo htmlspecialchars($data['launch']) ?>
                                </p>
                            </div>

                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="emptyMessageContainer">
                <h1 class="titleForEmptyCards">
                    Nenhum jogo cadastrado
                </h1>

                <a href="cadaster.html">
                    <button class="styledButon" type="submit">
                        Cadastrar Game
                    </button>
                </a>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>