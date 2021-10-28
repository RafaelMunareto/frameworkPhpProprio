
	<div class="div_ranking">   
	   <div class="div-RV"> 
	        <div id="titulo-seg4" class="card mb-3 widget-content bg-midnight-bloom">
	    		<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading"></div>
	    				<div class="widget-subheading"></div>		
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>Ranking</span>		
						</div>		
					</div>		
	    		</div>		
	        </div>

		    <div class="scroll">
		        <table  class="ranking">
		            <thead>                    
		                <tr>
		                    <th>Colocação</th>
		                    <th>Rede de Atuação</th>
		                    <th>Nota</th>
		                </tr>
		            </thead>
		            <tbody
		                <tr>
		  					<?php
	    						$consulta->ranking();
		  					?>
		                </tr>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>


