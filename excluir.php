<?php
require_once __DIR__."/vendor/autoload.php";
$atividades = Projeto::find($_GET['id']);
$atividades->delete();
header("location:index.php");