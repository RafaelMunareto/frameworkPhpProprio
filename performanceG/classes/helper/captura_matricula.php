<?php
	namespace classes\helper;
	use classes\helper\Conexao;

	class captura_matricula extends Conexao{

		public function __construct()
	    {
	        $this->conecta();
	        $this->controle_acesso();

	    }

	    public function controle_acesso()
		{
		

			$cLot = "";
			$cUf = ""; 
			$aUser = explode("\\", $_SERVER["REMOTE_USER"]);
			$cDom = $aUser[0] ; //dominio
			$cMat = $aUser[1] ; //matricula
			$oUser = new COM("WinNT://" . $cDom . "/" . $cMat); 
			$cNome = $oUser->FullName ; //nome completo
			$cFunc = $oUser->Description ; //função: TECNICO BANCARIO NOVO

			if ((cMat == "") or (cDom == ""))
			{
			    echo "SEM IDENTIFICAÇÃO DE REDE (LOGON_USER inexistemte)!<BR>";
			}

			//para pegar a variavel Groups - achei 9 e são elas separadas por "|":
			// G Acesso Internet AE NAL|G RS5174 Sistemas|GCRNGerente|Domain Users|G CR7390 SAPBO SIALG_GESTAO|G RS5174 Usuarios|GOffice365EnterpriseE3|G Acesso Internet AP NAL|GPoliticaUsuarios|True 
			foreach ($oUser->Groups as $oGroup)
			{  
			    $cGrupo = $oGroup->Name;
				 
				$tamanho = strlen($cGrupo)*(-1);
				$prim = substr($cGrupo, $tamanho, 1);
				
			    if ( (($prim == "G") and (substr($cGrupo,-8) == "Usuarios")) or (($prim == "g") and (substr($cGrupo,-8) == "sistemas")) )
		    	{

			    	if (substr($cGrupo, 1, 8) <> 'Politica')
			    	{
				        $cLot = substr(substr($cGrupo, $tamanho, 8), 4);
				        $cUf = strtoupper(substr(substr($cGrupo, $tamanho, 4), 2));

						$lotacao = substr($cGrupo, 4,5);
						$estado = strtoupper(substr($cGrupo, 1,3));	

						date_default_timezone_set('America/Sao_Paulo');
						$dia = date('d/m/Y');
						$mes = date('m')/1;
						$URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

						$sql = "
							SELECT * 
							FROM [direa5174_2019].[dbo].[CONTROLE_ACESSOS] 
							WHERE matricula = '$cMat' 
							AND data_acesso = '$dia' 
							AND SISTEMA = '$URL'
							";
						
						$consulta = mssql_query($sql);
						$teste = true;
						while( $registro = mssql_fetch_assoc( $consulta ))
						{
							$teste = false;
						}

						if (!$teste)
						{

						}else{
							
							$sql = "
							INSERT INTO CONTROLE_ACESSOS 
							(nome,matricula,data_acesso,MES_ACESSO,SISTEMA,estado,lotacao) 
							VALUES ('$cNome','$cMat','$dia',$mes,'$URL','$cUf', '$cLot')
							";
							mssql_query( $sql);
						}

					}

				}

			}		

		}

	}




?>
