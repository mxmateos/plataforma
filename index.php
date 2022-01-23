

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Mysql mediante Funcion</title>
<link type="text/css" href="bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 4px;
}
tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #4CAF50;
    color: white;
}
.main-wrapper{
	width:50%;
	
	background:#E0E4E5;
	border:1px solid #292929;
	padding:25px;
}
hr {
    margin-top: 5px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
</style>
</head>

<body>
<div class="main-wrapper">
<h1>Editar Registros con Función PHP </h1>
<br><br>

<?php
	include("function.php");
	include("conexion.php");
?>
<table border="1" width="100%">
	<tr>
		<th width="41%">Nombres</th>
		<th width="47%">Apellidos</th>
		<th width="12%">Opcion</th>
	</tr>
<?php 
	$sql = "select * from tabla_demo";
	$result = db_query($sql);
	while($row = mysqli_fetch_object($result)){
	?>
	<tr>
		<td>  <a href="#aa" valorr="<?php echo $row->nombres; ?>"   >
			    <?php echo $row->nombres;?>  </a>   </td>
		<td><?php echo $row->apellidos;?></td>

		<td>
		<?php
		if ($row->valor == 0) {
			?>
			<a href="editar_boton.php?id=<?php echo $row->id; ?>&valor=<?php echo $row->valor; ?>"   >
				<button style='background-color:cyan' >Button</button>
			</a>

			<?php
		}
		if ($row->valor ==1) {
			?>
			<a href="editar_boton.php?id=<?php echo $row->id; ?>&valor=<?php echo $row->valor; ?>">
				<button style='background-color:green' >Button</button>
			</a>			<?php
		}
		if ($row->valor == 2) {
			?>
			<a href="editar_boton.php?id=<?php echo $row->id; ?>&valor=<?php echo $row->valor; ?>">
				&nbsp;
			</a>	<?php
		}
			?>
			
			
        </td>

		<td>
<a class="btn btn-primary" href="editar.php?id=<?php echo $row->id; ?>">
<i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
        </td>
	</tr>
	<?php } ?>
</table>
</div>




						<div class="modal fade" id="modal-id">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Grafico:</h4>
									</div>
									<div class="modal-body">
										
									
										<p>
										grafico: <span class="ids" ></span>
										</p>


										<!-- TradingView Widget BEGIN -->
										<div class="tradingview-widget-container">
										<div id="tradingview_beba2"></div>
										<div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
										<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
										<script type="text/javascript">

										</script>
										</div>
										<!-- TradingView Widget END -->
									



									</div>
				
								</div>
							</div>
						</div>




</body>
</html>

<script>

$(function(){
	$('a[href="#aa"]').click(function(e){
  	e.preventDefault();
    var id = $(this).attr('valorr');
    $(".ids").html(id);
    $("#modal-id").modal('show');
	var variable111 = document.getElementsByClassName("ids")[0].innerText;


										new TradingView.widget(
										{
										"width": 980,
										"height": 610,
										"symbol": variable111,
										"interval": "D",
										"timezone": "Etc/UTC",
										"theme": "dark",
										"style": "1",
										"locale": "en",
										"toolbar_bg": "#f1f3f6",
										"enable_publishing": false,
										"allow_symbol_change": true,
										"container_id": "tradingview_beba2"
										}
										);




  })
})

</script>