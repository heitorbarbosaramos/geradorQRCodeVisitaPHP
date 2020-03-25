<?php  
	   
	   function geradorQRCode($array){
			
			include('phpqrcode/qrlib.php');
			
			$logo = 'logotipo.PNG';

			$nome         				= $array['nome'];
			$telefone1    				= $array['telefone1'];
			$telefone2    				= $array['telefone2'];
			$celular      				= $array['celular'];
			$organizacao 				= $array['organizacao'];
			$url 						= $array['url'];			
			$email        				= $array['email'];			
			// se não for usado - deixe em branco!			
			$adcionarRotuloEndereco     = $array['adcionarRotuloEndereco'];
			$adcionarCEP    			= $array['adcionarCEP'];
			$adcionarComplemento 		= $array['adcionarComplemento'];
			$adcionarEndereco    		= $array['adcionarEndereco'];
			$adcionarCidade     		= $array['adcionarCidade'];
			$adcionarRegiao     		= $array['adcionarRegiao'];
			$adcionarPais   			= $array['adcionarPais'];
			$tamanhoQRcode   			= $array['tamanhoQRcode'];
			$nomeQRCode   				= $array['nomeQRCode'];
			
			// construcao do QRCode
			
			$codeContents  = 'BEGIN:VCARD'."\n";
			$codeContents .= 'VERSION:2.1'."\n";
			$codeContents .= 'FN:'.$nome."\n";
			$codeContents .= 'ORG:'.$organizacao."\n";
			
			$codeContents .= 'TEL;WORK;VOICE:'.$telefone1."\n";
			$codeContents .= 'TEL;HOME;VOICE:'.$telefone2."\n";
			$codeContents .= 'TEL;TYPE=cell:'.$celular."\n";
			
			$codeContents .= 'ADR;TYPE=work;'.
			'LABEL="'.$adcionarRotuloEndereco.'":'			
			.$adcionarEndereco.';'
			.$adcionarComplemento.';'
			.$adcionarCidade.';'
			.$adcionarRegiao.';'
			.$adcionarCEP.';'
			.$adcionarPais
			."\n";
			
			$codeContents .= 'EMAIL:'.$email."\n";			
			$codeContents .= 'URL:'.$url."\n";	
			$codeContents .= 'END:VCARD';
			
			// generating
			QRcode::png($codeContents,$nomeQRCode, QR_ECLEVEL_L, $tamanhoQRcode);
			
			// displaying			
			echo "<img src='$nomeQRCode' />";

	}
	   
	   $array = array(
						"nome" 						=> "Heitor Fernando Barbosa Ramos",
						"telefone1" 				=> "(049)012-345-678",
						"telefone2" 				=> "(049)012-345-987",
						"celular" 					=> "(049)888-123-123",
						"organizacao" 				=> "AllBeTech",
						"url" 						=> "www.allbetech.com.br",
						"email" 					=> "heitorhfbr@gmail.com",
						"adcionarRotuloEndereco" 	=> "Nosso escritório",
						"adcionarCEP" 				=> "06725-050",
						"adcionarComplemento" 		=> "Suite 123",
						"adcionarEndereco" 			=> "7th Avenue",
						"adcionarCidade" 			=> "New York",
						"adcionarRegiao" 			=> "NY",
						"adcionarPais" 				=> "Brasil",
						"tamanhoQRcode" 			=> 1,
						"nomeQRCode" 				=> "heitor.png",
					);

	geradorQRCode($array);


?>