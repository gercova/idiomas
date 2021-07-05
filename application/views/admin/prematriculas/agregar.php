
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        PREMATRICULAS
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-10">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url('prematriculas/prematriculas/store'); ?>" method="POST" id="myForm">    
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input type="hidden" id="id" name="id" value="">
                                    <label for="dni" class="labelfor" > Número de Documento:</label>
                                    <input type="text" class="medianos" id="dni" name="dni" autocomplete="off" required>
                                    <input type="hidden" id="estudiante_id" name="estudiante_id" >
                                    <button id="btn-buscarestu" type="button" class="btn btn-primary  "><span class="fa fa-search"></span> DNI </button>
                                </div>
                                <div class="col-lg-8">                        
                                    <label for="dni" class="labelfor" > ESTUDIANTE:</label>
                                    <input type="text" class="medianos" id="estudiante" name="estudiante" disabled  required>   
                                    <button type="button" class="btn btn-success" data-toggle="modal" readonly data-target="#modal-estudiantes"><span class="fa fa-plus"></span> NUEVO </button>                           
                                </div>    
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="tipos">Tipo Estudiante:</label>
                                    <select name="tipo_id" id="tipo_id" class="form-control" required>
                                        <option value=""> SELECCIONE</option>
                                        <?php foreach($tipos as $tipo):?> 
                                        <option value="<?php echo $tipo->id;?>"> <?php echo $tipo->descripcion;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="carreras">CARRERA:</label>
                                    <select name="carrera_id" id="carrera_id" class="form-control" disabled>
                                        <option value=""> SELECCIONE</option>
                                        <?php foreach($carreras as $carrera):?> 
                                        <option value="<?php echo $carrera->id;?>"> <?php echo $carrera->descripcion;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8"> 
                                        <label for="" class="labelfor">CURSO APERTURADO:</label>
                                        <input type="hidden" name="apertura_id" id="apertura_id">
                                        <input type="hidden" name="costo" id="costo">
                                        <input type="text" size="200%" placeholder="Clic Buscar Curso Aperturado" class="form-control" name="apertura" id="apertura" readonly data-toggle="modal" data-target="#modal-apertura">
                                </div><!-- /input-group -->
                            </div>

                            <div class="modal-footer col-md-10">
                                <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
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

<div class="modal fade bd-example-modal-lg" id="modal-apertura">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">LISTA DE CURSOS APERTURADOS</h4>
            </div>
            <div class="modal-body">
                <table id="example5" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CURSO</th>
                            <th>OPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($aperturas)):?>
                            <?php foreach($aperturas as $apertura):?>
                                <tr>
                                    <td><?php echo $apertura->id;?></td>
                                    <td><?php $como=$apertura->curso." - ". $apertura->nivel." - ".$apertura->ciclo ; echo $como; ?></td>
                                     <?php $dataapertura = $apertura->id."*".$como."*".$apertura->costo;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-apertura" value="<?php echo $dataapertura;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-estudiantes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>           
                </button>
                <h4 class="modal-title modal-title-titulo" id="exampleModalLabel"></h4>
            </div>
            <form id="form_estudiantes">    
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <input type="hidden" id="id" name="id" value="">
                            <label for="dni" class="labelfor" > Número de Documento:</label>
                            <input type="text" class="medianos" id="dni" name="dni" autocomplete="off" required>
                            <input type="hidden" id="tipodocumento" name="tipodocumento" value="1">
                            <button id="btn-consultar-dni" type="button" class="btn btn-primary  "><span class="fa fa-search"></span> DNI </button>
                        </div>
                        <div class="col-xs-8">
                            <label for="nombre" class="labelfor">Nombre Completo:</label>
                            <input class="grandes" type="text" name="nombre" id="nombre" autocomplete="off" required>
                        </div>
                    </div>        
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="celular" class="labelfor">Celular:</label>
                            <input class="grandes" type="text" name="celular" id="celular" pattern="[0-9]{9,11}" autocomplete="off" required>
                        </div>
                        <div class="col-lg-8">
                            <label for="email" class="labelfor">Email:</label>
                            <input class="grandes" type="email" name="email" id="email" pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adicional" class="labelfor">Datos Adicionales:</label>
                        <textarea class="grandes" name="adicional" id="adicional" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
                </div>
            </form>    
        </div>
    </div>
</div>
