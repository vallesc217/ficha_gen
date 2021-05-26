<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
    /*Inicia validacion del lado del servidor*/
    if (empty($_POST['nombre_bco'])) {
        $errors[] = "Nombre Banco vacío";
     } else if (!empty($_POST['nombre_bco'])){
     /* Connect To Database*/
     require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
     require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
     // escaping, additionally removing everything that could be (html/javascript-) code
        $nombre_bco=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_bco"],ENT_QUOTES)));
		$fecha_depo=mysqli_real_escape_string($con,(strip_tags($_POST["fecha_depo"],ENT_QUOTES)));		
		$num_ope=mysqli_real_escape_string($con,(strip_tags($_POST["num_ope"],ENT_QUOTES)));
		$importe=mysqli_real_escape_string($con,(strip_tags($_POST["importe"],ENT_QUOTES)));		
        $fecha_envio=mysqli_real_escape_string($con,(strip_tags($_POST["fecha_envio"],ENT_QUOTES)));
        $sql="INSERT INTO deposito (nombre_bco, fecha_depo, num_ope, importe, fecha_envio) VALUES ('$nombre_bco','$fecha_depo','$num_ope','$importe','$fecha_envio')";
        $query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Deposito ha sido ingresado satisfactoriamente.";
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