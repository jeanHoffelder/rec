<?php
require_once __DIR__."/vendor/autoload.php";
$atividades = Projeto::realizadas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projetos Realizados</title>
</head>
<body>

<table>
    <tr>
        <td><strong>descricao</strong></td>
        <td><strong>data</strong></td>
        <td><strong>status</strong></td>
    </tr>
    <?php
    foreach($atividades as $atividade){
            echo "<tr>";
            echo "<td>{$atividades->getDescricao()}</td>";
            $dataFormatada = new DateTime($atividades->getData());
            echo "<td>{$dataFormatada->format('d/m/Y')}</td>";
            echo "<td>{$atividades->getStatus()}</td>";   
    }
    ?>
    <tr></tr>
    <td><a href="index.php">Voltar</a></td>
    <td></td>
    <td></td>
</table>

</body>
</html>

