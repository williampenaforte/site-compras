
<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP
error_reporting(0); 
?>

<?php
//CONEXTA BANCO MSSQLSERVER.
require_once('vaibrasil1.php'); //arquivo com dados para conectar ao servidor... removido do get
$sql_mssql = "select preProIdOrigem, preProIdDestino from produtoEquivalente"; 
$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//Conexao MYsqlServer
require_once('vaibrasil2.php');//arquivo com dados para conectar ao servidor... removido do get

//LIMPA TABELA DE similares.
$query_mysql = "DELETE FROM produtos_similar";

mysql_query($query_mysql,$connect_mysql);
$query_mysql = mysql_query($query_mysql,$connect_mysql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<body>
Atualizando produtos similares!!!

<?php 

while (odbc_fetch_row($result_mssql)) 
{
?>

<?php $id4=odbc_result($result_mssql,"preProIdOrigem"); echo $id4; ?>

<?php $id5=odbc_result($result_mssql,"preProIdDestino"); echo $id5; ?>

<?php 
//INSERT PARA NOVOS USUARIOS DO SISTEMA!!!.
$query_mysql = "INSERT INTO produtos_similar (id_prod_jpa_similar,id_prod_similar) VALUES ($id4,$id5);";

mysql_query($query_mysql,$connect_mysql);

}    

odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=carrega_usuarios_sistema.php'>";

?>
</p>
</body>
</html>