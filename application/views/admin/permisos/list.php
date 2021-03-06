<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PERMISOS
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($permisos1->insert == 1):?> 
                        <a href="<?php echo base_url();?>administrador/permisos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Permiso</a>
                        <?php endif;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MENÚ</th>
                                    <th>ROL</th>
                                    <th>LEER</th>
                                    <th>INSERTAR</th>
                                    <th>ACTUALIZAR</th>
                                    <th>ELIMINAR</th>
                                    <th>OPCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($permisos)):?>
                                    <?php foreach($permisos as $permiso):?>
                                        <tr>
                                            <td><?php echo $permiso->id;?></td>
                                            <td><?php echo $permiso->menu;?></td>
                                            <td><?php echo $permiso->rol;?></td>
                                            <td>
                                                <?php if($permiso->read == 0):?>
                                                    <span class="fa fa-times"></span>
                                                 <?php else:?>  
                                                    <span class="fa fa-check"></span>
                                                <?php endif;?>  
                                            </td>
                                            <td>
                                            <?php if($permiso->insert == 0):?>
                                                    <span class="fa fa-times"></span>
                                                 <?php else:?>  
                                                    <span class="fa fa-check"></span>
                                                <?php endif;?>  
                                            </td>

                                            <td>
                                                <?php if($permiso->update == 0):?>
                                                    <span class="fa fa-times"></span>
                                                 <?php else:?>  
                                                    <span class="fa fa-check"></span>
                                                <?php endif;?>  
                                            </td>

                                            <td>
                                                <?php if($permiso->delete == 0):?>
                                                    <span class="fa fa-times"></span>
                                                 <?php else:?>  
                                                    <span class="fa fa-check"></span>
                                                <?php endif;?>
                                            </td>


                                            <td>
                                                <div class="btn-group">
                                                    <?php if($permisos1->update == 1):?>
                                                    <a href="<?php echo base_url()?>administrador/permisos/edit/<?php echo $permiso->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif;?>
                                                    <?php if($permisos1->delete == 1):?>
                                                    <a href="<?php echo base_url();?>administrador/permisos/delete/<?php echo $permiso->id;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                                    <?php endif;?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">INFORMACIÓN DE LOS PERMISOS</h4>
      </div>
      <div class="modal-body">
        
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
