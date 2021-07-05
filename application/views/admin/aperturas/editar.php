<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        APERTURA
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url('prematriculas/aperturas/store');?>" method="POST" id="myForm">
							<input type="hidden" name="idapertura" value="<?php echo $apertura->id;?>">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">CURSO:</label>
                                    <input type="hidden" name="idcurso" id="idcurso" value="<?php echo form_error("idcurso") !=false ? set_value("idcurso") : $apertura->cursos_id;?>">
                                    <input type="text" size="100%" class="form-control" name="curso" id="curso" readonly  value="<?php echo form_error("curso") !=false ? set_value("curso") : $apertura->curso." - ".$apertura->curso;?>">
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-6">
                                    <label for="sede_id">Sede  : </label>
                                    <select  class="form-control" id="idsede" name="idsede">
                                        <option value="">-- Seleccione sede --</option>
                                        <?php foreach ($sedes as $s) : ?>
                                            <option value="<?php echo $s->id;?>" <?php echo $s->id == $apertura->sede_id ? 'selected':'';?> ><?php echo $s->descripcion;?></option>
                                        <?php endforeach; ?>
                                    </select>     
                                </div>                           
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">FECHA INICIO (tentativa):</label>
                                    <input type="date"  class="form-control" name="fecha_ini" id="fecha_ini" value="<?php echo form_error("fecha_ini") !=false ? set_value("fecha_ini") : $apertura->fecha;?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="estado">Inscripcion web : </label>
                                    <select  class="form-control" id="estado_inscripcion" name="estado_inscripcion">
                                        <option <?php $apertura->act_web == '1'? 'selected':''; ?> value="1">Abierto</option>
                                        <option <?php $apertura->act_web == '0'? 'selected':''; ?> value="0">Cerrado</option>
                                    </select>       
                                </div>                        
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Guardar</button>
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
                <h4 class="modal-title">LISTA DE CURSOS</h4>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>OPCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($cursos)):?>
                            <?php foreach($cursos as $curso):?>
                                <tr>
                                    <td><?php echo $curso->id;?></td>
                                    <td><?php echo $curso->nombre;?></td>
                                    <?php $datacurso = $curso->id."*".$curso->nombre."*".$curso->costo;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-grupoape" value="<?php echo $datacurso;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
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