<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Apertura Curso
			<small>Nuevo</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-8">
						<?php if($this->session->flashdata("error")) : ?>
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
							</div>
				            </div>
						<?php endif; ?>
						<form action="<?php echo base_url('prematriculas/aperturas/store'); ?>" method="POST">

							<div class="form-group">
								<div class="col-md-6">
									<label for="">CURSO:</label>
										<input type="hidden" name="idcurso" id="idcurso" value="<?php echo set_value("idcurso"); ?>">
										<input type="text" size="100%"class="form-control" data-toggle="modal" data-target="#modal-curso" name="curso" id="curso" readonly value="<?php echo set_value("curso"); ?>" required>
		
								</div>
							</div>

                            <div class="form-group">
								<div class="form-group col-md-6">
	                                <label for="sede_id">SEDE  : </label>
	                                <select  class="form-control" id="idsede" name="idsede" required>
	                                	<?php foreach ($sedes as $s) : ?>
										    <option value="<?php echo $s->id;?>" ><?php echo $s->descripcion;?></option>
										<?php endforeach; ?>
	                                </select>    
                                </div>                           
                            </div>

							<div class="form-group">
								<div class="col-md-6">
									<label for="">FECHA INICIO (tentativa):</label>
									<input type="date"  class="form-control" name="fecha_ini" id="fecha_ini" value="<?php echo set_value("fecha_ini")? set_value("fecha_ini"):date('Y-m-d'); ?>">
								</div>
							</div>
	
							<div class="form-group">
								<div class="form-group col-md-6">
	                                <label for="estado_inscripcion">Estado inscripcion  : </label>
	                                <select  class="form-control" id="estado_inscripcion" name="estado_inscripcion">
	                                    <option selected value="abierto">Abierto</option>
	                                    <option value="cerrado">Cerrado</option>
	                                </select>    
                                </div>                           
                            </div>
							<div class="form-group">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success pull-right ">Guardar</button>
								</div>

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

<div class="modal fade bd-example-modal-lg" id="modal-curso">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Lita de Cursos</h4>
			</div>
			<div class="modal-body">
				<table id="example1" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>NOMBRE</th>
							<th>OPCIÓN</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($cursos)) : ?>
							<?php foreach ($cursos as $curso) : ?>
								<tr>
									<td><?php echo $curso->id; ?></td>
									<td><?php echo $curso->descripcion; ?></td>
									<?php $datacurso = $curso->id."*".$curso->costo; ?>
									<td>
										<button type="button" class="btn btn-success btn-cursoape" value="<?php echo $datacurso; ?>"><span class="fa fa-check"></span></button>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->