<?php
	namespace classes\consulta;
	use classes\select\SelectBox;
	
	class ConsultaTabelas extends SelectBox
	{
		
	    public function tabelas(string $tipoTabela, string $b)
	    {
			$matricula = $this->matricula();
			$am_ref = $this->am_ref();
			
	    	$query = 
		    	"SELECT * FROM Performance_GECAN_4t as t
	            INNER JOIN Performance_GECAN_4t_TIPO_REDE as r
	            ON t.NU_ITEM= r.COD_ITEM
	            WHERE MATRICULA = '$matricula' 
	            AND AM_REF = '$am_ref'
				AND REDE = '$tipoTabela'
			";
    
		  	$resultSet = mysqli_query($this->mysqli, $query);

			while ($registro = mysqli_fetch_assoc($resultSet)) 
		    {
				
				$meta = $registro['VR_OBJETIVO'];
				$meta = number_format($meta,2);
				$realizado = $registro['VR_REALIZADO'];
				$realizado = number_format($realizado,2);
				$peso = $registro['QT_PESO'];
                $data = $registro['DATA'];
                $item = $registro['NU_ITEM'];
                $nome = $registro['NOME'];
                $nome = utf8_encode($nome);

	            echo"<tr>";
	                echo"<th class='btn_item' id={$item}><a style='font-size:0.7rem' class='waves-effect waves-light btn modal-trigger' href='#modal2'>$nome</a></th>";               
	                echo"<td class='meta' id='meta_{$item}'>$meta</td>";     
	                echo"<td class='realizado' id='realizado_{$item}'>$realizado</td>";
	                echo"<td class='percentual' id='percentual_{$item}'></td>";      
	                echo"<td><div class='barra-area'><div class='barra'><span id='carga_{$item}' class='carga'></span></div></div></td>";
	                echo"<td><output class='peso{$b}' id='peso_{$item}'>$peso</output></td>";        
	                echo"<td class='data' id='data'>$data</td>";        
	                echo"<td><input class='input' type='text' id='input_{$item}'></td>";        
	                echo"<td><output class='peso_output{$b}' for='input_{$item}' id='peso_output_{$b}{$item}' class='form-control' ></output></td>"; 
	                if($b == ''){echo"<td><output class='agrega' id='agrega_{$item}' class='form-control'></output></td>";}        
	            echo"</tr>";    
		   	}
	
			   
		}

		public function ranking()
		{
			$tipo = $this->tipo;
			$view = $this->view;
			$matricula = $this->matricula();
			
	   		$query = 
	   				"SELECT DISTINCT
					MATRICULA
					,NOME
					,NOTA
					,BONUS
					,NOTA_FINAL
					,CGC_SR
					FROM $view
				    ORDER BY NOTA_FINAL DESC";
			
			$resultSet = mysqli_query($this->mysqli, $query);

			$posicao = 0;

			while ($registro = mysqli_fetch_assoc($resultSet)) 
	   		{
				$posicao = $posicao + 1; 
			
   				echo "<tr>";
   							
					if($posicao == 1){ 
						echo"<td><img style='width:12%;height:auto' src='./public/img/1lugar.png'></td>\n";
					}else if ($posicao == 2){
						echo"<td><img style='width:12%;height:auto' src='./public/img/2lugar.png'></td>\n";
					}else if ($posicao == 3){
						echo"<td><img style='width:12%;height:auto' src='./public/img/3lugar.png'></td>\n";
					}else{
						echo "<td>$posicao</td>\n";
					}
                    echo "<td style='text-align: center;'><a href='http://localhost:8080/performanceGecan/$tipo?m=".$registro['MATRICULA']."'>".$registro['NOME']."</a></td>\n";
						if($registro['NOTA_FINAL']>=100){$cor = "#417BFF";}
						if($registro['NOTA_FINAL']<100 and $registro['NOTA_FINAL']>=90){$cor = "#4FA746";}
						if($registro['NOTA_FINAL']<90 and $registro['NOTA_FINAL']>=80){$cor = "#F3C010";}
						if($registro['NOTA_FINAL']<80){$cor = "#DD3545";}
                    echo "<td style='color: ".$cor."'><b>".number_format($registro['NOTA_FINAL'],2,",",".")."</b></td>\n";
                echo "</tr>\n";
	   		}

		}	

		public function nota_final($mes, $mes_nome)
		{

			$matricula = $this->matricula();
			$view = $this->view;

			$query = 
				"SELECT DISTINCT * FROM $view
				WHERE MATRICULA = '$matricula'
				AND AM_REF = '$mes'";
		
            $consulta = mysqli_query($this->mysqli, $query);
            while ($registro = mysqli_fetch_assoc($consulta)) 
            {
				$result = $registro['NOTA_FINAL'];
            
		    }
		        echo"<li>";
		            echo"<span>$mes_nome</span>";
		            echo"<div class='bar-wrapper'>";
		                echo"<div class='bar-container'>";
		                    echo"<div class='bar-background'></div>";
		                    echo"<div class='bar-inner' valor='$result'>$result</div>";
		                    echo"<span class='notaG'>$result</span>";
		                    echo"<div class='bar-foreground'></div>";
		                echo"</div>";
		            echo"</div>";
		        echo"</li>";

		}
	

	}



?>