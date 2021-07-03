!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			CURSO: <?php echo $curso->descripcion." ".$curso->nivel." ".$curso->ciclo; ?>
			
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-10">
						<form action="<?php echo base_url(); ?>registro/cursos/insertmodulo" method="POST" enctype="multipart/form-data" id="myForm" >
							<div class="form-group row">
								<input type="hidden" class="form-control" id="curso_id" name="curso_id" value="<?php echo $curso->id;?>" >
								<div class="col-lg-5">
									<label for="descripcion_modulo"> MÓDULO DESCRIPCION :</label>
									<input type="text" class="grandes" id="descripcion_modulo" name="descripcion_modulo" autocomplete="off" required>
								</div>	
								<div class="col-lg-2">	
									<label for="abreviatura_modulo"> ABREBIATURA:</label>
									<input type="text" class="grandes" id="abreviatura_modulo" name="abreviatura_modulo" autocomplete="off" required>
								</div>

								<div class="col-lg-2">
									<label for="">&nbsp;</label>
									<button  type="submit" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
								</div>
							</div>
						</form>

						<form action="<?php echo base_url(); ?>registro/cursos/insertsubmodulo" method="POST" enctype="multipart/form-data" id="myForm1">
							<div class="form-group row">
							<input type="hidden" class="form-control" id="curso_id" name="curso_id" value="<?php echo $curso->id;?>" >
								<div class="col-lg-2">
									<label for="modulo">MODULOS:</label>
									<select name="modulo_id" id="modulo_id" class="form-control" required>
										<option value=""> SELECCIONE</option>
										<?php foreach($combomodulos as $combo):?> 
										<option value="<?php echo $combo->id;?>"> <?php echo $combo->descripcion;?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="col-lg-4">	
									<label for="submodulo"> SUBMODULO:</label>
									<input type="text" class="grandes" id="submodulo" name="submodulo" autocomplete="off" required>
								</div>
								<div class="col-lg-2">	
									<label for="horas"> HORAS:</label>
									<input type="text" class="grandes" id="horas" name="horas" pattern="[0-9]{1,4}" autocomplete="off" required>
								</div>
								<div class="col-lg-2">	
									<label for="costo"> COSTO:</label>
									<input type="text" class="grandes" id="costo" name="costo" pattern="[0-9]{1,4}" autocomplete="off" required>
								</div>

								<div class="col-lg-2">
									<label for="">&nbsp;</label>
									<button  type="submit" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
								</div>
							</div>
						</form>

						<form action="<?php echo base_url();?>registro/cursos/actualizarmodulos" method="POST" id="actualizar">
						<input type="hidden" class="form-control" id="curso_id" name="curso_id" value="<?php echo $curso->id;?>" >
							<table id="tbmodulos" class="table table-bordered table-striped table-hover" style="text-align:center;">
								<thead>
									<tr>
										<th width="5%"style="text-align:center;"><strong>ID</th>
										<th width="30%" style="text-align:center;">DESCRIPCIÓN</th>
										<th width="10%" style="text-align:center;">ABREVIATURA/HORAS</th>
										<th width="10%" style="text-align:center;">COSTO</th>
										<th width="5%" style="text-align:center;">QUITAR</th>
									</tr>
								</thead>
								<tbody>
									<?php $con=1; if (!empty($modulo)) : ?>
										
										<?php foreach ($modulo as $modulos) : ?>
											
											<tr>
												<td ><input type="hidden" class="pequeños" name="idmodulo[]" value="<?php echo $modulos->id; ?>"><label> <?php echo $con; ?></label></td>
												<td><input type="text" class="grandes" name="nombremodulo[]" value="<?php echo $modulos->descripcion; ?>"></td>
												<td><input type="text" class="pequeños" name="abreviaturamodulo[]" value="<?php echo $modulos->abreviatura; ?>"></td>
												<td></td>
												<td><a title="Eliminar detalle del contenido" href="<?php echo base_url();?>registro/cursos/deletemodulo/<?php echo $modulos->id;?>/<?php echo $curso->id;?>" class="btn btn-danger"><span class='fa fa-remove' ></span></a></td>		
											</tr>
											<?php if (!empty($submodulo)) : ?>
												<?php foreach ($submodulo as $submodulos) : ?>
													<?php if( $modulos->id== $submodulos->modulo_id ){  ?>
													<tr> 
														<td><input type="hidden" class="form-control" name="idsubmodulo[]" value="<?php echo $submodulos->id; ?>"></td>
														<td><input type="text" class="grandes" name="nombresubmodulo[]" value="<?php echo $submodulos->descripcion; ?>"></td>
														<td><input type="text"  class="pequeños" name="horasubmodulo[]" value="<?php echo $submodulos->horas; ?>"></td>
														<td>S/. <input type="text" class="pequeños" name="costosubmodulo[]" value="<?php echo $submodulos->costo; ?>"></td>
														<td><a title="Eliminar detalle del contenido" href="<?php echo base_url();?>registro/cursos/deletesubmodulo/<?php echo $submodulos->id;?>/<?php echo $curso->id;?>" class="btn btn-danger" id="eliminar"><span class='fa fa-remove' ></span></a></td>
													</tr>
													<?php } ?>
												<?php endforeach; ?>
											<?php endif; ?>

										<?php $con=$con+1;endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
							<div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-flat">Actualizar</button>
                            </div>
                        </form>	
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
