<?php
if(isset($_GET['idFesta'])){
    require_once __DIR__."/vendor/autoload.php";
    $festa = Festa::find($_GET['idFesta']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $festa = new Festa($_POST['nome'],$_POST['endereco'],$_POST['cidade'],$_POST['data']);
    $festa->setIdFesta($_POST['idFesta']);
    $festa->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edita Festa</title>
</head>
<body>
    <table class="table table-dark">
    <form action='formEdit.php' method='POST'>
        <?php
            echo "<td>Nome: <input name='nome' value='{$festa->getNome()}' type='text' required></td>";
            echo "<br>";
            echo "<td>Endereço: <input name='endereco' value='{$festa->getEndereco()}' type='text' required></td>";
            echo "<br>";
            echo "<tr></tr>";
            echo "<td>Cidade: <input name='cidade' value='{$festa->getCidade()}' type='text' required></td>";
            echo "<br>";
            echo "<td>Data: <input name='data' value='{$festa->getData()}' type='date' required></td>";
            echo "<br>";
            echo "<td><input name='idFesta' value={$festa->getIdFesta()} type='hidden'></td>";
            echo "<tr></tr>";
            echo "<td><input type='submit' name='botao'></td>";
            echo "<td></td>";
        ?>
        </form>
    </table>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

