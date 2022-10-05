<?php
if(isset($_GET['id'])){
    require_once __DIR__."/vendor/autoload.php";
    $atividade = Projeto::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atividade = new Projeto($_POST['descricao'],$_POST['data'],$_POST['status']);
    $atividade->setId($_POST['id']);
    $atividade->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Projeto</title>
</head>
<body>
    <form action='formEdit.php' method='POST'>
        <?php
            echo "<td>Descricao: <input name='descricao' value='{$atividade->getDescricao()}' type='string' required></td>";
            echo "<br>";
            echo "<td>Data: <input name='data' value='{$atividade->getData()}' type='date' required></td>";
            echo "<br>";
            echo "<td>status: <input type='number' name='status' value='{$atividade->getStatus()}' required></td>";
            echo "<tr></tr>";
            echo "<td><input type='submit' name='botao'></td>";
            echo "<td></td>";
            echo "<td><input name='id' value={$atividade->getId()} type='hidden'></td>";
            echo "<td></td>";
        ?>
        </form>
    </table>
    
</body>
</html>
