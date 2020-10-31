$(document).ready(function(){
    const cedulaPaciente = $("#cedulaPaciente");
    const nombrePaciente = $("#nombrePaciente");
    const edadPaciente = $("#edadPaciente");
    const telefonoPaciente = $("#telefonoPaciente");

    const cedulaNutricionista = $("#cedulaNutricionista");
    const telefonoNutricionista = $("#telefonoNutricionista");

    //EVECTOS PARA VALIDAR DATOS DE REGISTROS
    //Focus, blur (FOCUS = hacer un accion cuando este dentro del focus.
    // blur = otra accion cuando este fuera del focus).
    cedulaPaciente.focus(function() {
        if(cedulaPaciente.val().length <= '7' ){
            $(this).css("border", "3px solid red");
        }
    });
    cedulaPaciente.blur(function() {
        if(cedulaPaciente.val().length == '8' ){
            $(this).css("border", "none");
        }
    });

    //VALIDAR DATOS NOMBREPACIENTE
    nombrePaciente.focus(function() {
        if(nombrePaciente.val().length < '2' ){
            $(this).css("border", "3px solid red");
        }
    });
    nombrePaciente.blur(function() {
        if(nombrePaciente.val().length > '2' ){
            $(this).css("border", "none");
        }
    });     

    //VALIDAR DATOS EDADPACIENTE
    edadPaciente.focus(function() {
        if(edadPaciente.val().length >= '3') {
            $(this).css("border", "3px solid red");
        }
    });
    edadPaciente.blur(function() {
        if(edadPaciente.val().length == '2' ){
            $(this).css("border", "none");
        }
    });

    //VALIDAR DATOS TELEFONO
    telefonoPaciente.focus(function() {
        if(telefonoPaciente.val().length < '6' ){
            $(this).css("border", "3px solid red");
        }
    });
    telefonoPaciente.blur(function() {
        if(telefonoPaciente.val().length > '9' ){
            $(this).css("border", "none");
        }
    });

    //CONTROLANDO LA VALIDACION DE LOS DATOS DEL NUTRICIONISTA
    cedulaNutricionista.focus(function() {
        if(cedulaNutricionista.val().length < '9' ){
            $(this).css("border", "3px solid red");
        }
    });
    cedulaNutricionista.blur(function() {
        if(cedulaNutricionista.val().length == '10' ){
            $(this).css("border", "none");
        }
    });

    telefonoNutricionista.focus(function() {
        if(telefonoNutricionista.val().length < '6' ){
            $(this).css("border", "3px solid red");
        }
    });
    telefonoNutricionista.blur(function() {
        if(telefonoNutricionista.val().length > '9' || telefonoNutricionista.val().length == '7' ){
            $(this).css("border", "none");
        }
    });



});



