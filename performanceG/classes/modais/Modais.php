<?php
	namespace classes\modais;
	use classes\select\SelectBox;
	
	class Modais extends SelectBox
	{

		public function modal_acompanheSR(){
			$view = $this->view;
			$cgc_sr = $this->busca_CGC();
			$conn = $this->mysqli;

	   		$sql = 
	   			"SELECT DISTINCT 
				MATRICULA
				,NOME
				,NOTA
				,BONUS
				,NOTA_FINAL
				,CGC_SR
				,(SELECT @curRank := 0) AS COLOCACAO
				FROM $view
				WHERE CGC_SR = '$cgc_sr'
				ORDER BY NOTA_FINAL DESC";
				
				$consulta = mysqli_query($conn, $sql);
				$posicao = 0;
				while ($registro = mysqli_fetch_assoc($consulta)) 
				{		
					$posicao = $posicao + 1; 

					echo "<tr>\n";
						echo "<td style='text-align:center'>$posicao</td>\n";
						echo "<td style='text-align: center;'><a href='http://www.direa.caixa/sistemas/performance_gecan_4t/index.php?m=".$registro['MATRICULA']."'>".$registro['NOME']."</a></td>\n";
							if($registro['NOTA_FINAL']>=100){$cor = "#417BFF";}
							if($registro['NOTA_FINAL']<100 and $registro['NOTA_FINAL']>=90){$cor = "#4FA746";}
							if($registro['NOTA_FINAL']<90 and $registro['NOTA_FINAL']>=80){$cor = "#F3C010";}
							if($registro['NOTA_FINAL']<80){$cor = "#DD3545";}
						echo "<td style='color: ".$cor."; text-align:center'><b>".number_format($registro['NOTA_FINAL'],2,",",".")."</b></td>\n";
				   echo "</tr \n";
				}

		}

		public function modal_resultadoAG($item)
		{
			$am_ref = $this->am_ref();
			$conn = $this->mysqli;
			$matricula = $this->matricula();


			$sql = 
				"SELECT DISTINCT
				a.MATRICULA,
				a.CGC_AG,
				b.NU_UNIDADE,
				b.AM_REF,
				b.NU_ITEM,
				b.VR_OBJETIVO,
				b.VR_REALIZADO,
				b.NO_ITEM,
				b.VR_OBJETIVO,
				b.VR_REALIZADO,
				b.PC_ITEM as NOTA,
				c.cgc_pv as AGENCIA,
				c.nome_pv
				from DADOS_GECAN as a 
				INNER JOIN CONQUISTE_CANAIS_$am_ref as b 
				ON a.CGC_AG = b.NU_UNIDADE
				INNER JOIN unidades_direa as c
				ON b.NU_UNIDADE = c.cgc_pv
				WHERE b.NU_ITEM = '$item'
				AND a.MATRICULA = '$matricula'
				ORDER BY b.PC_ITEM DESC
				";

			$consulta = mysqli_query($conn, $sql);

			echo"<h4>Visão Agência</h4>";
			echo"<table  class='ranking'>";
				echo"<thead>";                    
					echo"<tr>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold; '>CGC</th>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold; '>AGENCIA</th>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>OBJETIVO</th>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>REALIZADO</th>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>NOTA</th>";
					echo"</tr>";
				echo"</thead>";
				echo"<tbody>";

			while ($registro = mysqli_fetch_assoc($consulta)) 
			{
				$objetivo = formataPreco($registro['VR_OBJETIVO']);
				$realizado = formataPreco($registro['VR_REALIZADO']);
			
				echo "<tr>\n";	
					echo "<td style='text-align:center;'>".$registro['AGENCIA']."</td>";
					echo "<td style='text-align:center;'>".$registro['nome_pv']."</td>";
					echo "<td style='text-align:center'>$objetivo </td>";
					echo "<td style='text-align:center'>$realizado</td>";
						if($registro['NOTA']>=100){$cor = "#417BFF";}
						if($registro['NOTA']<100 and $registro['NOTA']>=90){$cor = "#3AC47D";}
						if($registro['NOTA']<90 and $registro['NOTA']>=80){$cor = "#F3C010";}
						if($registro['NOTA']<80){$cor = "#DD3545";}
					echo "<td style='color: ".$cor."; text-align:center'><b>".number_format($registro['NOTA'], 2,'.','.')."</b></td>";
				echo "</tr>";
			}

			echo"</tbody>";	
			echo"</table>";
		}

		public function modal_portabilidade()
		{
			$matricula = $this->matricula();

			$query= 
				"SELECT distinct a.CGC_SR 
				,a.NOME_SR 
				,a.CGC_PV as AGENCIA
				,a.NOME_PV 
				,a.OBJETIVO 
				,a.REALIZADO 
				,a.AM_REF 
				,a.DATA 
				,b.MATRICULA 
				,b.NOME 
				,(a.REALIZADO  / a.OBJETIVO )* 100 as NOTA
				,(a.OBJETIVO  - a.REALIZADO )  AS GAP
				,c.nome_pv 
				FROM  DADOS_GECAN_PORTABILIDADE as a
				INNER JOIN  DADOS_GECAN as b
				on b.CGC_AG  = a.CGC_PV 
				INNER JOIN  unidades_direa as c
				ON b.CGC_AG  = c.cgc_pv 
				WHERE b.MATRICULA  = '".$matricula."'
				ORDER BY (a.OBJETIVO  - a.REALIZADO ) DESC";
		
			$resultSet = mysqli_query($this->mysqli, $query);

			echo"<h4>Visão Agência</h4>";
	  		echo"<table  class='ranking'>";
			echo"<thead>";                    
				echo"<tr>";
					echo"<th style='text-align:center; font-size:140%; font-weight:bold; '>CGC</th>";
					echo"<th style='text-align:center; font-size:140%; font-weight:bold; '>AGENCIA</th>";
					echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>OBJETIVO</th>";
					echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>REALIZADO</th>";
					echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>NOTA</th>";
					echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>GAP</th>";
				echo"</tr>";
			echo"</thead>";
			echo"<tbody>";

			while ($registro = mysqli_fetch_assoc($resultSet)) 
			{
				echo "<tr>\n";	
					echo "<td style='text-align:center;'>".$registro['AGENCIA']."</td>";
					echo "<td style='text-align:center;'>".$registro['nome_pv']."</td>";
					echo "<td style='text-align:center'>".number_format($registro['VR_OBJETIVO'], 2,'.','.')."</td>";
					echo "<td style='text-align:center'>".number_format($registro['VR_REALIZADO'], 2,'.','.')."</td>";
						if($registro['NOTA']>=100){$cor = "#417BFF";}
						if($registro['NOTA']<100 and $registro['NOTA']>=90){$cor = "#3AC47D";}
						if($registro['NOTA']<90 and $registro['NOTA']>=80){$cor = "#F3C010";}
						if($registro['NOTA']<80){$cor = "#DD3545";}
					echo "<td style='color: ".$cor."; text-align:center'><b>".number_format($registro['NOTA'], 2,'.','.')."</b></td>";
					echo "<td style='text-align:center'>".$registro['GAP']."</td>";
				echo "</tr>";
			}

			echo"</tbody>";	
			echo"</table>";
		}
	
		public function dispersao_ag()
		{
			$matricula = $this->matricula();
			$am_ref = $this->am_ref();
			$conn = $this->mysqli;

	   		$sql = 	   
				"SELECT DISTINCT
				a.CGC_AG,
				a.MATRICULA,
				b.NU_ITEM,
				b.NU_UNIDADE,
				b.PC_ITEM,
				c.cgc_pv,
				c.nome_pv
				FROM  DADOS_GECAN as a
				INNER JOIN  CONQUISTE_CANAIS_$am_ref as b
				ON a.CGC_AG = b.NU_UNIDADE
				INNER JOIN  unidades_direa as c
				ON b.NU_UNIDADE = c.cgc_pv
				WHERE b.NU_ITEM = 6
				AND a.MATRICULA = '$matricula'
				ORDER BY b.PC_ITEM DESC
			";

			$consulta = mysqli_query($conn, $sql);
			echo"<h4>Dispersão das Agências</h4>";
		  		echo"<table  class='ranking'>";
				echo"<thead>";                    
					echo"<tr>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold; '>CGC</th>";
						echo"<th style='text-align:center; font-size:140%; font-weight:bold; '>AGENCIA</th>";					
						echo"<th style='text-align:center; font-size:140%; font-weight:bold;'>NOTA</th>";
					echo"</tr>";
				echo"</thead>";
				echo"<tbody>";
			while ($registro = mysqli_fetch_assoc($consulta)) 
			{
				echo "<tr>\n";	
					echo "<td style='text-align:center;'>".$registro['cgc_pv']."</td>";
					echo "<td style='text-align:center;'>".$registro['nome_pv']."</td>";
						if($registro['PC_ITEM']>=100){$cor = "#417BFF";}
						if($registro['PC_ITEM']<100 and $registro['PC_ITEM']>=90){$cor = "#3AC47D";}
						if($registro['PC_ITEM']<90 and $registro['PC_ITEM']>=80){$cor = "#F3C010";}
						if($registro['PC_ITEM']<80){$cor = "#DD3545";}
					echo "<td style='color: ".$cor."; text-align:center'><b>".number_format($registro['PC_ITEM'], 2,'.','.')."</b></td>";
				echo "</tr>";
			}
			echo"</tbody>";	
			echo"</table>";

		}

	}

?>
