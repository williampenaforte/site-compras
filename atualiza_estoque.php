<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENcao
// LIBERAR APOS MANUTEN��O NOS CODIGOS PHP
error_reporting(0); 

?>
<?php
//CONEXTA BANCO MSSQLSERVER.
require_once('vaibrasil1.php'); //arquivo com dados para conectar ao servidor... removido do get
$sql_mssql = "SELECT procodigo, proEstoqueAtual, proVenda FROM produto 
where proDesativaProd = 0"; 
$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//conexta banco mysql
require_once('vaibrasil2.php');//arquivo com dados para conectar ao servidor... removido do get
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<body>
<p>Atualizandor de Pre&ccedil;os &eacute; estoque.<br />
</p>
<p>N&Atilde;O FECHE ESTA TELA!!! <br />
  <br />
A CADA 20 minutos <em>atualiza&ccedil;&atilde;o din&acirc;mica</em>!!!</p>
<p>
  <?php 

while (odbc_fetch_row($result_mssql)) 
{
?>
  
  <?php $id1=odbc_result($result_mssql,"procodigo"); //echo $id1; ?>  
  <?php $id7=odbc_result($result_mssql,"proEstoqueAtual"); //echo $id7; ?>
  <?php  $id8=odbc_result($result_mssql,"proVenda"); //echo $id8; ?>
  <?php 


$query_mysql = "UPDATE produtos
                SET estoque_atual_produtos = $id7, valor_venda_produtos = $id8
                WHERE cod_fabrica_produtos like '$id1';";
mysql_query($query_mysql,$connect_mysql);

}    
?>
</p>
</body>
</html>
<?php
odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='60;URL=autaliza_cliente.php'>";
?>
