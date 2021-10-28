<html>
<head>
    <meta charset="utf-8">
    <title>Tabelas Resultado</title>
    <link rel="icon" href="img1/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
</head> 
    <div class="tabelas">    
        <div class="esquerda">            
            <div class="redeP">
                <table class="rede-parceira">	
                    <thead>
                        <tr>
                            <th colspan="10"><div class="div-RP"><div id="titulo-seg1" class="card mb-3 widget-content bg-midnight-bloom"><div class="widget-content-wrapper text-white"><div class="widget-content-left"><div class="widget-heading"></div><div class="widget-subheading"></div></div><div class="widget-content-right"><div class="widget-numbers text-white"><span>Rede Parceira</span></div></div></div></div></th>
                        </tr>
                    	<tr>
                            <th>Item</th>
                            <th class="metat">Meta</th>
                            <th class="realizadot">Realizado</th>
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
                            <?php $consulta->tabelas($tipoTabela='RP', $b=''); ?>
    				</tbody>
                </table>		         
            </div>
        	<div class="redeB">    
            	<table class="bonus">
	                <thead>
	                    <tr>
	                        <th colspan="10"><div class="div-BONUS"><div id="titulo-seg3" class="card mb-3 widget-content bg-midnight-bloom"><div class="widget-content-wrapper text-white"><div class="widget-content-left"><div class="widget-heading"></div><div class="widget-subheading"></div></div><div class="widget-content-right"><div class="widget-numbers text-white"><span>Bônus</span></div></div></div></div></th>
	                    </tr>
	                    <tr>    
	                        <th>Item</th>
	                        <th class="metat">Meta</th>
	                        <th class="realizadot">Realizado</th>
	                        <th>%</th>
	                        <th>Percentual</th>
	                        <th>Data At.</th>
	                        <th>Pontos</th>
	                        <th id="simulacao" colspan="2">Simulação</th>
	                        <th id="Pontos" colspan="2">Pontos</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr id="espaco"></tr>
	                   <tr>
	                   		<?php							 
								$consulta->tabelas($tipoTabela='BONUSGR', $b='B');
								$consulta->tabelas($tipoTabela='BONUSR', $b='B');
                            ?>
	                        
	                        <?php
								$meta = 2;
								$realizado = 0;
								$peso = 2;
								$data = 0;                           
	                        ?>
							<th style="font-size: 120%;">Credenciamento na RP</th>
	                        <td class="meta" id="meta_3"><?php echo number_format($meta, 2,',','.'); ?></td>
	                        <td class="realizado" id="realizado_3"><?php echo number_format($realizado, 2,',','.'); ?></td>
	                        <td class="percentual" id="percentual_3"></td>
	                        <td><div class="barra-area"><div class="barra"><span id="carga_3" class="carga"></span></div></div></td>
	                        <td><output class="pesoB" id="peso_3"><?php echo $peso; ?></output></td>
	                        <td class="data" id="data"><?php echo $data; ?></td>
	                        <td><input class="input" type="text" id="input_3" ></td>
	                        <td><output class="peso_outputB" for="input_3" id="peso_outputB_3" class="form-control"></output></td>
	                        <td></td>
						</tr>	
	                    <tr>
	                        <?php		
								$meta = 0;
								$realizado = 0;
								$peso = 2;
								$data = 0;
	                        ?>
	                        <th style="font-size: 120%;">Cartão Consignado</th>                     
	                        <td class="meta" id="meta_4"><?php echo number_format($meta, 2,',','.'); ?></td>
	                        <td class="realizado" id="realizado_4"><?php echo number_format($realizado, 2,',','.'); ?></td>
	                        <td class="percentual" id="percentual_4"></td>
	                        <td><div class="barra-area"><div class="barra"><span id="carga_4" class="carga"></span></div></div></td>
	                        <td><output class="pesoB" id="peso_4"><?php echo $peso; ?></output></td>
	                        <td class="data" id="data"><?php echo $data; ?></td>
	                        <td><input class="input" type="text" id="input_4" ></td>
	                        <td><output class="peso_outputB" for="input_4" id="peso_outputB_4" class="form-control"></output></td>
	                        <td></td>
	                    </tr>
	                </tbody>
          		</table>    
       		</div>
    </div>    
    <div class="direita">
        <div class="redeV">
            <table class="rede-valor">
                <thead>
                    <tr>
                        <th colspan="10"><div class="div-RV"><div id="titulo-seg2" class="card mb-3 widget-content bg-midnight-bloom"><div class="widget-content-wrapper text-white"><div class="widget-content-left"><div class="widget-heading"></div><div class="widget-subheading"></div></div><div class="widget-content-right"><div class="widget-numbers text-white"><span>ATM e Meios Digitais</span></div></div></div></div></th>
                    </tr>
                    <tr>    
                        <th>Item</th>
                        <th class="metat">Meta</th>
                        <th class="realizadot">Realizado</th>
                        <th>%</th>
                        <th>Percentual</th>
                        <th>Peso</th>
                        <th>Data At.</th>
                        <th id="simulacao" colspan=3>Simulação</th>
                        <th id="Pontos">Pontos</th>
                    </tr>
                </thead>
                <tbody class="RV">
                    <tr id="espaco"></tr>
                    <tbody class="RV">
                        <tr id="espaco"></tr>
                            <?php $consulta->tabelas($tipoTabela ='RV', $b='');?>
                    </tbody>
                </tbody>
            </table>
        </div>    
            <?php include("ranking.php"); ?>
    </div>
 </div>
 <div id="modal2" class="modal modal-fixed-footer" style="overflow:scroll">
	<div class="modal-content"> 
		<div class="modal-footer" style="background-color:white">
	 		<a class="modal-close waves-effect waves-light btn" style="font-weight:bold;color:#1A7FCA">FECHAR</a>
		</div> 
		<div id="responseArea"></div>
	</div>
</div>	

