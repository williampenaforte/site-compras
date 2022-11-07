
<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
error_reporting(0); 
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP
?>
<?php
//CONEXTA BANCO MSSQLSERVER.
require_once('vaibrasil1.php'); //arquivo com dados para conectar ao servidor... removido do get
$sql_mssql = "SELECT proid, procodigo, prodescricao, profab, proUn, zzz_proEstoqueAtual, proVenda FROM produto 
where proDesativaProd = 0"; 
$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//Conexao MYsqlServer
require_once('vaibrasil2.php'); //arquivo com dados para conectar ao servidor... removido do get

//LIMPA TABELA DE FABRICAS.
$query_mysql = "DELETE FROM produtos"; // removendo item para atualização afim de reduzir custo de processando fazendo where e posrteiromente update. deletamos e iserimo dados novos.. praticidade pois os dados exibidos so server para o internauta.. uma base de dados era manupulada por outro software internamente na empresa.

mysql_query($query_mysql,$connect_mysql);
$query_mysql = mysql_query($query_mysql,$connect_mysql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<body>
<p>Atualizando, Pre&ccedil;os, estoque e cadastrando novos produtos!!!!<br />
</p>
<p>
  <?php 

while (odbc_fetch_row($result_mssql)) 
{
?>
  
  <?php $id1=odbc_result($result_mssql,"proid"); //echo $id1; ?>
  
  <?php $id2=odbc_result($result_mssql,"procodigo"); //echo $id2; ?>
  
   <?php $id4=odbc_result($result_mssql,"prodescricao"); //echo $id4; ?>
  
  <?php $id5=odbc_result($result_mssql,"profab"); //echo $id5; ?>
  
  <?php $id6=odbc_result($result_mssql,"proUn"); //echo $id6; ?>
  
  <?php $id7=odbc_result($result_mssql,"zzz_proEstoqueAtual"); //echo $id7; ?>
  
  <?php  $id8=odbc_result($result_mssql,"proVenda"); //echo $id8; ?>
  
  
  
  <?php 
//INSERT PARA NOVOS USUARIOS DO SISTEMA!!!.
$query_mysql = "
INSERT INTO produtos (`id_jpa_produtos`,
					`cod_fabrica_produtos`,
					`desc_produtos`,
					`id_fab_produtos`,
					`unidade_produtos`,
					`estoque_atual_produtos`,
					`valor_venda_produtos`) 
VALUES (
'$id1',
'$id2',
'$id4',
'$id5',
'$id6',
'$id7',
'$id8'
);";

mysql_query($query_mysql,$connect_mysql);

}    
?>
</p>
</body>
</html>
<?php
odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=atualiza_produtos_similar.php'>";
?>
