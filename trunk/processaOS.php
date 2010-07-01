<?php

#Cliente

if($_POST['cliNome'] != ""){$cliNome = $_POST['cliNome'];}else{}
if($_POST['cliEmail'] != ""){$cliEmail = $_POST['cliEmail'];}else{}
if($_POST['cliTelefone'] != ""){$cliTelefone = $_POST['cliTelefone'];}else{}
if($_POST['cliEndereco'] != ""){$cliEndereco = $_POST['cliEndereco'];}else{}


#Servico
if($_POST['servicoDescricao'] != ""){$servicoDescricao = $_POST['servicoDescricao'];}
if($_POST['servicoValor'] != ""){$servicoValor = $_POST['servicoValor'];}
if($_POST['ObsOS'] != ""){$ObsOS = $_POST['ObsOS'];}
if($_POST['ObsInt'] != ""){$ObsInt = $_POST['ObsInt'];}
$idCliente = "";

#insere nova

$connect = mysql_connect('127.0.0.1','root','') or die("erro SQL");
$mydb = mysql_select_db('os',$connect) or die("erro SQL");
$res = mysql_query("INSERT INTO cliente VALUES ($idCliente,$cliNome,$cliEmail,$cliTelefone,$cliEndereco)") or die("erro ao inserir no banco");








echo $cliNome."<br>";
echo $cliEmail."<br>";
echo $cliTelefone."<br>";
echo $cliEndereco."<br>";
echo $servicoDescricao."<br>";
echo $servicoValor."<br>";
echo $ObsOS."<br>";
echo $ObsInt."<br>";



?>