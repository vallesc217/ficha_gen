<?php
	/*-------------------------
	Autor: genetica_avicola
	Web: 
	Mail: 
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Nueva Ficha de Venta";	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Ficha de Venta</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");
			include("modal/registro_clientes.php");
			include("modal/registro_productos.php");
			include("modal/registro_deposito.php");
		?>
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="form-group row">
				  
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
					  <input id="id_cliente" type='hidden'>	
				  </div>
				  
				  <label for="dni_cliente" class="col-md-1 control-label">DNI/RUC</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" id="dni_cliente" placeholder="DNI/RUC cliente" readonly>
				  </div>
				  
				  <label for="fecha" class="col-md-2 control-label">Fecha</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
			      </div>
				  
				  <label for="consignatario1_cliente" class="col-md-1 control-label">Consigna.1</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="consignatario1_cliente" placeholder="consignatario" readonly>
				  </div>
				  
				  <label for="con1dni_cliente" class="col-md-1 control-label">DNI/RUC</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" id="con1dni_cliente" placeholder="dni/ruc consignatario" readonly>
				  </div>
				  
				  <label for="destino_cliente" class="col-md-2 control-label">Destino</label>
				  <div class="col-md-3">
				 	  <input type="text" class="form-control input-sm" id="destino_cliente" placeholder="Destino" readonly>
				  </div>

 				  <label for="consignatario2_cliente" class="col-md-1 control-label">Consigna.2</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="consignatario2_cliente" placeholder="consignatario" readonly>
				  </div>

				  <label for="con2dni_cliente" class="col-md-1 control-label">DNI/RUC</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="con2dni_cliente" placeholder="dni/ruc-consignatario" readonly>
				  </div>

				  <label for="tel1" class="col-md-2 control-label">Teléfono</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
				  </div>	
					
				  <label for="mail" class="col-md-1 control-label">Email</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
				  </div> 
				  
				  <label for="fecha_envio_cliente" class="col-md-1 control-label">F.Envio</label>
				  <div class="col-md-3">
				  <input type="text" class="form-control input-sm" id="fecha_envio_cliente" placeholder="fecha de envio" readonly>
			      </div>
							
				  <label for="nombre_bco_cliente" class="col-md-1 control-label">Banco</label>
				  <div class="col-md-3">
				  <input type="text" class="form-control input-sm" id="nombre_bco_cliente" placeholder="banco" readonly>
				  </div>
							
				  <label for="fecha_depo_cliente" class="col-md-1 control-label">F.Deposito</label>
				  <div class="col-md-3">
				  <input type="text" class="form-control input-sm" id="fecha_depo_cliente" placeholder="fecha deposito" readonly>
				  </div>
							
				  <label for="num_ope_cliente" class="col-md-1 control-label">Nro.Ope.</label>
				  <div class="col-md-3">
				  <input type="text" class="form-control input-sm" id="num_ope_cliente" placeholder="N° Operacion" readonly>
				  </div>
							
				  <label for="importe_cliente" class="col-md-1 control-label">Importe</label>
				  <div class="col-md-3">
				  <input type="text" class="form-control input-sm" id="importe_cliente" placeholder="Importe" readonly>
				  </div>

				</div>
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Vendedor</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="id_vendedor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from users order by lastname");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["user_id"];
											$nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];
											if ($id_vendedor==$_SESSION['user_id']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>
						<label for="econom" class="col-md-1 control-label">Est.Econom.</label>
							<div class="col-md-3">
								<select class='form-control input-sm' id="condiciones">
									<option value="1">Pago </option>
									<option value="2">Debe</option>
									<option value="3">Credito Gerencia</option>
									<option value="4"></option>
								</select>
							</div>	
							
						</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">
						<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target=><!--"#nuevoDepo" 
						 <span class="glyphicon glyphicon-plus"></span> Datos Bancarios
						</button>-->
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#pago">
						 <span class="glyphicon glyphicon-search"></span> Agregar pago
						</button>-->
						<button type="submit" class="btn btn-info">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_factura.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#dni_cliente').val(ui.item.dni_cliente);
								$('#consignatario1_cliente').val(ui.item.consignatario1_cliente);
								$('#con1dni_cliente').val(ui.item.con1dni_cliente);
								$('#consignatario2_cliente').val(ui.item.consignatario2_cliente);
								$('#con2dni_cliente').val(ui.item.con2dni_cliente);
								$('#destino_cliente').val(ui.item.destino_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
								$('#nombre_bco_cliente').val(ui.item.nombre_bco_cliente);								
								$('#fecha_depo_cliente').val(ui.item.fecha_depo_cliente);
								$('#num_ope_cliente').val(ui.item.num_ope_cliente);
								$('#importe_cliente').val(ui.item.importe_cliente);
								$('#fecha_envio_cliente').val(ui.item.fecha_envio_cliente);
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#dni_cliente" ).val("");
							$("#consignatario1_cliente" ).val("");
							$("#con1dni_cliente" ).val("");
							$("#consignatario2_cliente" ).val("");
							$("#con2dni_cliente" ).val("");
							$("#destino_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
							$("#nombre_bco_cliente" ).val("");
							$("#fecha_depo_cliente" ).val("");
							$("#num_ope_cliente" ).val("");
							$("#importe_cliente" ).val("");
							$("#fecha_envio_cliente" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#dni_cliente" ).val("");
							$("#consignatario1_cliente" ).val("");
							$("#con1dni_cliente" ).val("");
							$("#consignatario2_cliente" ).val("");
							$("#con2dni_cliente" ).val("");
							$("#destino_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
							$("#nombre_bco_cliente" ).val("");
							$("#fecha_depo_cliente" ).val("");
							$("#num_ope_cliente" ).val("");
							$("#importe_cliente" ).val("");
							$("#fecha_envio_cliente1234567" ).val("");
						}
			});	
	</script>

  </body>
</html>