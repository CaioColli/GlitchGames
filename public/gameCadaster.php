    <?php

    function gameCadaster(string $gameName, int $gameLaunch, string $gamePicture, string $gameGender): array
    {

        $defaultPicture = '/images/defaultPicture.jpg';

        $gamePicture = empty($gamePicture) ? $defaultPicture : $gamePicture;

        if ($gameLaunch < 1952 || $gameLaunch > intval(date("Y") + 1)) {
            // InvalidArgumentException retorna uma mensagem quando está dentro da condição.
            throw new InvalidArgumentException("Ano de lançamento inválido");
        }

        return [
            "name" => htmlspecialchars($gameName),
            "launch" => $gameLaunch,
            "picture" => htmlspecialchars($gamePicture),
            "gender" => htmlspecialchars($gameGender),
        ];
    }

    try {
        $data = gameCadaster(
            gameName: $_POST['gameName'],
            gameLaunch: $_POST['gameLaunch'],
            gamePicture: $_POST['gamePicture'], // Usa o null como fallback
            gameGender: $_POST['gameGender'],
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
            $existingData[] = $data;
        } else {
            $existingData = [$data];
        }

        // Codifica os dados JSON
        $jsonFormat = json_encode($existingData, JSON_PRETTY_PRINT);

        // Salva os dados no formato JSON
        file_put_contents($jsonFilePath, $jsonFormat);

        // header é usado para redirecionar o usuário.
        // O uso do ? serve para indentificar que tudo após ele é parametro.
        header('Location: /sucess.php?game=' . $data['name']);

        exit;
    } catch (InvalidArgumentException $err) {
        header(('Location: /error.php?error=' . urlencode($err->getMessage())));

        exit;
    }
