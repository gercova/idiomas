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
        html += '<td><select class="form-control" name="detalle[]" required><option value="">-- Seleccione --</option><option value="MATRICULA">Matrícula</option><option value="PENSION">Pensión de enseñanza</option><option value="OTROS">Otros</option></select></td>';
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
function addRow(){
    $("#addRowBtn").button("loading");
    var tableLength = $("#productTable tbody tr").length;
    var tableRow;
    var arrayNumber;
    var count;
    if(tableLength > 0){		
        tableRow = $("#productTable tbody tr:last").attr('id');
        arrayNumber = $("#productTable tbody tr:last").attr('class');
        count = tableRow.substring(3);	
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;					
    }else{
        // no table row
        count = 1;
        arrayNumber = 0;
    }
    $.ajax({
        url: 'php_action/fetchProductData.php',
        type: 'post',
        dataType: 'json',
        success:function(response){
            $("#addRowBtn").button("reset");			
            var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
                '<td>'+
                    '<div class="form-group">'+
                    '<select class="form-control" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
                        '<option value="">~~SELECT~~</option>';
                        // console.log(response);
                        $.each(response, function(index, value) {
                            tr += '<option value="'+value[0]+'">'+value[1]+'</option>';							
                        });						
                    tr += '</select>'+
                    '</div>'+
                '</td>'+
                '<td style="padding-left:20px;"">'+
                    '<input type="text" name="rate[]" id="rate'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
                    '<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
                '</td style="padding-left:20px;">'+
                '<td style="padding-left:20px;">'+
                    '<div class="form-group">'+
                    '<input type="number" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
                    '</div>'+
                '</td>'+
                '<td style="padding-left:20px;">'+
                    '<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
                    '<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
                '</td>'+
                '<td>'+
                    '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
                '</td>'+
            '</tr>';
            if(tableLength > 0){							
                $("#productTable tbody tr:last").after(tr);
            }else{				
                $("#productTable tbody").append(tr);
            }		
        } // /success
    });	// get the product data
} // /add row