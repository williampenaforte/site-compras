<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
error_reporting(0); 
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP
?>

<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de seguranÃ§a
protegePagina(); // Chama a funÃ§Ã£o que protege a pÃ¡gina

$id_sessao = $_SESSION['usuarioID']; //RECEBE O CODIGO DE QUEM ESTA LOGADO DA SESSÃO 
//echo $id_sessao;?><br/><?php
$senha_atual_formulario = $_POST['txtsenhaatual']; //RECEBE DO FORMULARIO NOVA SENHA SENHA ATUAL 
//echo $senha_atual_formulario;?><br/><?php
$nova_senha_formulario = $_POST['txtnovasenha']; // RECEBO DE FORMULARIO NOVA SENHA À NOVA SENHA! 
//echo $nova_senha;?><br/><?php
$idusu = $_POST['txtid']; // RECEBO DE FORMULARIO NOVA SENHA À NOVA SENHA! 
//echo $idusu;?><br/><?php
/* Dados do banco MYQSL-qbex-local
$connect_altera_senha = mysql_connect("localhost","root","*****");
mysql_select_db("dbtable",$connect_altera_senha);


$sql_consulta_senha = "select senha from usuarios where senha like '$senha_atual'";

mysql_query($sql_consulta_senha,$connect_altera_senha);
$query_grid = mysql_query($sql_consulta_senha,$connect_altera_senha);
*/
?>

<?php
//conecção php com sql server local-sistem-desktop....
/*$connect = odbc_connect("DRIVER={SQL Server}; SERVER=192.168.1.100;  DATABASE=bansedados;", "banco","senha");
$sql = "SELECT top(2) * FROM cliente
where not cliNome like 'consumidor'
and not clinome like 'maxdata'"; 
$result = odbc_exec($connect , $sql);

while (odbc_fetch_row($result)) 
{
//echo odbc_result($result, "clinome") ."<BR/>";
//echo odbc_result($result, "clicpfcgc") ."<BR/><BR/>";
}

/*
odbc_close($connect);
*/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>site</title>
<link href="style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- include Cycle plugin -->
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
</script>
<style type="text/css">
<!--
.style1 {color: #006500}
.style2 {
	font-size: 15px;
	color: #F7AE52;
}
.style3 {
	font-size: 12px;
	color: #F7AE52;
	font-weight: bold;
}
.style4 {color: #FFFFFF}
.style5 {color: #6B8410}
-->
</style>
</head>

<body>
<div id="geral">
	<div id="header">
		<div id="logo">
			
			<img src="images/logo.png" width="350" height="80" border="0" />
			
		</div><!--fim logo-->		
		
	</div><!--fim header-->
	
	<div id="menu">
				<ul>
			<li><a href="intra.php">Principal</a></li>
			<li><a href="logout.php">Sair</a></li>
        </ul>
	</div><!--fim header-->
	
	<div id="content">
		<div id="destaque">
			<h1><strong><span class="style1">Alterar Usuario </span></strong><span class="style2"><br /> 
          <?php echo " " . $_SESSION['usuarioNome']; ?></span></h1>
			
			<p>Codigo Cliente:. <span class="style3"><?php echo $_SESSION['usuarioID']; ?></span></p>
		</div><!--fim destaque-->
		
	  <div id="sidebar">
	  <!--  <table width="900" height="27" border="1" align="center"> -->
          <tr>
            <td><a href="default.php"></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">
                <table width="900" border="0">
                  <tr>
                    <td width="900" valign="top"><div align="center">
                      <p>&nbsp;</p>
                      <table width="605" border="0">
					   <form nome="login" method="POST" id="searchform" action="alterar_senha_ok.php">
                        
                        <tr>
                          <td width="324"><div align="right"><span class="style5">Obs:</span>.</div></td>
                          <td width="271"><label>
						  
<?PHP 


// Dados do banco MYQSL-qbex-local
$connect_altera_senha = mysql_connect("localhost","root","senha");
mysql_select_db("nome_db_empresa",$connect_altera_senha);

//consulta banco para compara senha no if abaixo
$sql_consulta_senha = "select id,senha from usuarios where id = '$idusu'";


//executa consulta fisicamente
mysql_query($sql_consulta_senha,$connect_altera_senha);
$query_grid = mysql_query($sql_consulta_senha,$connect_altera_senha);



//carrega a consulta em uma variavel para analize
while ($linha_pesquisa = mysql_fetch_array($query_grid)) 
{ 
$senha_atual_banco =$linha_pesquisa['senha'];
} 


//if para liberar a alteração de senha ou nao
if ($senha_atual_formulario == $senha_atual_banco) {
   
    echo 'Usuario Alterada com sucesso!!! Redirecionando para pagina inicial...';
		
		//consulta banco para compara senha no if abaixo
$sql_altera_senha = "UPDATE usuarios SET `senha` = '$nova_senha_formulario' WHERE id = '$idusu'";
		//executa consulta fisicamente
		mysql_query($sql_altera_senha,$connect_altera_senha);
		//$query_grid = mysql_query($sql_altera_senha,$connect_altera_senha);
		header("location: intra.php");
		
	
		} else {
    		echo 'Dados incorretos. Repita a operação';
}
?>
						  
						  </label></td>
                        </tr>
                        <tr>
                          <td><div align="right"><span class="style5">Usuario:.</span> </div></td>
                          <td><label>
						  
<?php echo $nova_senha_formulario?>

</label></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div align="center">
                            <label> <br />
                            </label>
                          </div></td>
                        </tr>
						<form/>
                      </table>
                      <p>&nbsp;</p>
                      </div>					</td>
                  </tr>
              </table>
            </div></td>
          </tr>
          <div id="sidebar-right">
          <!--fim slides-->
          <!--sidebar-right-->
	  </div>
      </div>
	  <div id="footer">
		<h1>site @2014 Todos os Direitos Reservados <br />
	      <br />
        E-Mail:<a href="mailto:mail@mail.com"> mail@mail.com</a><br />
		<br /><!--<br/>--></h1>

	</div><!--fim footer-->


</div><!--fim geral-->
</body>
</html>
<?php
//mysql_close($connect_altera_senha); 
//mysql_close($connect); 
?>