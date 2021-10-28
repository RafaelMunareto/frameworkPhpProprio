<?php 
	namespace classes\select;
	use classes\helper\Conexao;

	class SelectBox extends Conexao {
	

		public function __construct(string $view, string $tipo)
		{
			$this->view = $view;
			$this->tipo = $tipo;
			$this->conecta();
	
		}

		public function matricula(): string
		{
			$view = $this->view;
			
			$buscaMatricula = $this->mysqli->prepare(
				"SELECT MATRICULA
				 FROM $view
				 ORDER BY NOTA_FINAL DESC
				 LIMIT 1");

			$buscaMatricula->execute();
			$matricula = $buscaMatricula->get_result()->fetch_assoc();
			$matricula = implode("", $matricula);
			if(isset($_GET['m'])){ $matricula = $_GET['m'];}
			
			return $matricula;
		}
		

		public function busca_CGC(): string
		{
			$matricula = $this->matricula();

			$resultado = $this->mysqli->query(
				"SELECT CGC_SR 
				 FROM Performance_GECAN_4t 
				 WHERE MATRICULA = '$matricula'
				");

			$CGC = $resultado->fetch_assoc();
			$CGC = implode("", $CGC);

			return $CGC;
		}

		
	    public function am_ref(): string
	    {
			$selecionaMes = $this->mysqli->query(
		    "SELECT AM_REF 
			FROM Performance_GECAN_4t 
			ORDER BY AM_REF DESC 
			LIMIT 1
			");
			
			$am_ref = $selecionaMes->fetch_assoc();
			$am_ref = implode("", $am_ref);

			return $am_ref;
		}

		public function selectStart()
		{
			$matricula = $this->matricula();
			$tipo = $this->tipo;

				$query = 
				 	"SELECT distinct(matricula), nome 
				 	 FROM Performance_GECAN_4t
				 	 WHERE TIPO = '$tipo'
				 	 ORDER BY NOME";

	            $resultSet = mysqli_query($this->mysqli, $query);
	          
				while ($registro = mysqli_fetch_assoc($resultSet)) 
	            {
					
	                if ($registro['matricula'] == $matricula)
	                {
	                    echo '<option selected value="' . $registro['matricula'] . '">' . utf8_encode($registro['nome']) . '</option>';
	                }else{
	                    echo '<option value="' . $registro['matricula'] . '">' . utf8_encode($registro['nome']) . '</option>';
	                }
	                
	            }

			}			
		 
		}

?>
