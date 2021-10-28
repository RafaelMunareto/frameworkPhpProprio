//cor do ranking
$(document).ready(function(){
    $(".ranking tbody tr td").each(function(){
    if($(this).text() >= 100){  
        $(this).addClass('cem');
        }else if ($(this).text() >=90 && $(this).text() < 100 ) {
        $(this).addClass('noventa');	
        }else if ($(this).text() >=80 && $(this).text() < 90){
        $(this).addClass('oitenta');
        }else if($(this).text() < 80){
        $(this).addClass('setenta');
        }
    });
     //notas finais 
    var numero_final0 = parseFloat($("#numero_final").val());
    var numero_final = parseFloat($("#nota_final_th").val());
    var numero_final2 = parseFloat($("#nota_final_th_RV").val());

    //tamanho da barra das notas finais
    $("#tamanhoBarraTotal").animate({
        width: parseFloat($("#numero_final").val()) + "%"
    }, 1000, function() {
        // Animation complete.
    });

    $("#tamanhoBarraRV").animate({
        width: parseFloat($("#nota_final_th_RV").val()) + "%"
    }, 1000, function() {
        // Animation complete.
    });

    $("#tamanhoBarraRP").animate({
        width: parseFloat($("#nota_final_th").val()) + "%"
    }, 1000, function() {
        // Animation complete.
    });

    $("#tamanhoBarraBONUS").animate({
        width: parseFloat($("#nota_final_th_bonus").val())*11.11 + "%"
    }, 1000, function() {
        // Animation complete.
    });
        
    //cores, e sombras das notas finais 
    if(numero_final0 < 80){
        $("#tamanhoBarraTotal").addClass("nota_vermelha");
        $("#numero_final").addClass("letra_vermelha");
        $("#sombra0").addClass("sombra_vermelha");
    }else if(numero_final0 >= 80 && numero_final0 < 90){
        $("#tamanhoBarraTotal").addClass("nota_amarela");
        $("#numero_final").addClass("letra_amarela");
        $("#sombra0").addClass("sombra_amarela");
    }else if(numero_final0 >= 90 && numero_final0 < 100){
        $("#tamanhoBarraTotal").addClass("nota_verde");
        $("#numero_final").addClass("letra_verde");
        $("#sombra0").addClass("sombra_verde");
    }else if(numero_final0 >=100){
        $("#tamanhoBarraTotal").addClass("nota_azul");
        $("#numero_final").addClass("letra_azul");
        $("#sombra0").addClass("sombra_azul");
    } 
    if(numero_final < 80){
        $("#tamanhoBarraRP").addClass("nota_vermelha");
        $("#nota_final_th").addClass("letra_vermelha");
        $("#sombra").addClass("sombra_vermelha");
 
    }else if(numero_final >= 80 && numero_final < 90){
        $("#tamanhoBarraRP").addClass("nota_amarela");
        $("#nota_final_th").addClass("letra_amarela");
        $("#sombra").addClass("sombra_amarela");
    }else if(numero_final >= 90 && numero_final < 100){
        $("#tamanhoBarraRP").addClass("nota_verde");
        $("#nota_final_th").addClass("letra_verde");
        $("#sombra").addClass("sombra_verde");
    }else if(numero_final >=100){
        $("#tamanhoBarraRP").addClass("nota_azul");
        $("#nota_final_th").addClass("letra_azul");
        $("#sombra").addClass("sombra_azul");
    } 
    if(numero_final2 < 80){
        $("#tamanhoBarraRV").addClass("nota_vermelha");
        $("#nota_final_th_RV").addClass("letra_vermelha");
        $("#sombra2").addClass("sombra_vermelha");
    }else if(numero_final2 >= 80 && numero_final2 < 90){
        $("#tamanhoBarraRV").addClass("nota_amarela");
        $("#nota_final_th_RV").addClass("letra_amarela");
        $("#sombra2").addClass("sombra_amarela");
    }else if(numero_final2 >= 90 && numero_final2 < 100){
        $("#tamanhoBarraRV").addClass("nota_verde");
        $("#nota_final_th_RV").addClass("letra_verde");
        $("#sombra2").addClass("sombra_verde");
    }else if(numero_final2 >=100){
        $("#tamanhoBarraRV").addClass("nota_azul");
        $("#nota_final_th_RV").addClass("letra_azul");
        $("#sombra2").addClass("sombra_azul");
    } 

    //percentual do mostrador das notas finais 
    $("#nota_final_th").text($("#nota_final_th").text() + "%"); 
    $("#nota_final_th_RV").text($("#nota_final_th_RV").text() + "%"); 
    $("#numero_final").text($("#numero_final").text() + "%"); 

//animação das barras pequenas      
    $('.input').each(function(index, element){
        var item_cod = $(element).attr('id');
        var item_cod = item_cod.substring(6, 12);
        var width = 0;
        var tempo = 1000;
        var barra = setInterval(function(){
            var percentualB = $("#percentual_" + item_cod).text();
            var inputB = $("#input_" + item_cod).text();
            var carga = $('#carga_' + item_cod).get(0);
            width = percentualB ;
            $('#carga_' + item_cod).addClass("cor_barra_min");
            if(width >= 100 && width<120){
                $('#carga_' + item_cod).removeClass("cor_barra_top");
                width = 100;
                $('#carga_' + item_cod).addClass("cor_barra_max");
            }else if(width<100){
                $('#carga_' + item_cod).removeClass("cor_barra_max");
                $('#carga_' + item_cod).removeClass("cor_barra_top");
            }else if(width >=120){
                $('#carga_' + item_cod).addClass("cor_barra_top");
            }
            if(inputB == 0){
                width = percentualB;
            }
            $('#carga_' + item_cod).get(0).style.width= width + "%";
            
            
            if (width === 100){     
                clearInterval(barra);
                width = 0;
                ;

            }
        },tempo)
    });

    //notas finais quando simula
    $('.input').each(function(index, element){
        var tempo = 1000;
        var barra = setInterval(function(){
            var numero_final0 = parseFloat($("#numero_final").val());
            var numero_final = parseFloat($("#nota_final_th").val());
            var numero_final2 = parseFloat($("#nota_final_th_RV").val());
            if(numero_final0 < 80){
                $("#tamanhoBarraTotal").addClass("nota_vermelha");
                $("#numero_final").addClass("letra_vermelha");
                $("#sombra0").addClass("sombra_vermelha");
                $("#tamanhoBarraTotal").removeClass("nota_amarela");
                $("#numero_final").removeClass("letra_amarela");
                $("#sombra0").removeClass("sombra_amarela");
                $("#tamanhoBarraTotal").removeClass("nota_verde");
                $("#numero_final").removeClass("letra_verde");
                $("#sombra0").removeClass("sombra_verde");
                $("#tamanhoBarraTotal").removeClass("nota_azul");
                $("#numero_final").removeClass("letra_azul");
                $("#sombra0").removeClass("sombra2_azul");
            }else if(numero_final0 >= 80 && numero_final0 < 90){
                $("#tamanhoBarraTotal").addClass("nota_amarela");
                $("#numero_final").addClass("letra_amarela");
                $("#sombra0").addClass("sombra_amarela");
                $("#tamanhoBarraTotal").removeClass("nota_vermelha");
                $("#numero_final").removeClass("letra_vermelha");
                $("#sombra0").removeClass("sombra_vermelha");
                $("#tamanhoBarraTotal").removeClass("nota_verde");
                $("#numero_final").removeClass("letra_verde");
                $("#sombra0").removeClass("sombra_verde");
                $("#tamanhoBarraTotal").removeClass("nota_azul");
                $("#numero_final").removeClass("letra_azul");
                $("#sombra0").removeClass("sombra_azul");
            }else if(numero_final0 >= 90 && numero_final0 < 100){
                $("#tamanhoBarraTotal").addClass("nota_verde");
                $("#numero_final").addClass("letra_verde");
                $("#sombra0").addClass("sombra_verde");
                $("#tamanhoBarraTotal").removeClass("nota_vermelha");
                $("#numero_final").removeClass("letra_vermelha");
                $("#sombra0").removeClass("sombra_vermelha");
                $("#tamanhoBarraTotal").removeClass("nota_amarela");
                $("#numero_final").removeClass("letra_amarela");
                $("#sombra0").removeClass("sombra_amarela");
                $("#tamanhoBarraTotal").removeClass("nota_azul");
                $("#numero_final").removeClass("letra_azul");
                $("#sombra0").removeClass("sombra_azul");
            }else if(numero_final0 >=100){
                $("#tamanhoBarraTotal").addClass("nota_azul");
                $("#numero_final").addClass("letra_azul");
                $("#sombra0").addClass("sombra_azul");
                $("#tamanhoBarraTotal").removeClass("nota_vermelha");
                $("#numero_final").removeClass("letra_vermelha");
                $("#sombra0").removeClass("sombra_vermelha");
                $("#tamanhoBarraTotal").removeClass("nota_verde");
                $("#numero_final").removeClass("letra_verde");
                $("#sombra0").removeClass("sombra_verde");
                $("#tamanhoBarraTotal").removeClass("nota_amarela");
                $("#numero_final").removeClass("letra_amarela");
                $("#sombra0").removeClass("sombra_amarela");
            } 
            if(numero_final < 80){
                $("#tamanhoBarraRP").addClass("nota_vermelha");
                $("#nota_final_th").addClass("letra_vermelha");
                $("#sombra").addClass("sombra_vermelha");
                $("#tamanhoBarraRP").removeClass("nota_amarela");
                $("#nota_final_th").removeClass("letra_amarela");
                $("#sombra").removeClass("sombra_amarela");
                $("#tamanhoBarraRP").removeClass("nota_verde");
                $("#nota_final_th").removeClass("letra_verde");
                $("#sombra").removeClass("sombra_verde");
                $("#tamanhoBarraRP").removeClass("nota_azul");
                $("#nota_final_th").removeClass("letra_azul");
                $("#sombra").removeClass("sombra_azul");
            }else if(numero_final >= 80 && numero_final < 90){
                $("#tamanhoBarraRP").addClass("nota_amarela");
                $("#nota_final_th").addClass("letra_amarela");
                $("#sombra").addClass("sombra_amarela");
                $("#tamanhoBarraRP").removeClass("nota_vermelha");
                $("#nota_final_th").removeClass("letra_vermelha");
                $("#sombra").removeClass("sombra_vermelha");
                $("#tamanhoBarraRP").removeClass("nota_verde");
                $("#nota_final_th").removeClass("letra_verde");
                $("#sombra").removeClass("sombra_verde");
                $("#tamanhoBarraRP").removeClass("nota_azul");
                $("#nota_final_th").removeClass("letra_azul");
                $("#sombra").removeClass("sombra_azul");
            }else if(numero_final >= 90 && numero_final < 100){
                $("#tamanhoBarraRP").addClass("nota_verde");
                $("#nota_final_th").addClass("letra_verde");
                $("#sombra").addClass("sombra_verde");
                $("#tamanhoBarraRP").removeClass("nota_vermelha");
                $("#nota_final_th").removeClass("letra_vermelha");
                $("#sombra").removeClass("sombra_vermelha");
                $("#tamanhoBarraRP").removeClass("nota_amarela");
                $("#nota_final_th").removeClass("letra_amarela");
                $("#sombra").removeClass("sombra_amarela");
                $("#tamanhoBarraRP").removeClass("nota_azul");
                $("#nota_final_th").removeClass("letra_azul");
                $("#sombra").removeClass("sombra_azul");
            }else if(numero_final >=100){
                $("#tamanhoBarraRP").addClass("nota_azul");
                $("#nota_final_th").addClass("letra_azul");
                $("#sombra").addClass("sombra_azul");
                $("#tamanhoBarraRP").removeClass("nota_vermelha");
                $("#nota_final_th").removeClass("letra_vermelha");
                $("#sombra").removeClass("sombra_vermelha");
                $("#tamanhoBarraRP").removeClass("nota_verde");
                $("#nota_final_th").removeClass("letra_verde");
                $("#sombra").removeClass("sombra_verde");
                $("#tamanhoBarraRP").removeClass("nota_amarela");
                $("#nota_final_th").removeClass("letra_amarela");
                $("#sombra").removeClass("sombra_amarela");
            } 
             if(numero_final2 < 80){
                $("#tamanhoBarraRV").addClass("nota_vermelha");
                $("#nota_final_th_RV").addClass("letra_vermelha");
                $("#sombra2").addClass("sombra_vermelha");
                $("#tamanhoBarraRV").removeClass("nota_amarela");
                $("#nota_final_th_RV").removeClass("letra_amarela");
                $("#sombra2").removeClass("sombra_amarela");
                $("#tamanhoBarraRV").removeClass("nota_verde");
                $("#nota_final_th_RV").removeClass("letra_verde");
                $("#sombra2").removeClass("sombra_verde");
                $("#tamanhoBarraRV").removeClass("nota_azul");
                $("#nota_final_th_RV").removeClass("letra_azul");
                $("#sombra2").removeClass("sombra2_azul");
            }else if(numero_final2 >= 80 && numero_final2 < 90){
                $("#tamanhoBarraRV").addClass("nota_amarela");
                $("#nota_final_th_RV").addClass("letra_amarela");
                $("#sombra2").addClass("sombra_amarela");
                $("#tamanhoBarraRV").removeClass("nota_vermelha");
                $("#nota_final_th_RV").removeClass("letra_vermelha");
                $("#sombra2").removeClass("sombra_vermelha");
                $("#tamanhoBarraRV").removeClass("nota_verde");
                $("#nota_final_th_RV").removeClass("letra_verde");
                $("#sombra2").removeClass("sombra_verde");
                $("#tamanhoBarraRV").removeClass("nota_azul");
                $("#nota_final_th_RV").removeClass("letra_azul");
                $("#sombra2").removeClass("sombra_azul");
            }else if(numero_final2 >= 90 && numero_final2 < 100){
                $("#tamanhoBarraRV").addClass("nota_verde");
                $("#nota_final_th_RV").addClass("letra_verde");
                $("#sombra2").addClass("sombra_verde");
                $("#tamanhoBarraRV").removeClass("nota_vermelha");
                $("#nota_final_th_RV").removeClass("letra_vermelha");
                $("#sombra2").removeClass("sombra_vermelha");
                $("#tamanhoBarraRV").removeClass("nota_amarela");
                $("#nota_final_th_RV").removeClass("letra_amarela");
                $("#sombra2").removeClass("sombra_amarela");
                $("#tamanhoBarraRV").removeClass("nota_azul");
                $("#nota_final_th_RV").removeClass("letra_azul");
                $("#sombra2").removeClass("sombra_azul");
            }else if(numero_final2 >=100){
                $("#tamanhoBarraRV").addClass("nota_azul");
                $("#nota_final_th_RV").addClass("letra_azul");
                $("#sombra2").addClass("sombra_azul");
                $("#tamanhoBarraRV").removeClass("nota_vermelha");
                $("#nota_final_th_RV").removeClass("letra_vermelha");
                $("#sombra2").removeClass("sombra_vermelha");
                $("#tamanhoBarraRV").removeClass("nota_verde");
                $("#nota_final_th_RV").removeClass("letra_verde");
                $("#sombra2").removeClass("sombra_verde");
                $("#tamanhoBarraRV").removeClass("nota_amarela");
                $("#nota_final_th_RV").removeClass("letra_amarela");
                $("#sombra2").removeClass("sombra_amarela");
            } 
            $("#tamanhoBarraTotal").get(0).style.width= $("#numero_final").val() + "%";
            $("#tamanhoBarraRP").get(0).style.width= $("#nota_final_th").val() + "%";
            $("#tamanhoBarraRV").get(0).style.width= $("#nota_final_RV").val() + "%";
            $("#tamanhoBarraBONUS").get(0).style.width= $("#nota_final_th_bonus").val() * 12 + "%";

        },tempo)
    });

   
});