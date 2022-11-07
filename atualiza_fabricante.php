<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
error_reporting(0); 
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP
?>
<?php
//CONEXTA BANCO MSSQLSERVER. 
require_once('vaibrasil1.php'); //arquivo com dados para conectar ao servidor... removido do get
$sql_mssql = "SELECT fabId, fabNome FROM fabricante"; 
$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//Conexao MYsqlServer
require_once('vaibrasil2.php'); //arquivo com dados para conectar ao servidor... removido do get

//LIMPA TABELA DE FABRICAS.
$query_mysql = "DELETE FROM fabricas"; //metodo encontrado na epoca para atualizar fabricas... 
//a base real era do sqlserver entao o site que utilizava mysql nao importava a marca.. pois era apenas para visualização do internauta

mysql_query($query_mysql,$connect_mysql);
$query_mysql = mysql_query($query_mysql,$connect_mysql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
Atualizando Fabricas......<br />
Fabricas Atualizadas!!! <br />
<br />Redirecionando.....
<?php 
while (odbc_fetch_row($result_mssql)) 
{
?>
<!--ID.Fabricante:.--> <?php $id=odbc_result($result_mssql,"fabId"); //echo $id; ?>
  <br />
<!-- Nome.Fabricante:. --> <?php  $nome=odbc_result($result_mssql,"fabnome"); //echo $nome; ?>
  <br /><br />
 
<?php 
//INSERT PARA NOVOS USUARIOS DO SISTEMA!!!.
$query_mysql = "INSERT INTO fabricas (`id_jpa_fab`, `nome_fab`) 
				VALUES ($id, '$nome');";

mysql_query($query_mysql,$connect_mysql);

}    
?>
</body>
</html>
<?php
odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=atualiza_produtos.php'>";
?>
