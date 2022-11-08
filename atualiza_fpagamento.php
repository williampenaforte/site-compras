<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO.
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP.
error_reporting(0); 

//EXIBE TODOS OS ERROS DO SISTEMA PHP
//error_reporting(E_ALL ^ E_NOTICE);

//CONEXTA BANCO MSSQLSERVER.
require_once('vaibrasil1.php'); //arquivo com dados para conectar ao servidor... removido do get

$sql_mssql = "SELECT tapId, tapNome FROM tabPreco 
  where tapAtivo = 0"; 
$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//Conexao MYsqlServer
require_once('vaibrasil2.php'); //arquivo com dados para conectar ao servidor... removido do get
//LIMPA TABELA DE FABRICAS.

//LIMPA FORMA DE PAGAMENTO
$query_mysql = "DELETE FROM fpagamento"; //metodo encontrado na epoca para atualizar fabricas... a base real era do sqlserver entao o site que utilizava mysql nao importava a marca.. pois era apenas para visualização do internauta
mysql_query($query_mysql,$connect_mysql);
$query_mysql = mysql_query($query_mysql,$connect_mysql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
Atualizando Formas de Pagamento......<br />
Formas de Pagamento Atualizadas!!! <br />
<br />Redirecionando.....
<?php 
while (odbc_fetch_row($result_mssql)) 
{
?>
<!--ID.Fabricante:.--> <?php $id=odbc_result($result_mssql,"tapId"); //echo $id; ?>
  <br />
<!-- Nome.Fabricante:. --> <?php  $nome=odbc_result($result_mssql,"tapNome"); //echo $nome; ?>
  <br /><br />
 
<?php 
//INSERT PARA NOVOS USUARIOS DO SISTEMA!!!.
$query_mysql = "INSERT INTO fpagamento (`idfpagamento`, `nomefpagamento`) 
				VALUES ($id, '$nome');";

mysql_query($query_mysql,$connect_mysql);

}    
?>
</body>
</html>
<?php
odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=atualiza_fpagamento_usu_f_pag.php'>";
?>