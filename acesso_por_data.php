<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
    error_reporting(0);
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP

// Inclui o arquivo com o sistema de seguranÃ§a
    include("seguranca.php");

// Chama a funÃ§Ã£o que protege a pÃ¡gina
    protegePagina();

//id cliente!! variavel sistema
    $id_sessao = $_SESSION['usuarioID'];

//teste1
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carrinho Compras</title>
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
-->
</style>
<style>
<!--
.invisivel {color:transparent;background-color:transparent; border: 0px none}
-->
</style>
</head>
<body>
<div id="geral">
<div id="header">
  <div id="logo"><a href="localhost/intra.php">
  <img src="images/logo.png" width="450" height="90" border="0" /></a>
  </div>
  <!--fim logo-->
</div>
<!--fim header-->
<div id="menu">
  <ul>
    <br />
    <li><a href="intra.php">Principal</a></li>
    <li><a href="logout.php">Sair</a></li>
  </ul>
</div>
<!--fim header-->
<div id="content">
  <div id="destaque">
    <h1><strong><span class="style1">Consultar Dados Usuario </span></strong><span class="style2"><br />
    <?php echo " " . $_SESSION['usuarioNome']; ?></span></h1>
    <p>Codigo Cliente:. <span class="style3"><?php echo $_SESSION['usuarioID']; ?></span></p>
  </div>
  <!--fim destaque-->
  <div id="sidebar">
<?php

$usuario = $_POST['txtsenhaatual'];
  
$connect = mysql_connect("localhost","root","********");
mysql_select_db("db_dados",$connect);

$Dados_cliente = "select id,nome, usuario,senha from usuarios where usuario like '$usuario'";

mysql_query($Dados_cliente,$connect);
$query_usuario = mysql_query($Dados_cliente,$connect);

?>
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
<?php while ($linha = mysql_fetch_array($query_usuario)) { ?>
              <td width="900" valign="top"><div align="center">
                 <h2><strong>Cliente <span class="style1"> <?=$linha['nome']?> </span></strong></h2><br />
                 <br /> 
                 <br />
                 <table width="481" border="0">
                 <tr>
				<form nome="form1" method="POST" id="form1" action="altera_usuario.php">
                 <td width="125"><div align="right"><strong>Usuario Atual </strong></div></td>
                 <td width="10">&nbsp;</td>
                 <td width="174"><input type="text" name="txtsenhaatual" value="<?=$linha['usuario']?>" /></td>
                 <td width="160">
                 <div align="left">
                 <input name="txtid" class="invisivel" type="text" value="<?=$linha['id']?>" size="4" maxlength="4" />
                 <label></label>
                 <label>
                 <input type="submit" name="Submit1" value="Alterar Usuario" />
                 </label>
                 </div></td>
				 </form>
	             </tr>
	             <tr>
	             <td>&nbsp;</td>
	             <td>&nbsp;</td>
	             <td>&nbsp;</td>
	             <td>&nbsp;</td>
                 </tr>
	             <tr>
				<form nome="form2" method="POST" id="form2" action="altera_senha.php">
                      <td width="125"><div align="right"><strong>Senha Atual </strong></div></td>
                      <td width="10">&nbsp;</td>
                      <td width="174"><input type="text" name="txtsenhaatual" value="<?=$linha['senha']?>"/></td>
                      <td width="160"><div align="center">
                       <label>
                       <div align="left">
                         <label>
     <input name="txtid" type="text" class="invisivel" id="txtid" value="<?=$linha['id']?>" size="4" maxlength="4" />
                         <input type="submit" name="Submit2" value="Alterar Senha" />
                         </label>
                       </div>
                       </label>
                      </div></td>
				      </form>
                    </tr>

<?php } ?>
                  </table>
                  <p>&nbsp;</p>
                </div></td>
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
    <h1>Site Carrinho Compras @2014 Todos os Direitos Reservados<br />
      <br />
      E-Mail:<a href="mailto:email@email.com.br"> email@email.com.br</a><br />
      <br />
      <!--<br/>-->
    </h1>
  </div>
  <!--fim footer-->
</div>
<!--fim geral-->
</body>
</html>