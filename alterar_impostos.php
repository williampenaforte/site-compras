<?php
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
error_reporting(0); 
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP

include("seguranca.php"); // Inclui o arquivo com o sistema de seguranÃ§a
protegePagina(); // Chama a funÃ§Ã£o que protege a pÃ¡gina

$id_sessao = $_SESSION['usuarioID']; //RECEBE O CODIGO DE QUEM ESTA LOGADO DA SESSÃO 

$id = $_POST['txtid']; //echo $id;
$cfop = $_POST['txtcfop']; //echo $cfop; 
$uf = $_POST['txtuf']; //echo $uf; 


$st = $_POST['txtst']; //echo $st;
if(!strpos($st,".")&&(strpos($st,",")))
$stnew=substr_replace($st, '.', strpos($st, ","), 1);
//echo $stnew;

$iva = $_POST['txtiva']; //echo $iva;
if(!strpos($iva,".")&&(strpos($iva,",")))
$ivanew=substr_replace($iva, '.', strpos($iva, ","), 1);
//echo $ivanew;

$icms = $_POST['txticms']; //echo $icms; 
if(!strpos($icms,".")&&(strpos($icms,",")))
$icmsnew=substr_replace($icms, '.', strpos($icms, ","), 1);
//echo $icmsnew;


// Dados do banco MYQSL-qbex-local
$connect_altera_imposto = mysql_connect("localhost","root","*******");
mysql_select_db("db_table",$connect_altera_imposto);

$sql_altera_imposto = "UPDATE imposto
                       SET imposto_imp = '$st', cfop_imp = '$cfop', uf_imp = '$uf', iva_imp = '$iva', icms_imp = '$icms'
                       WHERE id_imp = '$id';";

mysql_query($sql_altera_imposto,$connect_altera_imposto);
header("location: consulta_impostos_pesquisa.php");

mysql_close($connect_altera_imposto); 
?>