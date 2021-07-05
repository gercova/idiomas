
$(document).ready(function () {
    $("#btn-buscarestu").on("click", function(event) {             
    if($("#dni").val()) {
        var uno = $("#dni").val();
      // alert(uno);
        $.ajax({
              url: base_url + "prematriculas/prematriculas/buscarestud",
              method: "POST",
              data:{dni:uno},
              dataType: "json"
            })
            .done(function(result) {
            // console.log(result);
                $("#estudiante_id").val(result.id);
                $("#estudiante").val(result.nombre);
            })
          .fail(function(jqXHR, textStatus, errorThrown) {
                });
            }else{
                alert("Ingrese DNI/RUC del Estudiante");
      }
   });


   $(document).on("click",".btn-apertura",function(){
    apertura = $(this).val();
    infoapertura = apertura.split("*");
    $("#apertura_id").val(infoapertura[0]);
    $("#apertura").val(infoapertura[1]);
    $("#costo").val(infoapertura[2]);
    $("#modal-apertura").modal("hide");
    });

    $("#tipo_id").change(function(){
      if ($(this).val() != "1") {
        $("#carrera_id").prop("disabled", true);
    } else {
        $("#carrera_id").prop("disabled", false);
    }
      })
});