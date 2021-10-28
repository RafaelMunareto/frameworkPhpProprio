<?php
	namespace classes\helper;

	class Conexao
	{
	    public $host    = "localhost";
	    public $usuario = "rafa";
	    public $senha = "rafa";
	    public $banco = "direa5174_2019";
	    public $charset;
	    public $mysqli;
	   
		
	    public function __construct($host, $usuario, $senha, $banco, $charset, $mysqli)
	    {
	        $this->host = $host;
	        $this->usuario = $usuario;
	        $this->senha = $senha;
	        $this->banco = $banco;
	        $this->mysqli = $mysqli;
			$this->charset = set_charset('utf8');
	    }

	    public function conecta()
	    {

	    	$this->mysqli = mysqli_connect($this->host, $this->usuario, $this->senha,  $this->banco);

	       	if(!$this->mysqli)
	 		{
			 	echo "Falha na conexao com o Banco de Dados!<br />";
				echo "Erro: " . mysql_error();
			 	die();
	 		}


	    }
	    
	    public function fechaConexao()
	    {
	        $this->mysqli->close();
	    }

	}

?>