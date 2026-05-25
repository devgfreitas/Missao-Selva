<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Missão Selva</title>
</head>
<body>

    <header class="header">
        <img src="img/selva.png" alt="imagem jungle">
        <h1>Missão Selva</h1>
    </header>

    <main class="main">
        <h2>Cálculo da Missão</h2>

        <form method="POST" action="resultado.php" class="form">

            <label for="rm">Informe seu RM:</label>
            <input type="number" name="rm" required>

            <input type="submit" value="Iniciar Missão">

        </form>
    </main>

</body>
</html>