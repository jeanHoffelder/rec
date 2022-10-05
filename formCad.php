<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atividades = new Projeto($_POST['descricao'],$_POST['data'],$_POST['status']);
    $atividades->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Projeto</title>
</head>
<body>
    <form action='formCad.php' method='POST'>
       <td>Descricao: <input name='descricao' type='string' required></td> 
        <br>
        <td>Data: <input name='data' type='date' required></td>
        <br>
        <td>status:  <input type="number" name="status" required></td>

        <input type='submit' name='botao'>
    </form>
</body>
</html>

