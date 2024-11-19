    <?php

    require __DIR__ . '/model/game.php';

    function gameCadaster($gameName, $gameLaunch, $gamePicture, $gameGender)
    {

        $defaultPicture = '/images/defaultPicture.jpg';

        $gamePicture = empty($gamePicture) ? $defaultPicture : $gamePicture;

        if ($gameLaunch < 1952 || $gameLaunch > intval(date("Y") + 1)) {
            // InvalidArgumentException retorna uma mensagem quando está dentro da condição.
            throw new InvalidArgumentException("Ano de lançamento inválido");
        }

        $game = new Game();

        $game->name = $gameName;
        $game->launch = $gameLaunch;
        $game->picture = $gamePicture;
        $game->gender = $gameGender;

        return $game;
    }

    try {
        $data = gameCadaster(
            $_POST['gameName'],
            $_POST['gameLaunch'],
            $_POST['gamePicture'],
            $_POST['gameGender'],
        );

        // Lugar onde vai ser salvo os dados Json
        $jsonFilePath = __DIR__ . '/dataJson.json';

        // Verifica se os dados existem e contem os dados
        if (file_exists($jsonFilePath)) {
            // Lê o conteúdo existente do arquivo
            $existingData = json_decode(file_get_contents($jsonFilePath), true);

            // Se o array estiver vazio ou não for um array, cria um novo array
            if (!is_array($existingData)) {
                $existingData = [];
            }

            // Adiciona o novo dado ao array existente
            $existingData[] = (array) $data; // Converte objeto em array
        } else {
            $existingData = [(array) $data]; // Converte array em objeto
        }

        // Codifica os dados JSON
        $jsonFormat = json_encode($existingData, JSON_PRETTY_PRINT);

        // Salva os dados no formato JSON
        file_put_contents($jsonFilePath, $jsonFormat);

        // header é usado para redirecionar o usuário.
        // O uso do ? serve para indentificar que tudo após ele é parametro.
        header('Location: /sucessPage.php?game=' . urlencode($data->name));

        exit;
    } catch (InvalidArgumentException $err) {
        header(('Location: /errorPage.php?error=' . urlencode($err->getMessage())));

        exit;
    }
