
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
                                        <input type="text" class="form-control" id="dni-estudiante" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="BUSCAR ESTUDIANTE" readonly name="estudiante" id="estudiante" readonly data-toggle="modal" data-target="#modal-prematricula" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control"  readonly  class="form-control" readonly name="curso" id="curso" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" style="color:red;text-align:center" readonly  class="form-control"  name="deuda" id="deuda" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="concepto">CONCEPTO:</label>
                                    <select class="form-control" name="idconcepto" id="idconcepto">
                                        <?php foreach($concepto as $c):?>
                                            <option value="<?php echo $c->id;?>"><?php echo $c->descripcion;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="descripcion">DESCRIPCIÓN DEL PAGO:</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-add-info-payment">Agregar vaucher de pago</button>
                                </div>
                            </div>
                            <table id="tb-payment" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style='text-align:center'>CODIGO VAUCHER</th>
                                        <th style='text-align:center'>MONTO</th>
                                        <th style='text-align:center'>FECHA PAGO</th>
                                        <th></th>
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
                                <?php $datapago = $e->apertura."*".$e->matricula."*".$e->estudiante."*".$e->dni."*".$e->nombre."*".$e->curso_nivel."*".$e->deuda;?>
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