<?php 
// BLOQUER QUANDO FOR EFETUAR MANUTENÇÃO
error_reporting(0); 
// LIBERAR APOS MANUTENÇÃO NOS CODIGOS PHP

// Inclui o arquivo com o sistema de seguranca
include("seguranca.php"); 

// Chama a funcao que protege a pagina
protegePagina(); 

//id cliente!! variavel sistema
$id_sessao = $_SESSION['usuarioID'];
// echo $id_sessao;
$usuario_atual = $_POST ['txtsenhaatual'];
//echo $usuario_atual;
$id_usu = $_POST ['txtid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JPA - Mix Produtos</title>
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
  <div id="logo"><a href="localhost/default.php"><img src="images/logo.png" width="450" height="90" border="0" /></a></div>
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
    <h1><strong><span class="style1">Alterar Usuario </span></strong><span class="style2"><br />
      <?php echo " " . $_SESSION['usuarioNome']; ?></span></h1>
    <p>Codigo Cliente:. <span class="style3"><?php echo $_SESSION['usuarioID']; ?></span></p>
  </div>
  <!--fim destaque-->
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
                  <table width="531" border="0">
                    <form nome="login" method="POST" id="searchform" action="alterar_usuario_ok.php">
                    
                    <tr>
                      <td width="133">Usuario Atual </td>
                      <td width="388"><label>
                      
					 <input type="text" name="txtsenhaatual" id="txtsenhaatual" value="<?php echo $usuario_atual; ?>"/>
                      <input name="txtid" type="text" id="txtid" class="invisivel" value="<?php echo $id_usu ?>" />
                      </label></td>
                    </tr>
                    <tr>
                      <td>Novo Usuario </td>
                      <td><label>
                        <input type="text" name="txtnovasenha" />
                        </label></td>
                    </tr>
                    <tr>
                      <td colspan="2"><div align="center">
                          <label> <br />
                          <input type="submit" name="Submit" value="Alterar Usuario" />
                          <span class="style4">_</span> </label>
                          <a href="intra.php">Cancelar</a></div></td>
                    </tr>
                    <form/>
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
    <h1>site @2014 Todos os Direitos Reservados<br />
      <br />
      E-Mail:<a href="mailto:mail@mail.com.br"> mail@mail.com.br</a><br />
      <br />
      <!--<br/>-->
    </h1>
  </div>
  <!--fim footer-->
</div>
<!--fim geral-->
</body>
</html>
