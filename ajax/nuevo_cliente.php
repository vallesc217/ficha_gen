<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['nombre'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$dni=mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));		
		$destino=mysqli_real_escape_string($con,(strip_tags($_POST["destino"],ENT_QUOTES)));
		$consignatario1=mysqli_real_escape_string($con,(strip_tags($_POST["consignatario1"],ENT_QUOTES)));		
		$con1dni=mysqli_real_escape_string($con,(strip_tags($_POST["con1dni"],ENT_QUOTES)));		
		$consignatario2=mysqli_real_escape_string($con,(strip_tags($_POST["consignatario2"],ENT_QUOTES)));
		$con2dni=mysqli_real_escape_string($con,(strip_tags($_POST["con2dni"],ENT_QUOTES)));		
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		//$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES))); email_cliente, direccion_cliente,
		//$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));'$email','$direccion',
		$estado=intval($_POST['estado']);
		$date_added=date("Y-m-d H:i:s");
		$nombre_bco_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_bco_cliente"],ENT_QUOTES)));
		$fecha_depo_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["fecha_depo_cliente"],ENT_QUOTES)));		
		$num_ope_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["num_ope_cliente"],ENT_QUOTES)));
		$importe_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["importe_cliente"],ENT_QUOTES)));		
        $fecha_envio_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["fecha_envio_cliente"],ENT_QUOTES)));
		
		$sql="INSERT INTO clientes (nombre_cliente, dni_cliente, destino_cliente, consignatario1_cliente, con1dni_cliente, consignatario2_cliente, con2dni_cliente, telefono_cliente, status_cliente, date_added, nombre_bco_cliente, fecha_depo_cliente, num_ope_cliente, importe_cliente, fecha_envio_cliente) VALUES ('$nombre','$dni','$destino','$consignatario1','$con1dni','$consignatario2','$con2dni','$telefono','$estado','$date_added','$nombre_bco_cliente','$fecha_depo_cliente','$num_ope_cliente','$importe_cliente','$fecha_envio_cliente')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>