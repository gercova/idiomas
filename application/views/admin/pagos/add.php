
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PAGOS
        <small>Nuevo</small>
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
                        <form class="form-horizontal" action="<?php echo base_url('movimientos/pagos/store');?>" method="POST">
                            <div class="form-group">
                                <label class="col-md-12" for="">ESTUDIANTE PREMATRICULADO:</label>
                                <div class="input-group col-md-12">
                                    <div class="col-md-2">  
                                        <input type="hidden" name="idapertura" id="idapertura" value="">
                                        <input type="hidden" name="idmatricula" id="idmatricula" value="">
                                        <input type="hidden" name="idestudiante" id="idestudiante" value="">
                                        <input type="hidden" name="id_curso" id="id_curso" value="">
                                        <input type="text" class="form-control" id="dni-estudiante" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="BUSCAR ESTUDIANTE" readonly name="estudiante" id="estudiante" readonly data-toggle="modal" data-target="#modal-prematricula" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" readonly class="form-control" readonly name="curso" id="curso" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" style="color:red;text-align:center" class="form-control" readonly name="deuda" id="deuda">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" onclick="addRow()" id="addRowBtn" data-loading-text="Cargando..."> <i class="glyphicon glyphicon-plus-sign"></i> Agregar vaucher de pago </button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" id="table-payment">
                                <thead>
                                    <tr>			  			
                                        <th style="text-align:center">Concepto</th>
                                        <th style="text-align:center">Vaucher</th>
                                        <th style="text-align:center">Descripción</th>
                                        <th style="text-align:center">Monto</th>
                                        <th style="text-align:center">Fecha</th>		  			
                                        <th style="text-align:center"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
<div class="modal fade bd-example-modal-lg" id="modal-prematricula">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">LISTA DE PREMATRICULADOS</h4>
            </div>
            <div class="modal-body">
                <table id="example5" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DNI</th>
                            <th>ESTUDIANTE</th>
                            <th>CURSO</th>
                            <th>DEUDA</th>
                            <th>OPCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($estudiantes as $e):?>
                            <tr>
                                <td><?php echo $e->matricula;?></td>
                                <td><?php echo $e->dni;?></td>
                                <td><?php echo $e->nombre;?></td>
                                <td><?php echo $e->curso_nivel;?></td>
                                <td><?php echo $e->deuda;?></td>
                                <?php $datapago = $e->apertura."*".$e->matricula."*".$e->estudiante."*".$e->dni."*".$e->nombre."*".$e->curso_nivel."*".$e->deuda."*".$e->curso;?>
                                <td>
                                    <button type="button" class="btn btn-success btn-pagos" value="<?php echo $datapago;?>"><span class="fa fa-check"></span></button>
                                </td>
                            </tr>
                        <?php endforeach;?>
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