<?php
require_once __DIR__."/vendor/autoload.php";
    $atividades = Projeto::findall();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página de Projetos</title>
    </head>
    <body>
    
    <table>
        <tr>
            <td>id</td>
            <td>descricao</td>
            <td>data</td>
            <td>status</td>

        </tr>
        <?php
        foreach($atividades as $atividade){
            echo "<tr>";
            echo "<td>{$atividade->getId()}</td>";
            echo "<td>{$atividade->getDescricao()}</td>";
            //Formatação da data para exibir como dia, mês e ano.
            $dataFormatada = new DateTime($atividade->getData());
            echo "<td>{$dataFormatada->format('d/m/Y')}</td>";
            echo "<td>{$atividade->getStatus()}</td>";
        }
        ?>
    </body>
    </html>
        