		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_clientes.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el cliente")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_clientes.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		
	
$( "#guardar_cliente" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_cliente" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
			var nombre_cliente = $("#nombre_cliente"+id).val();
			var dni_cliente = $("#dni_cliente"+id).val();
			var destino_cliente = $("#destino_cliente"+id).val();
			var consignatario1_cliente = $("#consignatario1_cliente"+id).val();
			var telefono_cliente = $("#telefono_cliente"+id).val();
			//var email_cliente = $("#email_cliente"+id).val();
			//var direccion_cliente = $("#direccion_cliente"+id).val();
			var status_cliente = $("#status_cliente"+id).val();
			var nombre_bco_cliente = $("#nombre_bco_cliente"+id).val();
			var fecha_depo_cliente = $("#fecha_depo_cliente"+id).val();
			var num_ope_cliente = $("#num_ope_cliente"+id).val();
			var importe_cliente = $("#importe_cliente"+id).val();
			var fecha_envio_cliente = $("#fecha_envio_cliente"+id).val();
	
			$("#mod_nombre").val(nombre_cliente);
			$("#mod_dni").val(dni_cliente);
			$("#mod_destino").val(destino_cliente);
			$("#mod_consignatario1").val(consignatario1_cliente);
			$("#mod_telefono").val(telefono_cliente);
			//$("#mod_email").val(email_cliente);
			//$("#mod_direccion").val(direccion_cliente);
			$("#mod_estado").val(status_cliente);
			$("#mod_nombre_bco").val(nombre_bco_cliente);
			$("#mod_fecha_depo").val(fecha_depo_cliente);
			$("#mod_num_ope").val(num_ope_cliente);
			$("#mod_importe").val(importe_cliente);
			$("#mod_fecha_envio").val(fecha_envio_cliente);
			$("#mod_id").val(id);
		
		}
	
		
		

