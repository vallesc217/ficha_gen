<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_nombre'])) {
           $errors[] = "Nombre vacío";
        }  else if ($_POST['mod_estado']==""){
			$errors[] = "Selecciona el estado del cliente";
		}  else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_nombre']) &&
			$_POST['mod_estado']!="" 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$dni_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_dni"],ENT_QUOTES)));
		$destino_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_destino"],ENT_QUOTES)));
		$consignatario1_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_consignatario1"],ENT_QUOTES)));
		$con1dni_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_con1dni"],ENT_QUOTES)));
		$consignatario2_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_consignatario2"],ENT_QUOTES)));
		$con2dni_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_con2dni"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["mod_telefono"],ENT_QUOTES)));
		//$email=mysqli_real_escape_string($con,(strip_tags($_POST["mod_email"],ENT_QUOTES)));
		//$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_direccion"],ENT_QUOTES)));
		$estado=intval($_POST['mod_estado']);
		$nombre_bco_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre_bco"],ENT_QUOTES)));
		$fecha_depo_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fecha_depo"],ENT_QUOTES)));		
		$num_ope_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_num_ope"],ENT_QUOTES)));
		$importe_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_importe"],ENT_QUOTES)));		
        $fecha_envio_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["mod_fecha_envio"],ENT_QUOTES)));

		$id_cliente=intval($_POST['mod_id']);
		$sql="UPDATE clientes SET nombre_cliente='".$nombre."', dni_cliente='".$dni_cliente."', destino_cliente='".$destino_cliente."', consignatario1_cliente='".$consignatario1_cliente."', con1dni_cliente='".$con1dni_cliente."', consignatario2_cliente='".$consignatario2_cliente."', con2dni_cliente='".$con2dni_cliente."', telefono_cliente='".$telefono."', status_cliente='".$estado."', nombre_bco_cliente='".$nombre_bco_cliente."', fecha_depo_cliente='".$fecha_depo_cliente."', num_ope_cliente='".$num_ope_cliente."', importe_cliente='".$importe_cliente."', fecha_envio_cliente='".$fecha_envio_cliente."' WHERE id_cliente='".$id_cliente."'";
		//$sql="UPDATE clientes SET nombre_cliente='".$nombre."', dni_cliente='".$dni_clinete."', destino_cliente='".$destino_cliente."', consignatario1_cliente='".$consignatario1_cliente."', con1dni_cliente='".$con1dni_cliente."', consignatario2_cliente='".$consignatario2_cliente."', con2dni_cliente='".$con2dni_cliente."', telefono_cliente='".$telefono."', email_cliente='".$email."', direccion_cliente='".$direccion."', status_cliente='".$estado."' WHERE id_cliente='".$id_cliente."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Cliente ha sido actualizado satisfactoriamente.";
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