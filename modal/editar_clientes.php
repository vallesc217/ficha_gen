	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> EDITAR CLIENTE</h4>
			<h5 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>(Favor incluir sus datos en Letras Mayusculas)</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombre" name="mod_nombre"  required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_dni" class="col-sm-3 control-label">DNI/RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_dni" name="mod_dni">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_destino" class="col-sm-3 control-label">Destino</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_destino" name="mod_destino">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_consignatario1" class="col-sm-3 control-label">Consignatario1</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_consignatario1" name="mod_consignatario1">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_con1dni" class="col-sm-3 control-label">DNI/RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_con1dni" name="mod_con1dni">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_consignatario2" class="col-sm-3 control-label">Consignatario2</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_consignatario2" name="mod_consignatario2">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_con2dni" class="col-sm-3 control-label">DNI/RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_con2dni" name="mod_con2dni">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_telefono" name="mod_telefono">
				</div>
			  </div>
			  
			 <!-- <div class="form-group">
				<label for="mod_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				 <input type="email" class="form-control" id="mod_email" name="mod_email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_direccion" name="mod_direccion" ></textarea>
				</div>
			  </div>-->
			  
			  <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			  
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> INCLUIR DEPOSITO</h4>
			</div>
			  <div class="form-group">
				<label for="mod_nombre_bco" class="col-sm-3 control-label">Banco</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombre_bco" name="mod_nombre_bco" required>
				</div>
			  </div>
              <div class="form-group">
				<label for="mod_fecha_depo" class="col-sm-3 control-label">Fecha deposito</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_fecha_depo" name="mod_fecha_depo" placeholder="dd-mm-aaaa(1) // dd-mm-aaaa(2) // dd-mm-aa(3)" >
				</div>
			  </div>
              <div class="form-group">
				<label for="mod_num_ope" class="col-sm-3 control-label">Numero Operacion</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_num_ope" name="mod_num_ope" placeholder="numero(1) // numero(2) // numero(3)" >
				</div>
			  </div>
              <div class="form-group">
				<label for="mod_importe" class="col-sm-3 control-label">Importe</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="mod_importe" name="mod_importe" placeholder="S/XXXX(1) // S/XXXX(2) // S/XXXX(3)" >
			    </div>
			  </div>
              <div class="form-group">
				<label for="mod_fecha_envio" class="col-sm-3 control-label">Fecha envio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_fecha_envio" name="mod_fecha_envio" >
				</div>
			  </div>
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>