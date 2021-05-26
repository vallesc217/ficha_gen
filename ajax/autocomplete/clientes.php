<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM clientes where nombre_cliente like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_cliente=$row['id_cliente'];
		$row_array['value'] = $row['nombre_cliente'];
		$row_array['id_cliente']=$id_cliente;
		$row_array['nombre_cliente']=$row['nombre_cliente'];
		$row_array['dni_cliente']=$row['dni_cliente'];
		$row_array['consignatario1_cliente']=$row['consignatario1_cliente'];
		$row_array['con1dni_cliente']=$row['con1dni_cliente'];
		$row_array['destino_cliente']=$row['destino_cliente'];
		$row_array['consignatario2_cliente']=$row['consignatario2_cliente'];
		$row_array['con2dni_cliente']=$row['con2dni_cliente'];
		$row_array['telefono_cliente']=$row['telefono_cliente'];
		$row_array['email_cliente']=$row['email_cliente'];
		$row_array['nombre_bco_cliente']=$row['nombre_bco_cliente'];
		$row_array['fecha_depo_cliente']=$row['fecha_depo_cliente'];
		$row_array['num_ope_cliente']=$row['num_ope_cliente'];
		$row_array['importe_cliente']=$row['importe_cliente'];
		$row_array['fecha_envio_cliente']=$row['fecha_envio_cliente'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>