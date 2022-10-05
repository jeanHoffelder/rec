<?php
require_once __DIR__."/vendor/autoload.php";
    $festas = Festa::findall();
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Página de Festas</title>
</head>
<body>

<table class="table table-dark">
    <tr>
 
    <td>
    <form action="index.php" method="post">
    <button type="submit" name="nomeAsc"><img src="setaCima.png" height=10px /></button>
        Nome
    <button type="submit" name="nomeDesc"><img src="setaBaixo.png" height=10px /></button>
    </form>
    </td>

    <td>
    <form action="index.php" method="post">
    <button type="submit" name="enderecoAsc"><img src="setaCima.png" height=10px/></button>
        Endereço
    <button type="submit" name="enderecoDesc"><img src="setaBaixo.png" height=10px /></button>
    </form>
    </td>

    <td>
    <form action="index.php" method="post">
    <button type="submit" name="cidadeAsc"><img src="setaCima.png" height=10px/></button>
        Cidade
    <button type="submit" name="cidadeDesc"><img src="setaBaixo.png" height=10px/></button>
    </form>
    </td>

    <td>
    <form action="index.php" method="post">
    <button type="submit" name="dataAsc"><img src="setaCima.png" height=10px/></button>
        Data
    <button type="submit" name="dataDesc"><img src="setaBaixo.png" height=10px /></button>
    </form>
    </td>
    
    </tr>   
    <?php
    foreach($festas as $festa){
        echo "<tr>";
        echo "<td>{$festa->getNome()}</td>";
        echo "<td>{$festa->getEndereco()}</td>";
        echo "<td>{$festa->getCidade()}</td>";
        $dataFormatada = new DateTime($festa->getData());
        echo "<td>{$dataFormatada->format('d/m/Y')}</td>";
        echo "<td>
                <a href='formEdit.php?idFesta={$festa->getIdFesta()}'>Editar</a>
                <a href='excluir.php?idFesta={$festa->getIdFesta()}'>Excluir</a> 
             </td>";
        echo "</tr>";
    }
    
    ?>
</table>
<table class="table table-dark">
<td><a href='formCad.php'>Adicionar Festa</a></td>
<br>
<td><a href="festasRealizada.php">Festas Realizadas</a></td>
<br>
<td><a href="proximasFestas.php">Próximas Festas</a></td>
<br>
<td><a href="cidadeFestas.php">Festas por cidade</a></td>
<br>
<td><a href="festasMes.php">Festas por mês</a></td>


</table>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>






