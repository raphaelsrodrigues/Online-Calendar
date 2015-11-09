<?php
require_once('includes/connect.php');

date_default_timezone_set("Brazil/East");

if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorsaida'])){
$user1 = $_REQUEST['user1'];
$pass1 = $_REQUEST['pass1'];
$user2 = $_REQUEST['user2'];
$pass2 = $_REQUEST['pass2'];
$valorsaida = $_REQUEST['valorsaida'];
	$mes = date('M');
    $dia = date('d');
    $ano = date('Y');
    
    $mes_extenso = array(
        'Jan' => 'Janeiro',
        'Feb' => 'Fevereiro',
        'Mar' => 'Marco',
        'Apr' => 'Abril',
        'May' => 'Maio',
        'Jun' => 'Junho',
        'Jul' => 'Julho',
        'Aug' => 'Agosto',
        'Nov' => 'Novembro',
        'Sep' => 'Setembro',
        'Oct' => 'Outubro',
        'Dec' => 'Dezembro'
    );
$data = "{$dia} de " . $mes_extenso["$mes"];

	$sql="SELECT * FROM Acesso WHERE Nome='$user1' and Senha='$pass1'";
	
	if ($result=$conn->query($sql)){
			
		// Mysqli_num_row is counting table row
		$rowcount=$result->num_rows;
    		
    		if($rowcount==1){
				
				$sql="SELECT * FROM Acesso WHERE Nome='$user2' and Senha='$pass2'";
    
    	if ($result=$conn->query($sql)){
    			
    		// Mysqli_num_row checks if username2 and password2 exist.
    		$rowcount=$result->num_rows;
    		
    		if($rowcount==1){

$horas = date("h:i:sa");

				$sql ="UPDATE ControleCaixa SET Saida1='$user1', Saida2='$user2', ValorSaida='$valorsaida', timeSaida='$horas', StatusSaida = '1' WHERE Data = '$data'";
		
				if ($conn->query($sql) === TRUE) {
						
					header("Location: http://copiadoramoc.com/status.php");
				
				} else { echo "Os dados nao foram inseridos corretamente na Base de Dados."; }
				
			}  else { echo "Nome2 ou Senha2 de Acesso Incorretos."; }
		}

			} else { echo "Nome1 ou Senha1 de Acesso Incorretos."; }		
		}
	}

$conn->close;
?>

<!DOCTYPE html>

<html>

<head>
	<title>Copiadora Montes Claros</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	
	<meta name="description" content="Copiadora Montes Claros é a mais tradicional copiadora da cidade. 
	Cópias, plastificação, encadernação, reforma de livros e documentos, envio de fax, impressão e digitalização 
	de documentos.">
	
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	
  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

 <script src="https://maps.googleapis.com/maps/api/js"></script>
 
 
  </head>
  
  <style>
  	
  	html, body {
    height: initial; !important
}
  	
  </style>

<body>
	
	<a href="index.php"><p style="float:right; padding-right: 20px; padding-top: 20px;">Retornar ao Site</p></a>
	
		<div id="main">
			<table width="100%" style="border: 0px; margin-left: 0px;">
		
	<tr style="border: 0px;">
		
		<td align="center" style="border: 0px;">
		<img src="images/Untitled.png">
		</td>
		
		<td align="center" style="border: 0px;">
			
			<h1 align="center" style="color: #5196D5;">Copiadora Montes Claros</h1>
		<div id="data" style="font-size:25px;  font-family: Arial;"></div>
		</td>
		
		<td align="center" style="border: 0px;">
		<img src="images/Untitled.png">
		</td>
		
	</tr>
	</table>
<br><br><br>
	
	 <div class="login-card">
 	<div id="data"></div>
    <h1>Fechamento do Caixa</h1><br>
  <form action="#" method="post" enctype="multipart/form-data">
   <input type="text" name="user1" placeholder="Nome 1" required>
   <input type="password" name="pass1" placeholder="Senha 1" required>
    <br>
     <input type="text" name="user2" placeholder="Nome 2" required>
    <input type="password" name="pass2" placeholder="Senha 2" required>
    <br>
     <input type="text" name="valorsaida" placeholder="Valor Fechamento do dia" required>
    <input type="submit" name="login" class="login login-submit" value="Concluir">
  </form>

</div>


<script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
   
</div>

<script>

  NomeMes = new Array(12)
    NomeMes[0] = "Janeiro"
    NomeMes[1] = "Fevereiro"
    NomeMes[2] = "Março"
    NomeMes[3] = "Abril"
    NomeMes[4] = "Maio"
    NomeMes[5] = "Junho"
    NomeMes[6] = "Julho"
    NomeMes[7] = "Agosto"
    NomeMes[8] = "Setembro"
    NomeMes[9] = "Outubro"
    NomeMes[10] = "Novembro"
    NomeMes[11] = "Dezembro"
 
 var data=new Date();
 var dia=data.getDate();
  if(dia < 10) {
        dia = "0" + dia;
    }
 var mes=data.getMonth();
 var ano=data.getFullYear();
 
 data = dia + ' de ' + NomeMes[mes] + ' de ' + ano;
 
 document.getElementById("data").innerHTML = data;
 
 </script>


<?php include ('footer.php'); ?>