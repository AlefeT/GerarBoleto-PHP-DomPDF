<?php


/*************************
 *************************
 ** 					**
 **	  Gera Boleto   	**
 **						**
 *************************
 *************************/

function geraBoleto($codCliente, $nomecliente, $porcentDesconto, $valor, $vencimento, $prorrogacao, $linhaDigitavel){

	
	
	
/***************************
 *	   Trata Variáveis	   *
 ***************************/
	
	
//1. Codigo do cliente, vem pelo parametro
$codClienteB = $codCliente;
	
	
//2. Nome do cliente completo, vem pelo parametro
$nomeClienteB = $nomecliente;

//////2.1. Nome do cliente limitado a 28 caracteres, após tratar $nomeCliente
	$nomeClienteTratado = substr("$nomeClienteB", 0, 28);
	
	
//3. Porcentagem de Desconto de "0" a "100", vem direto do BD
$porcentDescontoB = $porcentDesconto;
	
	
//4. Valor a pagar, vem pelo parametro
$valorB = $valor;
	
//////4.1 Valor a pagar sem o "R$", após tratar $valor
	$valorTratado = str_replace('R$', '', $valorB);

	
//5. Data do vencimento dd/mm/yyyy, vem pelo parametro
$vencimentoB = $vencimento;

	
//6. Data da prorrogacao dd/mm/yyyy, vem pelo parametro
$prorrogacaoB = $prorrogacao;
	
	
//7. Codigo de ((11 caracteres, 1 espaco, 1 caractere, 2 espacos) 4x), vem pelo parametro
$linhaDigitavelB = $linhaDigitavel;
	
//////7.1. Array de ((11 caracteres, vazio, 1 caractere, vazio) 4x), após dividir $linhaDigitavel
	$blocosLinhaDigitavel = explode(" ", $linhaDigitavelB);

//////////7.2. Codigo de 44 caracteres, após tratar $blocosLinhaDigitavel
		$codBarra = $blocosLinhaDigitavel[0] . $blocosLinhaDigitavel[3] . $blocosLinhaDigitavel[6] . $blocosLinhaDigitavel[9]; 



	
	
/***********************
 *	   Gera Barras	   *
 ***********************/
	

		$fino = 1;
		$largo = 3;
		$altura = 35;
		$barcodes[0] = '00110';
		$barcodes[1] = '10001';
		$barcodes[2] = '01001';
		$barcodes[3] = '11000';
		$barcodes[4] = '00101';
		$barcodes[5] = '10100';
		$barcodes[6] = '01100';
		$barcodes[7] = '00011';
		$barcodes[8] = '10010';
		$barcodes[9] = '01010';
		
		for($f1 = 9; $f1 >= 0; $f1--){
			for($f2 = 9; $f2 >= 0; $f2--){
				$f = ($f1*10)+$f2;
				$texto = '';
				for($i = 1; $i < 6; $i++){
					$texto .= substr($barcodes[$f1], ($i-1), 1).substr($barcodes[$f2] ,($i-1), 1);
				}
				$barcodes[$f] = $texto;
			}
		}
		
		echo "<div  style='text-align: center;
			width: 500px;
			height: 35px; 
			  
			top: 680px; 
			bottom: 0px;
			left: 210px; 
			right: 0px;
			z-index:99;
			
			position: fixed;'>";
		echo '<img src="img/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="img/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="img/p.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="img/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		
		echo '<img ';
		
		$texto = $codBarra;
		
		if((strlen($texto) % 2) <> 0){
			$texto = '0'.$texto;
		}
		
		while(strlen($texto) > 0){
			$i = round(substr($texto, 0, 2));
			$texto = substr($texto, strlen($texto)-(strlen($texto)-2), (strlen($texto)-2));
			
			if(isset($barcodes[$i])){
				$f = $barcodes[$i];
			}
			
			for($i = 1; $i < 11; $i+=2){
				if(substr($f, ($i-1), 1) == '0'){
  					$f1 = $fino ;
  				}else{
  					$f1 = $largo ;
  				}
  				
  				echo 'src="img/p.gif" width="'.$f1.'" height="'.$altura.'" border="0">';
  				echo '<img ';
  				
  				if(substr($f, $i, 1) == '0'){
					$f2 = $fino ;
				}else{
					$f2 = $largo ;
				}
				
				echo 'src="img/b.gif" width="'.$f2.'" height="'.$altura.'" border="0">';
				echo '<img ';
			}
		}
		echo 'src="img/p.gif" width="'.$largo.'" height="'.$altura.'" border="0" />';
		echo '<img src="img/b.gif" width="'.$fino.'" height="'.$altura.'" border="0" />';
		echo '<img src="img/p.gif" width="1" height="'.$altura.'" border="0" />';
		echo "</div>"; 

?>





<!-------------------------
 -------------------------
 -- 					--
 --	   		CSS			--
 --						--
 -------------------------
 ------------------------->

<div id="boleto"
	 style="font-family: Arial, Helvetica, sans-serif;
	 white-space: nowrap;">




<!------------------------
 --	  BORDAS E LINHAS	--
 ------------------------->
    
    
    
<!-- - - - - - - - - - - -
 -	  Borda do Boleto	 -
 - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 730px;
			height: 220px; 
			  
			top: 500px; 
			bottom: 0px;
			left: 0px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 1px solid black;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -	  Borda do Codigo do Cliente Vertical	 -
 - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 49px;
			height: 157px; 
			  
			top: 550px; 
			bottom: 0px;
			left: 15px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 2px solid black;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -	  Borda do Valor a Pagar (R$) Vertical	 -
 - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 48px;
			height: 157px; 
			  
			top: 550px; 
			bottom: 0px;
			left: 73px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 2px solid black;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	  Linha Horizontal na parte de cima do Boleto, Esquerda	 -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 82px;
			height: 0px; 
			  
			top: 517px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 1px solid lightgray;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	  Linha Horizontal na parte de cima do Boleto, Direita	 -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 46px;
			height: 0px; 
			  
			top: 517px; 
			bottom: 0px;
			left: 670px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 1px solid lightgray;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	 Linha Pontilhada Horizontal na parte de cima do Boleto  -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 705px;
			height: 0px; 
			  
			top: 525px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 1px dashed lightgray;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	 Linha meio T da Autenticação Mecanica, parte de Cima    -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 0px;
			height: 30px; 
			  
			top: 550px; 
			bottom: 0px;
			left: 145px; 
			right: 0px; 
			
			position: fixed;
			
			border: 1px solid black;"></div>

<div  style="text-align: center;
			width: 15px;
			height: 0px; 
			  
			top: 550px; 
			bottom: 0px;
			left: 145px; 
			right: 0px; 
			
			position: fixed;
			
			border: 1px solid black;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	 Linha meio T da Autenticação Mecanica, parte de Baixo   -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div  style="text-align: center;
			width: 0px;
			height: 30px; 
			  
			top: 678px; 
			bottom: 0px;
			left: 145px; 
			right: 0px; 
			
			position: fixed;
			
			border: 1px solid black;"></div>

<div  style="text-align: center;
			width: 15px;
			height: 0px; 
			  
			top: 708px; 
			bottom: 0px;
			left: 145px; 
			right: 0px; 
	
			position: fixed;
			
			border: 1px solid black;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - --
 -	 Linha Pontilhada Vertical do Destaque Aqui   -
 -- - - - - - - - - - - - - - - - - - - - - - - --->
<div  style="text-align: center;
			width: 0px;
			height: 158px; 
			  
			top: 550px; 
			bottom: 0px;
			left: 195px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 1px dashed lightgray;"></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -	 Borda do Codigo do Cliente Horizontal   -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div  style="text-align: center;
			width: 250px;
			height: 29px; 
			  
			top: 622px; 
			bottom: 0px;
			left: 210px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 2px solid black;"></div>


<!-- - - - - - - - - - - - - - - - - - - - -
 -	 Borda Valor a Pagar (R$) Horizontal   -
 -- - - - - - - - - - - - - - - - - - - - -->
<div  style="text-align: center;
			width: 230px;
			height: 29px; 
			  
			top: 622px; 
			bottom: 0px;
			left: 478px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 2px solid black;"></div>


<!-- - - - - - - - - - --
 -	 Borda Vencimento   -
 -- - - - - - - - - - --->
<div  style="text-align: center;
			width: 110px;
			height: 30px; 
			  
			top: 565px; 
			bottom: 0px;
			left: 478px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 2px solid black;"></div>


<!-- - - - - - - - - - - -
 -	 Borda Prorrogação   -
 -- - - - - - - - - - - -->
<div  style="text-align: center;
			width: 108px;
			height: 30px; 
			  
			top: 565px; 
			bottom: 0px;
			left: 600px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 2px solid black;"></div>





	
<!-----------------------
 --	  	  TEXTOS	   --
 ------------------------>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	     Boleto no modelo de arrecadação (igual conta de consumo: agua, luz e telefone)    -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --->
<div style="top: 506px; 
			bottom: 0px;
			left: 95px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 15px;
			color: red;
			font-weight: bold;">
			Boleto no modelo de arrecadação (igual conta de consumo: agua, luz e telefone)</div>


<!-- - - - - - - - - - - - - - - - - - - - -
 -		 Codigo do Cliente Vertical  	   -
 -- - - - - - - - - - - - - - - - - - - - -->
<div style="top: 584px; 
			bottom: 0px;
			left: -69px; 
			right: 0px; 
			
			position: absolute;
			
			font-size: 11px;">
	
			<div style="transform: rotate(270deg);
			transform-origin: 100% 0;
			position: absolute;">
				
			Código do Cliente</div></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 $codClienteB Vertical  		 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 600px; 
			bottom: 0px;
			left: -23px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 15px;
	 
	 		font-weight: bold;">
			<div style="transform: rotate(270deg);
			transform-origin: 100% 0;
			position: absolute;">
			<?php echo $codClienteB ?></div></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 Valor a Pagar (R$) Vertical  		 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 582px; 
			bottom: 0px;
			left: -15px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 11px;">
			<div style="transform: rotate(270deg);
			transform-origin: 100% 0;
			position: absolute;">
			Valor a Pagar (R$)</div></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 $valorTratado Vertical  		 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 613px; 
			bottom: 0px;
			left: 60px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 14px;
	 
	 		font-weight: bold;">
			<div style="transform: rotate(270deg);
			transform-origin: 100% 0;
			position: absolute;">
			<?php echo $valorTratado ?></div></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	 Opção 1: $porcentDescontoB % de desconto para pagamento à vista: R$ $valorTratado    -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --
<div style="top: 528px; 
			bottom: 0px;
			left: 45px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 14px;
			
			font-weight: bold;">
			< ?php echo "Opção 1: " . $porcentDescontoB . "% de desconto para pagamento à vista: R$ " . $valorTratado ?></div>

-->
<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 Autenticação Mecânica Vertical  	 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 584px; 
			bottom: 0px;
			left: 47px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 9px;">
			<div style="transform: rotate(270deg);
			transform-origin: 100% 0;
			position: absolute;">
			Autenticação Mecânica</div></div>


<!-- - - - - - - - - - - - - - - - - -
 -		 Destaque Aqui Vertical  	 -
 -- - - - - - - - - - - - - - - - - -->
<div style="top: 650px; 
			bottom: 0px;
			left: 125px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 9px;">
			<div style="transform: rotate(270deg);
			transform-origin: 100% 0;
			position: absolute;">
			Destaque Aqui</div></div>


<!-- - - - - - - - - - - - - -
 -		 Nome do Cliente  	 -
 -- - - - - - - - - - - - - -->
<div style="top: 582px; 
			bottom: 0px;
			left: 210px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 10px;">
			Nome do Cliente</div>


<!-- - - - - - - - - - - - - -
 -	  $nomeClienteTratado  	 -
 -- - - - - - - - - - - - - -->
<div style="top: 444; 
			bottom: 0px;
			left: 210px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 14px;
			
			font-weight: bold;">
			<?php echo $nomeClienteTratado ?></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	 Autenticação Mecânica - Solicitamos não rasurar, dobrar ou perfurar esta parte da fatura    -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 457; 
			bottom: 0px;
			left: 315px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 9px;">
			Autenticação Mecânica - Solicitamos não rasurar, dobrar ou perfurar esta parte da fatura</div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 Código do Cliente Horizontal  		 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 468; 
			bottom: 0px;
			left: 295px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 10px;">
			Código do Cliente</div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 $codClienteB Horizontal  		 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 476; 
			bottom: 0px;
			left: 305px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 14px;
			
			font-weight: bold;">
			<?php echo $codClienteB ?></div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 Valor a Pagar (R$) Horizontal  	 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 468; 
			bottom: 0px;
			left: 555px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 10px;">
			Valor a Pagar (R$)</div>


<!-- - - - - - - - - - - - - - - - - - - - - -
 -		 $valorTratado Horizontal  		 -
 -- - - - - - - - - - - - - - - - - - - - - -->
<div style="top: 476; 
			bottom: 0px;
			left: 570px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 14px;
			
			font-weight: bold;">
			<?php echo $valorTratado ?></div>


<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 -	 $linhaDigitavelB blocoDeNums1 dig1  blocoDeNums2 dig2  blocoDeNums3 dig3  blocoDeNums4 dig4  -
 -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->		
<div style="top: 492; 
			bottom: 0px;
			left: 303px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 11px;">
			<?php echo $linhaDigitavelB; ?></div>


<!-- - - - - - - - - - - - - - - - - - - -
 -		 Documento para pagamento  		 -
 -- - - - - - - - - - - - - - - - - - - -->
<div style="top: 404; 
			bottom: 0px;
			left: 518px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 12px;">
			Documento para pagamento</div>


<!-- - - - - - - - - - - -
 -		 Vencimento  	 -
 -- - - - - - - - - - - -->
<div style="top: 426; 
			bottom: 0px;
			left: 510px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 10px;">
			Vencimento</div>


<!-- - - - - - - - - - - -
 -		$vencimentoB  	 -
 -- - - - - - - - - - - -->
<div style="top: 435; 
			bottom: 0px;
			left: 505px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
			
			font-weight: bold;">
			<?php echo $vencimentoB ?></div>


<!-- - - - - - - - - - - -
 -		Prorrogação  	 -
 -- - - - - - - - - - - -->
<div style="top: 425; 
			bottom: 0px;
			left: 629px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 10px;">
			Prorrogação</div>


<!-- - - - - - - - - - - -
 -		$prorrogacaoB  	 -
 -- - - - - - - - - - - -->
<div style="top: 435; 
			bottom: 0px;
			left: 625px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
			
			font-weight: bold;">
			<?php echo $prorrogacaoB ?></div>




	

<!-----------------------
 --	  	  img	   --
 ------------------------>
	
	
<!-- - - - - - - - - - - - - - - - - - - -
 -		 	Logo do Boleto   		 -
 -- - - - - - - - - - - - - - - - - - - -->
<div style="top: 546px; 
			bottom: 0px;
			left: 210px; 
			right: 0px; 
			width: 91px;
			position: fixed;">   
	
			<img src="img/logo.png"></div></div>

<?php

}


?>