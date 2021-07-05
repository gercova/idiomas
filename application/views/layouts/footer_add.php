<script src="<?php echo base_url();?>assets/template/swalalert2.js"></script>

<script>
//Función para mostrar alerta
function mostrarAlert(icon, title){
    Swal.fire({
        icon: icon,
        title: title,
    });
}

var statusSend = false;

//Requiere añadir "id=myForm" a elemento form
document.getElementById("myForm").onsubmit = function() { return checkSubmit()};
document.getElementById("myForm1").onsubmit = function() { return checkSubmit()};
document.getElementById("actualizar").onsubmit = function() { return Submit()};
function checkSubmit() {
	mostrarAlert('success','Datos agregados ...');
    if (!statusSend) {
        statusSend = true;
        timer = 2500;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }
}

function Submit() {
	mostrarAlert('success','Datos Actualizados ...');
    if (!statusSend) {
        statusSend = true;
        timer = 2500;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }
}


</script>