<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
error_reporting(0); 
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP
?>
<?php
//CONEXTA BANCO MSSQLSERVER.
require_once('vaibrasil1.php');
$sql_mssql = "SELECT cliid, cliDescontoAutoAliq from cliente
		where clitipo = 1 
		and clidesativa = 0
		and clitipocad in (0,2)
		and not cliid in (1,2)
		and not clicpfcgc = ' '"; 
$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//conexta banco mysql
require_once('vaibrasil2.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<body>
<p>Atualizandor de Clientes.<br />
</p>
<p>N&Atilde;O FECHE ESTA TELA!!! <br />
  <br />
A CADA 60 minutos <em>atualiza&ccedil;&atilde;o din&acirc;mica</em>!!!</p>
<p>
  <?php 

while (odbc_fetch_row($result_mssql)) 
{
?>
  
  <?php $id1=odbc_result($result_mssql,"cliid"); //echo $id1; ?>  
  <?php $id7=odbc_result($result_mssql,"cliDescontoAutoAliq"); //echo $id7; ?>
  <?php 


$query_mysql = "UPDATE usuarios SET desconto = $id7 WHERE id like '$id1';";
mysql_query($query_mysql,$connect_mysql);

}    
?>
</p>
</body>
</html>
<?php
odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='3600;URL=atualiza_fabricante.php'>";
?>
