
$(document).ready(function () {
  $("#btn-consultar-dni").on("click", function(event) {
      //console.log("ggfg");
    switch ($("#tipodocumento").val()) {
        case "1":
            if($("#dni").val().length == 8){
                let documento = $("#dni").val();
                $.ajax({
                        url: base_url + "registro/estudiantes/getDNI",
                        method: "POST",
                        data:{documento},
                        dataType: "json"
                })
                    .done(function(result) {
                    let name = result.data;
                    name = name.split("|");
                    name = `${name[0]} ${name[1]} ${name[2]}`;
                    $("#nombre").val(name);
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                    });
                }else{
                    alert("Ingrese el número del DNI");
                }
        break;
        case "2":
            if($("#dni").val().length == 11){
                let documento = $("#dni").val();
                $.ajax({
                        url: base_url + "registrar/estudiantes/getRUC",
                        method: "POST",
                        data:{documento},
                        dataType: "json"
                })
                    .done(function(result) {
                        $("#nombre").val(result.razonSocial);
                        $("#direccion").val(result.direccion);
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                    });
                }else{
                    alert("Ingrese el número del RUC");
                }
            break;
        default:
            break;
    }

  });
});