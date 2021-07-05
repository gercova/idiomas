<script>
    var base_url= "<?php echo base_url();?>";
    let permisos = JSON.parse('<?php echo json_encode($permisos) ?>');
        $(document).ready(() => {
            $('#modalCRUD').on('hidden.bs.modal', function (e) {
                $("#id").val('').prop('disabled', false);
                $("#descripcion").val('').prop("disabled", false);
                $("#silabus").val('').prop("disabled", false);
                $("#ciclos").val('').prop("disabled", false);
                $("#niveles").val('').prop("disabled", false);
                $("#web").val('').prop("disabled", false);
                $("#btnGuardar").prop('disabled', false);  
                $("#btn-consultar-dni").prop('disabled', false); 
            })

            $('#listado').jtable({
                title : "CURSOS",
                paging : true,
                overflow: scroll,
                pageSize: true, //nos muestra el dni de registros
                sorting : true, // ordenar registros
                defaultSorting: 'Orde date ASC', // ordenado ascendente
                actions: {
                    listAction: '<?php echo site_url(); ?>registro/cursos/lista',
                },
                
                toolbar: {
                    items: [
                        {
                            cssClass: 'buscador',
                            text: buscador
						},
                        {
                            cssClass: 'btn-primary hide',
                            text: `<i class="fa fa-plus"></i> Nuevo`,
                            click: function () {
                            console.log(permisos)
                                if (permisos.insert === '1'){
                                    newRecord();
                                }
                            }
                        }
                    ]
                },
                fields: {
                    id:{
                        key:true,
                        title: 'ID',
                        width: '5%' ,
                    },                             
                    descripcion:{
                        title: 'CURSO',
                        width: '20%' ,
                    },
<<<<<<< HEAD
=======
                    nivel:{
                        title: 'NIVEL',
                        width: '20%' ,
                    }, 
                    ciclo:{
                        title: 'CICLO',
                        width: '20%' ,
                    },  
>>>>>>> 65dade8070fd25ab25ce9971fb4f77ccf119140b
                    silabus:{
                        title: 'SILABUS',
                        width: '20%' ,
                        display: function (data) {
                            return `<a href='../uploads/silabus/${data.record.silabus}'>${data.record.silabus}</a>`
                             
                        }
                    },
<<<<<<< HEAD
                    ciclo:{
                        title: 'CICLO',
                        width: '20%' ,
                    },  
                    nivel:{
                        title: 'NIVEL',
                        width: '20%' ,
                    },   
=======
                   //if(web==1){act="MOSTRAR"},    
>>>>>>> 65dade8070fd25ab25ce9971fb4f77ccf119140b
                    web:{
                        title: 'WEB',
                        width: '20%' ,
                        display: function (data) {
                            let is_show = (data.record.web === '1') ? `MOSTRAR`: `NO MOSTRAR`;
                            return is_show
                        }
                    },           
                    see: {
                        width: '1%',
                        sorting:false,
                        edit:false,
                        create:false,
                        display: (data) => {
                            if(permisos.read === '1'){
                                return `<a href="javascript:void(0)" class="view-row" data-id="${data.record.id}" title="Ver">
                                <i class="fa fa-eye" aria-hidden="true"></i></a>`;
                            }
                        }
                    },
                    edit: {
                        width: '1%',
                        sorting:false,
                        edit:false,
                        create:false,
                        display: (data) => {
                            if(permisos.update === '1'){
                                return `<a href="javascript:void(0)" style='color:skyblue' class="edit-row" data-id="${data.record.id}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>`;
                            }
                        }
                    },
                    modulo: {
                        width: '1%',
                        sorting:false,
                        edit:false,
                        create:false,
                        display: (data) => {
                            if(permisos.update === '1'){
                                return `<a href="javascript:void(0)" style='color:skyblue' class="modulo-row" data-id="${data.record.id}" title="Modulos"><i class="fa fa-university" aria-hidden="true"></i></a>`;
                            }
                        }
                    },

                    delete: {
                        width: '1%',
                        sorting:false,
                        edit:false,
                        create:false,
                        display: (data) => {
                            if(permisos.delete === '1'){
                                return `<a href="javascript:void(0)" style='color:red' class="delete-row" data-id="${data.record.id}" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>`;
                            }
                        }
                    },
                    
                },
                
<<<<<<< HEAD
                    recordsLoaded: (event, data) => {
                    if (permisos.insert === '1'){
                        const newButton = document.getElementsByClassName('jtable-toolbar-item')[1];
                        newButton.classList.remove('hide');
                    }
                    $('.modulo-row').click(function(e) {
                        e.preventDefault();
                        let id = $(this).attr('data-id');
                        console.log(id);
                        window.location.href = `<?php echo site_url(); ?>registro/cursos/modulo/${id}`;
                    });

                    $('.edit-row').click(function(e) {
                        e.preventDefault();
                        opcion = 2;
                        let id = $(this).attr('data-id');
                        console.log(id),
                        //window.location.href = `<?php echo site_url(); ?>administrador/cursos/edit/${id}`;
                        //LoadRecordsButton.click();
  
                        $.ajax({
                                url: base_url + "registro/cursos/edit",
                                method: "POST",
                                data:{id:id},
                                dataType: "json"
                        })
                            .done(function(result) {
                            // console.log(result);
                                $("#id").val(result.id).prop("disabled", false);
                                $("#descripcion").val(result.descripcion).prop("disabled", false);
                                // $("#silabus").val(result.silabus).prop("disabled", false);
                                $("#ciclos").val(result.ciclos).prop("disabled", false);
                                $("#niveles").val(result.niveles).prop("disabled", false);
                                $("#web").val(result.web).prop("disabled", false);
                                $("#btnGuardar").prop('disabled', false);
                                $("#btn-consultar-dni").prop('disabled', false);
                                $(".modal-header-color").css("background-color", "#28a745");
                                $(".modal-header-color").css("color", "white");
                                $(".modal-title-titulo").text("Editar Curso");        
                                $("#modalCRUD").modal("show");  
                            })
                            .fail(function(jqXHR, textStatus, errorThrown) {
                            });
                    });
=======
                recordsLoaded: (event, data) => {
                if (permisos.insert === '1'){
                    const newButton = document.getElementsByClassName('jtable-toolbar-item')[1];
                    newButton.classList.remove('hide');
                }
                
                $('.modulo-row').click(function(e) {
                    e.preventDefault();
                    let id = $(this).attr('data-id');
                    console.log(id);
                    window.location.href = `<?php echo site_url();?>registro/cursos/modulo/${id}`;
                });

                $('.edit-row').click(function(e) {
                    e.preventDefault();
                    opcion = 2;
                    let id = $(this).attr('data-id');
                    console.log(id),

                    $.ajax({
                        url: base_url + "registro/cursos/edit",
                        method: "POST",
                        data:{id:id},
                        dataType: "json"
                    }).done(function(result) {
                        $("#id").val(result.id).prop("disabled", false);
                        $("#descripcion").val(result.descripcion).prop("disabled", false);
                        $("#costo").val(result.costo).prop("disabled", false);
                        $("#ciclos").val(result.ciclos).prop("disabled", false);
                        $("#niveles").val(result.niveles).prop("disabled", false);
                        $("#web").val(result.web).prop("disabled", false);
                        $("#btnGuardar").prop('disabled', false);
                        $("#btn-consultar-dni").prop('disabled', false);
                        $(".modal-header-color").css("background-color", "#28a745");
                        $(".modal-header-color").css("color", "white");
                        $(".modal-title-titulo").text("Editar Curso");        
                        $("#modalCRUD").modal("show");  
                    }).fail(function(jqXHR, textStatus, errorThrown) {});
                });
>>>>>>> 99496fdacf299b55b5afafc198ae45741a2cbbc3

                $('.view-row').click(function(e) {
                    e.preventDefault();
                    opcion = 3;
                    let id = $(this).attr('data-id');
                    console.log(id),

<<<<<<< HEAD
                        $.ajax({
                                url: base_url + "registro/cursos/edit",
                                method: "POST",
                                data:{id:id},
                                dataType: "json"
                        })
                            .done(function(result) {
                            // console.log(result);
                                $("#id").val(result.id).prop("disabled", true);
                                $("#descripcion").val(result.descripcion).prop("disabled", true);
                               // $("#silabus").val(result.silabus).prop("disabled", true);
                                $("#ciclos").val(result.ciclos).prop("disabled", true);
                                $("#niveles").val(result.niveles).prop("disabled", true);
                                $("#web").val(result.web).prop("disabled", true);
                                $("#btnGuardar").prop('disabled', true);
                                $("#btn-consultar-dni").prop('disabled', true);
                                $(".modal-header-color").css("background-color", "coral");
                                $(".modal-header-color").css("color", "white");
                                $(".modal-title-titulo").text("Datos del Curso");         
                                $("#modalCRUD").modal("show");      
                            })
                            .fail(function(jqXHR, textStatus, errorThrown) {
                            });
                    });
=======
                    $.ajax({
                        url: base_url + "registro/cursos/edit",
                        method: "POST",
                        data:{id:id},
                        dataType: "json"
                    }).done(function(result){
                        $("#id").val(result.id).prop("disabled", true);
                        $("#descripcion").val(result.descripcion).prop("disabled", true);
                        $("#costo").val(result.costo).prop("disabled", true);
                        $("#ciclos").val(result.ciclos).prop("disabled", true);
                        $("#niveles").val(result.niveles).prop("disabled", true);
                        $("#web").val(result.web).prop("disabled", true);
                        $("#btnGuardar").prop('disabled', true);
                        $("#btn-consultar-dni").prop('disabled', true);
                        $(".modal-header-color").css("background-color", "coral");
                        $(".modal-header-color").css("color", "white");
                        $(".modal-title-titulo").text("Datos del Curso");         
                        $("#modalCRUD").modal("show");      
                    }).fail(function(jqXHR, textStatus, errorThrown) {});
                });
>>>>>>> 99496fdacf299b55b5afafc198ae45741a2cbbc3

                $('.delete-row').click(function(e) {
                    e.preventDefault();
                    let id = $(this).attr('data-id');
                    Swal.fire({
                        title: 'Estas Seguro?',
                        text: "de borrar este Usuario",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Borrarlo'
                        }).then((result) => {
                        if (result.value) {
                            console.log(id)
                            const url = `<?php echo site_url(); ?>registro/cursos/delete/${id}`;
                            fetch(url)
                            .then(res=>res.json())
                            .then(res => {
                                console.log(res)
                                Swal.fire(
                                    'Borrado Confirmado!',
                                    'Tu Usuario ha sido borrado',
                                    'success'
                                    )   
                                LoadRecordsButton.click();
                            })
                            .catch(function(err) {
                                console.log(err);
                            });
                        }
                    })
                });
			}
        });
        
        LoadRecordsButton = $('#LoadRecordsButton');
        LoadRecordsButton.click(function (e) {
            e.preventDefault();
            console.log($('#search').val())
            $('#listado').jtable('load', {
                search: $('#search').val()
            });
        });
        LoadRecordsButton.click();
    
    });

    const newRecord = () => {
        $("#form_cursos").trigger("reset");
        $(".modal-header-color").css("background-color", "#007bff");
        $(".modal-header-color").css("color", "white");
        $(".modal-title-titulo").text("Nuevo Curso");            
        $("#modalCRUD").modal("show");        
        id="";
    }

