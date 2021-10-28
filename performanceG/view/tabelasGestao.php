<head>
    <meta charset="utf-8">
    <title>Tabela Gestão</title>
    <link rel="icon" href="img1/favicon.png">
</head> 
      	<table class="rede-parceira">	
	        <thead>
	            <tr>
	                <th colspan="10"><div class="div-RP"><div id="titulo-seg1" class="card mb-3 widget-content bg-midnight-bloom"><div class="widget-content-wrapper text-white"><div class="widget-content-left"><div class="widget-heading"></div><div class="widget-subheading"></div></div><div class="widget-content-right"><div class="widget-numbers text-white"><span>Gestão</span></div></div></div></div></th>
	            </tr>
	        	<tr>
	                <th>Item</th>
	                <th class="">Meta</th>
	                <th class="">Realizado</th>
	                <th>%</th>
	                <th>Percentual</th>
	                <th>Peso</th>
	                <th>Data At.</th>
	                <th id="simulacao" colspan=3>Simulação</th>
	                <th id="Pontos">Pontos</th>
	            </tr>
	        </thead>
	        <tbody class="RP">
	        	<tr id="espaco"></tr>
					<?php $consulta->tabelas($tipo='RG', $b="");?>
	        </tbody>
    	</table>
	<div class="redeB">    
	    <table class="bonus">
	        <thead>
	            <tr>
	                <th colspan="10"><div class="div-BONUS"><div id="titulo-seg3" class="card mb-3 widget-content bg-midnight-bloom"><div class="widget-content-wrapper text-white"><div class="widget-content-left"><div class="widget-heading"></div><div class="widget-subheading"></div></div><div class="widget-content-right"><div class="widget-numbers text-white"><span>Bônus</span></div></div></div></div></th>
	            </tr>
	            <tr>    
	                <th>Item</th>
	                <th>Meta</th>
	                <th>Realizado</th>
	                <th>%</th>
	                <th>Percentual</th>
	                <th>Pontos</th>
	                <th>Data At.</th>
	                <th id="simulacao" colspan="2">Simulação</th>
	                <th id="Pontos" colspan="2">Pontos</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr id="espaco"></tr>
	          <?php							 
            		$consulta->tabelas($tipo='BONUSGR', $b='B');
            	?>
	        </tbody>
	    </table>     
	</div>


