<?php
require_once __DIR__."/vendor/autoload.php";
$festas = Festa::realizadas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Festas Realizadas</title>
</head>
<body>

<table>
    <tr>
        <td><strong>Data</strong></td>
        <td><strong>Cidade</strong></td>
        <td><strong>Nome</strong></td>
    </tr>
    <?php
    foreach($festas as $festa){
            echo "<tr>";
            $dataFormatada = new DateTime($festa->getData());
            echo "<td>{$dataFormatada->format('d/m/Y')}</td>";
            echo "<td>{$festa->getCidade()}</td>";
            echo "<td>{$festa->getNome()}</td>";   
    }
    ?>
    <tr></tr>
    <td><a href="index.php">Voltar</a></td>
    <td></td>
    <td></td>
</table>

</body>
</html>

