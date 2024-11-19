<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="index.php">
            <img src="../images/pageLogo.svg" alt="Logo da página" class="iconLogo">
        </a>
    </header>

    <main class="postFormMain">
        <h1 class="postFormTitle"><?php echo htmlspecialchars($_GET['error']); ?></h1>

        <div class="postFormButtonsContainer">
            <a href="index.php">
                <button class="styledButon">Início</button>
            </a>

            <a href="cadaster.php">
                <button class="styledButon">Cadastrar novamente</button>
            </a>
        </div>
    </main>
</body>

</html>