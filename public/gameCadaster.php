    <?php

    function gameCadaster(string $gameName, int $gameLaunch, string $gamePicture, string $gameGender): array
    {
        return [
            "name" => htmlspecialchars($gameName),
            "launch" => $gameLaunch,
            "picture" => htmlspecialchars($gamePicture),
            "gender" => htmlspecialchars($gameGender),
        ];
    }

    $data = [
        "name" => $_POST['gameName'],
        "launch" => $_POST['gameLaunch'],
        "picture" => $_POST['gamePicture'],
        "gender" => $_POST['gameGender'],
    ];

    $jsonFilePath = __DIR__ . '/dataJson.json';

    // Verifica se os dados existem e contem os dados
    if (file_exists($jsonFilePath)) {
        // Lê o conteúdo existente do arquivo
        $existingData = json_decode(file_get_contents($jsonFilePath), true);

        // Se o array estiver vazio ou não for um array, cria um novo array
        if(!is_array($existingData)) {
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