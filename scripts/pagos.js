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
        $('#id_curso').val(infogrupo[7]);
        $('#modal-prematricula').modal('hide');
    });
});

function addRow(){
	//$("#addRowBtn").button("loading");
    id_curso = $('#id_curso').val();
    if(id_curso != ''){
        //alert($id_curso);
        var tableLength = $("#table-payment tbody tr").length;
        var tableRow;
        var arrayNumber;
        var count;
        if(tableLength > 0){		
            tableRow    = $("#table-payment tbody tr:last").attr('id');
            arrayNumber = $("#table-payment tbody tr:last").attr('class');
            count       = tableRow.substring(3);	
            count       = Number(count) + 1;
            arrayNumber = Number(arrayNumber) + 1;					
        }else{
            // no table row
            count = 1;
            arrayNumber = 0;
        }
        $.ajax({
            url: base_url + 'movimientos/pagos/getCostoCurso',
            type: 'post',
            dataType: 'json',
            data: {id_curso: id_curso},
            success:function(response){
                //$("#addRowBtn").button("reset");
                //console.log(response);			
                var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
                    '<td>'+
                        '<select class="form-control" name="concepto[]" id="concepto'+count+'" required>'+
                            '<option value="">-- Seleccione concepto --</option>';
                            $.each(response, function(index, value) {
                                //console.log(value.id);
                                tr += '<option value="'+value.id+'">'+value.descripcion+' S/.'+value.costo+'</option>';				
                            });						
                        tr += '</select>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number" name="vaucher[]" id="vaucher'+count+'" autocomplete="off" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="descripcion[]" id="descripcion'+count+'" autocomplete="off" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number" name="monto[]" id="monto'+count+'" autocomplete="off" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="date" name="fecha[]" id="fecha'+count+'" autocomplete="off" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
                    '</td>'+
                '</tr>';
                if(tableLength > 0){							
                    $("#table-payment tbody tr:last").after(tr);
                }else{				
                    $("#table-payment tbody").append(tr);
                }		
            } // /success
        });	// get the product data  
    }else{
        alert('Seleccione alumno');
    }
} // /add row

function removeProductRow(row = null) {
	if(row) {
		$("#row"+row).remove();
	}else{
		alert('Algo salió mal, recargue la página');
	}
}
