

<?php 
include("function.php");
include("conexion.php");
$id = $_GET['id'];
$valor = $_GET['valor'];
select_id('tabla_demo','id',$id);
	


	if ($valor == 0) {$valor = 1;}
	else if ($valor == 1)  {$valor = 2;}
	else if ($valor == 2)  {$valor = 3;}
	else if ($valor == 3)  {$valor = 0;}


	$field = array("valor"=>$valor);
	$tbl = "tabla_demo";
	edit($tbl,$field,'id',$id);
	
	header("location:index.php");
	
?>
