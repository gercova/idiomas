!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        USUARIO
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

                        <form action="<?php echo base_url();?>administrador/usuarios/store" method="POST">
                            <div class="form-group">
                                <label for="nombres">NOMBRE:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres">
                            </div>

                            <div class="form-group">
                                <label for="apellidos">APELLIDO:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos">
                            </div>

                            <div class="form-group">
                                <label for="telefono">TELEFONO:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>

                            <div class="form-group">
                                <label for="email">CORREO ELECTRONICO:</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="username">USUARIO:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>

                            <div class="form-group">
                                <label for="password">CONTRASEÑA:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="rol">ROLES:</label>
                                <select name="rol" id="rol" class="form-control">
                                    <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id;?>"> <?php echo $rol->nombre;?></option>
                                    <?php endforeach;?>
                                </select>


                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
