$(document).ready(function(){

    $("#calcular").click(function(){
        let estatura = $("#estatura").val();
        let edad = $("#edad").val();
        let valorReferencia = $("#opcion").val();
        let pesoIdeal;
        if(valorReferencia === '1'){
            pesoIdeal = [(estatura-100) + (edad/10)] * 0.9 *0.9;
            //Mostramos el peso en la etiqueta span
            let result = document.querySelector("#resultado-peso span");
            result.innerHTML = pesoIdeal;
        }else if(valorReferencia === '2'){
            pesoIdeal = [(estatura-100) + (edad/10)] * 0.9;
            //Mostramos el peso en la etiqueta span
            let result = document.querySelector("#resultado-peso span");
            result.innerHTML = pesoIdeal;
        } else if(valorReferencia === '3'){
            pesoIdeal = [(estatura-100) + (edad/10)] * 0.9 *1.1;
            //Mostramos los gramos en la etiqueta span
            let result = document.querySelector("#resultado-peso span");
            result.innerHTML = pesoIdeal;
        }
    });
});