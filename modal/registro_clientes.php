	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>AGREGAR NUEVO CLIENTE</h4>
			<h5 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>(Favor incluir sus datos en Letras Mayusculas)</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="dni" class="col-sm-3 control-label">DNI/RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="dni" name="dni" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="destino" class="col-sm-3 control-label">Destino</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="destino" name="destino" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="consignatario1" class="col-sm-3 control-label">consignatario1</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="consignatario1" name="consignatario1" >
			    </div>
			  </div>
			  <div class="form-group">
				<label for="con1dni" class="col-sm-3 control-label">DNI/RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="con1dni" name="con1dni" >
				</div>
			  </div>

			  <div class="form-group">
				<label for="consignatario2" class="col-sm-3 control-label">consignatario2</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="consignatario2" name="consignatario2" >
			    </div>
			  </div>
			  <div class="form-group">
				<label for="con2dni" class="col-sm-3 control-label">DNI/RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="con2dni" name="con2dni" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Telefono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" >
				</div>
			  </div>
			 <!-- <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direccion" name="direccion"   maxlength="255" ></textarea>
				  
				</div>
			  </div>-->
			  
			  <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="estado" name="estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			 
			  <div class="form-group">
				<label for="nombre_bco" class="col-sm-3 control-label">Banco</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre_bco" name="nombre_bco" required>
				</div>
			  </div>
              <div class="form-group">
				<label for="fecha_depo" class="col-sm-3 control-label">Fecha deposito</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="fecha_depo" name="fecha_depo" placeholder="dd-mm-aaaa(1) // dd-mm-aaaa(2) // dd-mm-aa(3)" >
				</div>
			  </div>
              <div class="form-group">
				<label for="num_ope" class="col-sm-3 control-label">Numero Operacion</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="num_ope" name="num_ope" placeholder="numero(1) // numero(2) // numero(3)" >
				</div>
			  </div>
              <div class="form-group">
				<label for="importe" class="col-sm-3 control-label">Importe</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="importe" name="importe" placeholder="S/XXXX(1) // S/XXXX(2) // S/XXXX(3)" >
			    </div>
			  </div>
              <div class="form-group">
				<label for="fecha_envio" class="col-sm-3 control-label">Fecha envio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="fecha_envio" name="fecha_envio" >
				</div>
			  </div>
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>