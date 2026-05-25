<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $rm = $_POST['rm'];

    // RECURSOS INICIAIS
    $agua = $rm * 0.15;

    $energia = $rm / 2;

    $combustivel = ($energia * 0.10) + ($agua * 0.40);

    // DADOS DA FASE
    $fase = [
        "nome" => "Montanha",
        "distancia" => 42,
        "altitude" => 1800,
        "dificuldade" => 4
    ];

    // CONSUMOS
    $consumoEnergia =
        $fase['distancia'] *
        $fase['dificuldade'] *
        2;

    $consumoAgua =
        $fase['distancia'] * 3;

    $consumoCombustivel =
        ($fase['altitude'] / 100) * 12;

    // RECURSOS FINAIS
    $energiaFinal =
        $energia - $consumoEnergia;

    $aguaFinal =
        $agua - $consumoAgua;

    $combustivelFinal =
        $combustivel - $consumoCombustivel;

    // PENALIDADES E ALERTAS
    $penalidade = 0;

    if($energiaFinal < ($energia * 0.30)){
        $penalidade = 20;
    }

    $alertaAgua = "";

    if($aguaFinal <= 10){
        $alertaAgua = "ALERTA: Desidratação!";
    }

    $missao = "Missão concluída";

    if($combustivelFinal < 0){
        $missao = "MISSÃO FALHOU - Combustível insuficiente!";
    }

}else{
    echo "Acesso inválido.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Missão</title>
    <link rel="stylesheet" href="resultado.css">
</head>
<body>

<div class="container">

    <h1>Resultado da Missão</h1>

    <div class="card">
        <h2>Fase: <?php echo $fase['nome']; ?></h2>
    </div>

    <div class="card">
        <h3>Recursos Iniciais</h3>

        <p>RM: <?php echo $rm; ?></p>

        <p>Água: <?php echo number_format($agua); ?></p>

        <p>Energia: <?php echo number_format($energia); ?></p>

        <p>Combustível: <?php echo number_format($combustivel); ?></p>
    </div>

    <div class="card">
        <h3>Consumos da Fase</h3>

        <p>Consumo de Energia:
            <?php echo number_format($consumoEnergia); ?>
        </p>

        <p>Consumo de Água:
            <?php echo number_format($consumoAgua); ?>
        </p>

        <p>Consumo de Combustível:
            <?php echo number_format($consumoCombustivel); ?>
        </p>
    </div>

    <div class="card">
        <h3>Recursos Finais</h3>

        <p>Energia Final:
            <?php echo number_format($energiaFinal); ?>
        </p>

        <p>Água Final:
            <?php echo number_format($aguaFinal); ?>
        </p>

        <p>Combustível Final:
            <?php echo number_format($combustivelFinal); ?>
        </p>
    </div>

    <div class="card">
        <h3>Status</h3>

        <p>Penalidade:
            <?php echo $penalidade; ?> pontos
        </p>

        <?php if($aguaFinal <= 10){ ?>
            <div class="alerta">
                ALERTA: Desidratação!
            </div>
        <?php } ?>

        <?php if($combustivelFinal < 0){ ?>
            <div class="falha">
                MISSÃO FALHOU - Combustível insuficiente!
            </div>
        <?php } else { ?>
            <div class="sucesso">
                Missão concluída com sucesso!
            </div>
        <?php } ?>

    </div>

</div>

</body>
</html>