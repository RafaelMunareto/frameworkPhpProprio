
$(document).ready(function(){

    //envia o código do item via POST quando clica(envia para o controller Calc_AG que executa e trás a informação para o modal)
    $('.btn_item').click(function(){
        var id = $(this).attr("id");
        $('.modal').modal();
        $.ajax({
          method: "POST",
          url: "classes/controller/Calc_ag.php",
          data: {'item':id},
           success: function(data){
             $("#responseArea").html(data);
           }
        });         
    }) 
    
    //abre os modais
    $('.modal').modal();   	
    // mascara dos objetivos, realizados e simulação   
     $('.input').mask("#.##0,00", {reverse: true});
     $(".meta").mask("#.##0,00", {reverse: true});
     $(".realizado").mask("#.##0,00", {reverse: true});

    //inicia a simulação quando entrar no input
    $('.input').on('input', function(){
    $('.input').each(function(index, element){
        //número final do ID
        var item_cod = $(element).attr('id');
        var item_cod = item_cod.substring(6, 12);
        //variaveis
        var realizado = $('#realizado_' + item_cod).text();
        realizado = realizado.replace('.','').replace('.','').replace('.','').replace(',','.') * 1
        var meta = $('#meta_' + item_cod).text();
        meta = meta.replace('.','').replace('.','').replace('.','').replace(',','.') * 1
        if(meta <= 0){
            meta = 0.000001;
        }
        var peso = $('#peso_' + item_cod).text();
        peso = peso.replace('.',',') * 1;
        var input = $(element).val();
        input = input.replace('.','').replace('.','').replace(',','.') * 1;
        //condicoes do percentual 
        var percentual = ((realizado+input)/meta) * 100;
        if(percentual > 120){
            percentual = 120;
        }
        if(percentual < 0){
            percentual = 0;
        }
         //percentual
        $('#percentual_' + item_cod).text(percentual.toFixed(2).replace("","",'.', '.'));
         //calculo percentual x peso
        var pesoAtual = (peso * percentual)/100;
        $('#peso_output_' + item_cod).text(pesoAtual.toFixed(2).replace(',', '.'));

        //BONUS
        var bonus1 = parseFloat($('#percentual_1').text());
        var bonus1Peso = parseFloat($('#peso_1').text());
        if(bonus1 >= 100){
            $("#peso_output_B1").val(bonus1Peso);
        }else{
            $("#peso_output_B1").val(0);
        }
        var bonus2 = parseFloat($('#percentual_2').text());
        var bonus2Peso = parseFloat($('#peso_2').text());
        if(bonus2 >= 100){
            $("#peso_output_B2").val(bonus2Peso);
        }else{
            $("#peso_output_B2").val(0);
        }
        var bonus3 = parseFloat($('#percentual_3').text());
        var bonusPeso3 = parseFloat($('#peso_3').text());
        if(bonus3 >= 100){
            $("#peso_output_B3").val(bonusPeso3);
        }else{
            $("#peso_output_B3").val(0);
        }
        
        var bonus1NF = parseFloat($("#peso_output_B1").val());
        var bonus2NF = parseFloat($("#peso_output_B2").val());
        var bonus3NF = parseFloat($("#peso_output_B3").val());

        var notaFinalB = bonus1NF + bonus2NF;
        $("#nota_final_th_bonus").text(notaFinalB.toFixed(2).replace(',', '.'));

         //calculo o peso total e o peso realizado (percentual x peso com as condicoes) - embora estou usando direto a nota do item 
        var peso_metrica = $(".bonus .pesoB");
        var pesoM_array = Array.prototype.slice.call(peso_metrica, 0);
        var pesoM_total = 0
        pesoM_array.forEach(function(el) {   
            pesoM_total += parseFloat(el.value);
        });
        var pesoSimulado = $(".bonus .peso_outputB");
        var pesoS_array = Array.prototype.slice.call(pesoSimulado, 0);
        var pesoS_total = 0
        pesoS_array.forEach(function(el) {   
            pesoS_total += parseFloat(el.value);
        });
        var bonus_pesoTotal = pesoS_total;
        var bonus_percentual = (pesoM_total/pesoS_total)*100;
        $("#tamanhoBarraBONUS").text(bonus_percentual)
        
        // NOTA FINAL RP (PESO TOTAL)
        var peso_metrica = $(".RP .peso");
        var pesoSimulado = $(".RP .peso_output");
        var pesoM_array = Array.prototype.slice.call(peso_metrica, 0);
        var pesoS_array = Array.prototype.slice.call(pesoSimulado, 0);
        var pesoS_total = 0
        var pesoM_total = 0
        pesoS_array.forEach(function(el) {   
            pesoS_total += parseFloat(el.value);
        });
        pesoM_array.forEach(function(el) {   
            pesoM_total += parseFloat(el.value);
        });
        var nota_final = ((pesoS_total/pesoM_total)*100)
        $("#nota_final_th").text(nota_final.toFixed(2).replace(',', '.'));

        // NOTA FINAL RV (PESO TOTAL)
        var peso_metrica = $(".RV .peso");
        var pesoSimulado = $(".RV .peso_output");
        var pesoM_array = Array.prototype.slice.call(peso_metrica, 0);
        var pesoS_array = Array.prototype.slice.call(pesoSimulado, 0);
        var pesoS_total = 0
        var pesoM_total = 0
        pesoS_array.forEach(function(el) {   
            pesoS_total += parseFloat(el.value);
        });
        pesoM_array.forEach(function(el) {   
            pesoM_total += parseFloat(el.value);
        });
        var nota_final = ((pesoS_total/pesoM_total)*100)
        
        $("#nota_final_th_RV").text(nota_final.toFixed(2).replace(',', '.'));

        // NOTA FINAL TOTAL (PESO TOTAL)
        var peso_metrica = $(".peso");
        var pesoSimulado = $(".peso_output");
        var pesoM_array = Array.prototype.slice.call(peso_metrica, 0);
        var pesoS_array = Array.prototype.slice.call(pesoSimulado, 0);
        var pesoS_total = 0
        var pesoM_total = 0
        pesoS_array.forEach(function(el) {   
            pesoS_total += parseFloat(el.value);
        });
        pesoM_array.forEach(function(el) {   
            pesoM_total += parseFloat(el.value);
        });
        var nota_final = ((pesoS_total/pesoM_total)*100) + notaFinalB;
        $("#numero_final").text(nota_final.toFixed(2).replace(',', '.'));
    
        //SIMULACAO AGREGA
        var pesoAgrega = (((realizado/meta) * 100) * peso)/100;
        var agregaDados = ((pesoAtual - pesoAgrega)/pesoM_total)*100;
        if (agregaDados < 0){
            agregaDados = 0;
        }
        $('#agrega_' + item_cod).text(agregaDados.toFixed(2).replace(',','.')+"%") 
        });
        
    });
    //trigger da funcao para atualizar a pagina sem alterar o input
    $(".input").trigger('input');
    
    $('.bar-inner').each(function(index2, element2){
        var valor = $(element2).attr('valor');
        $(this).animate({
            'height': valor + 'px'
            
        }, 50, function() {

        });
    });

});
     