<<<<<<< HEAD

   $("#form_cursos").submit(function(e){
   e.preventDefault();  
   let formData = new FormData($("#form_cursos")[0]);
    $.ajax({
        url: "<?php echo base_url(); ?>registro/cursos/store",
     //   type: "POST",
      //  dataType: "json",
        processData: false,
        contentType: false,
        type: 'POST',
        // type:$("form").attr("method"),
        data: formData,
        // data: {id:id, ciclos:ciclos, niveles:niveles, descripcion:descripcion, costo:costo, silabus:silabus, web:web},
       // data:{guardar},
        success: function(data){  
            console.log(data)
                Swal.fire({
              //  position: 'top-end',
=======
    $("#form_cursos").submit(function(e){
        e.preventDefault();  
        let formData = new FormData($("#form_cursos")[0]);
        $.ajax({
            url: "<?php echo base_url(); ?>registro/cursos/store",
            processData: false,
            contentType: false,
            type: 'POST',
            data: formData,
            success: function(data){  
            console.log(data)
            Swal.fire({
>>>>>>> 99496fdacf299b55b5afafc198ae45741a2cbbc3
                icon: 'success',
                title: 'Los datos se Guardaron Correctamente',
                showConfirmButton: false,
                timer: 1500,
<<<<<<< HEAD
                })
                LoadRecordsButton.click();
                $("#modalCRUD").modal("hide");    
        }        
    });

    /*=============================================
    ELIMINAR IMAGEN RADIOLÓGICA
    =============================================*/
    (function(){
    $('tr td .delete-padre').click(function(ev){
        ev.preventDefault();
        var id = $(this).attr('data-id');
        var data = id.split('*');
        var self = this;
        Swal.fire({
        title: '¿Está seguro de borrar este registro?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar registro!'
        }).then((result)=>{
        if(result.value){
            $.ajax({
            url: base_url + 'registro/cursos/deletemodulo/' + data[0] + '/' + data[1],
            type: 'POST',
            data: {'id': id, },
            success: function(){
                $(self).parents('tr').remove();
                alertify.notify('El registro se borró del sistema', 'success', 5, function(){
                console.log('dismissed'); 
                });
            }, statusCode: {
                400: function(data){
                var json = JSON.parse(data.responseText);
                alertify.notify(json.msg, 'error', 5, function(){
                    console.log('dismissed'); 
                });
                }
            }
            })
        }
        })
    })
    })
=======
            })
            LoadRecordsButton.click();
            $("#modalCRUD").modal("hide");    
        }        
    });
>>>>>>> 99496fdacf299b55b5afafc198ae45741a2cbbc3
});
(function(){
    $('tr td #delete').click(function(ev){
        ev.preventDefault();
        var id = $(this).attr('data-id');
        var self = this;
        swal.fire({
            title: '¿Está seguro de borrar este registro?',
            text: "¡Si no lo está puede cancelar la acción!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, borrar registro!'
        }).then((result) => {
        if(result.value){
            $.ajax({
            url: base_url + 'imagenes/delete',
            type: 'POST',
            data: {'id': id},
            success: function(){
                $(self).parents('tr').remove();
                alertify.notify('El registro se borró del sistema', 'success', 5, function(){
                console.log('dismissed'); 
                });
            }, statusCode: {
                400: function(data){
                var json = JSON.parse(data.responseText);
                alertify.notify(json.msg, 'error', 5, function(){
                    console.log('dismissed'); 
                });
                }
            }
            })
        }
        })
    })
})();
</script>