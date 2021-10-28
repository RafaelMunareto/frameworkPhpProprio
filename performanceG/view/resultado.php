<html>
<head>
    <title>Performance GECAN - Resultado</title>
	<?php include('cabecalho.php');?> 
</head>
<body>	
	<main>
	    <div class="cabecalho">
	        <div class="home"><a href="./abertura"><div class="iconeHome"></div></a></div>
<!-- Select -->
			<select id='e1' name='matricula' onchange='window.location="http://localhost:8080/performanceGecan/resultado?m=" + this.value'>
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
				<h4>Superintendência - <?php echo $select->busca_CGC();  ?></h4>
				<table  class="ranking" id ="modal" style="overflow: scroll;">
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
<!-- FIM Modal Structure Acompanhe sua SR -->
		<div style='margin-top:1rem'>
<!--Histórico -->
	        <input type="radio" name="resize-graph" id="graph-small" checked="checked" />
	    	<input type="radio" name="paint-graph" id="graph-blue" checked="checked" />
	    	<input type="radio" name="fill-graph" id="f-product1" checked="checked" />
	    	<ul class="graph-container">
				<?php 
					$consulta->nota_final($mes='201910', $mes_nome='Outubro');
				?>
	        	<ul class="graph-marker-container"></ul>
	    	</ul>
<!-- FIM Histórico -->
	    </div>
	    <div class="notaR">    
	        <?php include("notas.php");?>
	    </div>
	    <div class="tabelaR">
	        <?php include("tabelas.php");?>
	    </div>
	</main>
</body>
</html>
<script rel="stylesheet" src="./public/js/simulador_e_calculoJQ1.js"></script> 
<?php include('rodape.php'); ?>

