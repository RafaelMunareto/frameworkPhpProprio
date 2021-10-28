
<html>
<head>
    <title>Performance GECAN - Gestão</title>
	<?php include('cabecalho.php');?> 
</head> 
<body>  
	<main>
	    <div class="cabecalho">
	        <div class="home"><a href="./abertura"><div class="iconeHome"></div></a></div>
<!-- Select -->
			<select id='e1' name='matricula' onchange='window.location="http://localhost:8080/performanceGecan/gestao?m=" + this.value'>
			   <?php $select->selectStart();?>
			 </select>
<!-- FIM Select -->	    
	         <span ><a style="font-size:14px;font-weight:bold;color:#1A7FCA" class="waves-effect waves-light btn modal-trigger" href="#modal1">ACOMPANHE SUA SR</a></span>
	         <span ><a style="font-size:14px;font-weight:bold;color:#3AC47D" class="waves-effect waves-light btn modal-trigger" href="#modal3">DISPERSÃO DAS AGs</a></span>
	    </div>
	    <div class="meio">
<!-- Modal Structure - dispersao AGs-->
		<div id="modal3" class="modal modal-fixed-footer" style="overflow:scroll">
			
			<div class="modal-content"> 
				<div class="modal-footer" style="background-color:white">
			 	<a class="modal-close waves-effect waves-light btn" style="font-weight:bold;color:#1A7FCA">FECHAR</a>
				</div> 
				<?php $modal->dispersao_ag();?>
			</div>
			
		</div>	
<!-- FIM Modal Structure dispersao-->
<!-- Modal Structure Acompanhe sua SR-->
			<div id="modal1" class="modal modal-fixed-footer" style="overflow: scroll;">
				<div class="modal-content">
					<div class="modal-footer" style="background-color:white">
						<a class="modal-close waves-effect waves-light btn" style="font-weight:bold;color:#1A7FCA;">FECHAR</a>
					</div>
					<h4>Superintendência - <?php echo $modal->busca_CGC(); ?></h4>
					<table  class="ranking" style="overflow: scroll;">
						<thead>                    
							<tr>
								<th style="text-align:center; font-size:140%; font-weight:bold; ">AGÊNCIA</th>
								<th style="text-align:center; font-size:140%; font-weight:bold; ">GERENTE</th>
								<th style="text-align:center; font-size:140%; font-weight:bold; ">NOTA</th>
							</tr>
						</thead>
						<tbody>					
							<?php $modal->modal_acompanheSR();?>				
						</tbody>
					</table>
				</div>
			</div >
<!-- FIM Modal Structure -->

<!--Nota Final -->
	        <input type="radio" name="resize-graph" id="graph-small" checked="checked" />
	    	<input type="radio" name="paint-graph" id="graph-blue" checked="checked" />
	    	<input type="radio" name="fill-graph" id="f-product1" checked="checked" />
	    	<ul class="graph-container">
				<?php 
					$consulta->nota_final($mes='201910', $mes_nome='Outubro');
				?>
	        	 <ul class="graph-marker-container"> 
	            </ul>
	    	</ul>
<!--FIM Nota Final -->
	    </div>    
	    <div class="notasG">
	        <?php include("notasGestao.php"); ?>
	    <div class="tabelas">    
	        <div class="esquerda">
	            <div class="redeP">  
	                <?php include("tabelasGestao.php"); ?>
	            </div>
	        </div>
	        <div class="direita">
	            <?php include("rankingGestao.php"); ?>
	        </div>
	    </div>  
	</main>
</body>

<script src="./public/js/simulador_e_calculoGestao.js"></script> 
<?php include('rodape.php'); ?>

