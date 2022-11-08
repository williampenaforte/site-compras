<?php 

// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP
error_reporting(0); 

//EXIBE TODOS OS ERROS DO SISTEMA PHP
//error_reporting(E_ALL ^ E_NOTICE);

//CONEXTA BANCO MSSQLSERVER.
require_once('vaibrasil1.php'); //arquivo com dados para conectar ao servidor...

$sql_mssql = "SELECT ctpCliId,ctpTapId FROM clienteTabPreco"; 
	$result_mssql = odbc_exec($connect_mssql , $sql_mssql);

//Conexao MYsqlServer
require_once('vaibrasil2.php'); //arquivo com dados para conectar ao servidor...

//LIMPA FORMA DE PAGAMENTO
$query_mysql = "DELETE FROM usuarios_fpagamento";
	mysql_query($query_mysql,$connect_mysql);
		$query_mysql = mysql_query($query_mysql,$connect_mysql);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
Atualizando Condição de Pagamento Dos Clientes......<br />
Condição de Pagamento Dos Clientes!!! <br />
<br />Redirecionando.....

<?php 
while (odbc_fetch_row($result_mssql)) 
{
?>

<!--ID.Fabricante:.--> <?php $ctpCliId=odbc_result($result_mssql,"ctpCliId"); //echo $id; ?>
<br />
<!-- Nome.Fabricante:. --> <?php  $ctpTapId=odbc_result($result_mssql,"ctpTapId"); //echo $nome; ?>
<br />
<br />
 
<?php 
//INSERT PARA NOVOS USUARIOS DO SISTEMA!!!.
$query_mysql = "INSERT INTO usuarios_fpagamento (`id_usuario_usu_f_pag`, `id_fpagamento_usu_f_pag`) 
				VALUES ($ctpCliId, '$ctpTapId');";

mysql_query($query_mysql,$connect_mysql);
}    
?>

</body>
</html>

<?php
odbc_close($connect_mssql); 
mysql_close($connect_mysql); 
echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=atualiza_fabricante.php'>";
?>