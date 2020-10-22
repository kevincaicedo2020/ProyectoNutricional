$(document).ready(function() {
    $("#calcular").click(function(){
        var peso = $("#peso").val();
        let valorReferencia = $("#opcion").val();

        if(valorReferencia === '1'){
            let sedentario = 0.8;
            let proteinasDiarias;
            proteinasDiarias = Math.round(sedentario * peso);
            console.log("las proteinas diarias a consumir son " + proteinasDiarias + " Gramos ");
            //Mostramos los gramos en la etiqueta span
            var result = document.querySelector("#resul-gramos span");
            result.innerHTML = proteinasDiarias;
        } else if(valorReferencia === '2'){
            let atletico = 1.40;
            let proteinasDiarias;
            proteinasDiarias = Math.round(atletico * peso);
            console.log("las proteinas diarias a consumir son " + proteinasDiarias + " Gramos ");
            //Mostramos los gramos en la etiqueta span
            var result = document.querySelector("#resul-gramos span");
            result.innerHTML = proteinasDiarias;
        } else if(valorReferencia === '3'){
            let resistencia = 1.10;
            let proteinasDiarias;
            proteinasDiarias = Math.round(resistencia * peso);
            console.log("las proteinas diarias a consumir son " + proteinasDiarias + " Gramos ");
            //Mostramos los gramos en la etiqueta span
            var result = document.querySelector("#resul-gramos span");
            result.innerHTML = proteinasDiarias;
        } else if(valorReferencia === '4'){
            let fuerza = 1.50;
            let proteinasDiarias;
            proteinasDiarias = Math.round(fuerza * peso);
            console.log("las proteinas diarias a consumir son " + proteinasDiarias + " Gramos ");
            //Mostramos los gramos en la etiqueta span
            var result = document.querySelector("#resul-gramos span");
            result.innerHTML = proteinasDiarias;

        }
    });
}); 



