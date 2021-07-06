$(document).ready(function(){
    // DATOS DEL ALUMNO FORMULARIO PAGOS
    $(document).on('click', '.btn-pagos', function(){
        grupo = $(this).val();
        infogrupo = grupo.split("*");
        $('#idapertura').val(infogrupo[0]);
        $('#idmatricula').val(infogrupo[1]);
        $('#idestudiante').val(infogrupo[2]);
        $('#dni-estudiante').val(infogrupo[3]);
        $('#estudiante').val(infogrupo[4]);
        $('#curso').val(infogrupo[5]);
        $('#deuda').val(infogrupo[6]);
        $('#modal-prematricula').modal('hide');
    });
    // TABLA PAGOS
    $('.btn-add-info-payment').on('click', function(){
        html = '<tr>';
        html += '<td><input type="number" class="form-control" name="codigo[]" required></td>';
        html += '<td><input type="number" class="form-control" name="monto[]" required></td>';
        html += '<td><input type="date" class="form-control" name="fecha[]" required></td>';
        html += '<td><button type="button" class="btn btn-danger btn-remove-info"><span class="fa fa-remove"></span></button></td>';
        html += '</tr>';
        $('#tb-payment tbody').append(html);
    });
    // remover modulos filas de la tabla
    $(document).on('click','.btn-remove-info', function(){
        $(this).closest('tr').remove();
    });
});