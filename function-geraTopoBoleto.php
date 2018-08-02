<?php


/*************************
 *************************
 ** 					**
 **	  Gera TOPO Boleto	**
 **						**
 *************************
 *************************/

function geraTopoBoleto($codCliente, $nomecliente, $valor, $vencimento, $cpfCliente, $contrato, $numAcordo, $produto, $dataAcordo, $venctoOriginal, $valorOrgnl, $nro, $situacao){

	
	
	
/***************************
 *	   Trata Variáveis	   *
 ***************************/
	
	
//1. Codigo do cliente, vem pelo parametro
$codClienteB = $codCliente;
	
	
//2. Nome do cliente completo, vem pelo parametro
$nomeClienteB = $nomecliente;

//////2.1. Nome do cliente limitado a 28 caracteres, após tratar $nomeCliente
	$nomeClienteTratado = substr("$nomeClienteB", 0, 28);

//4. Valor a pagar, vem pelo parametro
$valorB = $valor;
	
//5. Data do vencimento dd/mm/yyyy, vem pelo parametro
$vencimentoB = $vencimento;

//6. cpf do cliente
$cpfClienteB = $cpfCliente;
    
//7. numero do contrato
$contratoB = $contrato;
    
//8. numero do acordo
$numAcordoB = $numAcordo;
    
//9. produto
$produtoB = $produto;

//10. data que o acordo foi firmado
$dataAcordoB = $dataAcordo;
    
//11. endereco do cliente
$enderecoB = " ";

//12. bairro do cliente
$bairroB = " ";
    
//13. cidade do cliente
$cidadeB = " ";
    
//14. cep do cliente
$cepB = " ";
  
//15. vencimento original    
$venctoOriginalB = $venctoOriginal;
   
//16. valor original
$valorOrgnlB = $valorOrgnl;
    
//17. numero
$nroB = $nro;
    
//18. situacao do acordo
$situacaoB= $situacao;
    
    
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



<!-- - - - - - - - - - - - - -
 -	 Linha abaixo do logo  -
 -- - - - - - - - - - - -  --->
<div  style="text-align: center;
			width: 705px;
			height: 0px; 
			  
			top: 45px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			background-color: white;
			 
			border: 1px solid black;"></div>

    
<!-- - - - - - - - -  
 -	 GRID 1 - topo  -
 -- - - - - - - -  --->
<div  style="text-align: center;
			width: 705px;
			height: 39px; 
			  
			top: 130px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>
    
<div  style="text-align: center;
			width: 352px;
			height: 39px; 
			  
			top: 130px; 
			bottom: 0px;
			left: 187px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>
    
<div  style="text-align: center;
			width: 0px;
			height: 39px; 
			  
			top: 130px; 
			bottom: 0px;
			left: 363px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>   
    
<div  style="text-align: center;
			width: 705px;
			height: 0px; 
			  
			top: 150px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>  
    
    
 <!-- - - - - - - - -  
 -	 GRID 2 - Esquerda  -
 -- - - - - - - -  --->
<div  style="text-align: center;
			width: 325px;
			height: 39px; 
			  
			top: 185px; 
			bottom: 0px;
			left: 20px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>   
<div  style="text-align: center;
			width: 325px;
			height: 20px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 20px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>   
<div  style="text-align: center;
			width: 325px;
			height: 20px; 
			  
			top: 245px; 
			bottom: 0px;
			left: 20px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>    
 <div  style="text-align: center;
			width: 325px;
			height: 20px; 
			  
			top: 265px; 
			bottom: 0px;
			left: 20px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>     
<div  style="text-align: center;
			width: 0px;
			height: 39px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 140px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div> 
<div  style="text-align: center;
			width: 0px;
			height: 60px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 230px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div> 
    
<!-- - - - - - - - -  
 -	 GRID 2 - Direita  -
 -- - - - - - - -  --->
<div  style="text-align: center;
			width: 325px;
			height: 39px; 
			  
			top: 185px; 
			bottom: 0px;
			left: 380px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>    
<div  style="text-align: center;
			width: 325px;
			height: 20px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 380px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>  
<div  style="text-align: center;
			width: 325px;
			height: 20px; 
			  
			top: 245px; 
			bottom: 0px;
			left: 380px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>  
<div  style="text-align: center;
			width: 325px;
			height: 20px; 
			  
			top: 265px; 
			bottom: 0px;
			left: 380px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div>  
<div  style="text-align: center;
			width: 0px;
			height: 39px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 450px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div> 
<div  style="text-align: center;
			width: 0px;
			height: 60px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 530px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div> 
<div  style="text-align: center;
			width: 0px;
			height: 60px; 
			  
			top: 225px; 
			bottom: 0px;
			left: 610px; 
			right: 0px; 
			
			position: fixed;
			background-color: white;
			border: 1px solid black;"></div> 
	
    
    
    
    
    
<!-----------------------
 --	  	  TEXTOS	   --
 ------------------------>


<!-- - - - - - - - - - - - - - - - - - - - - - - 
 -	     ACORDO  $numAcordoB - $produto   -
 -- - - - - - - - - - - - - - - - - - - - - -- -->
<div style="top: 1px; 
			bottom: 0px;
			left: 105px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 15px;
			font-weight: bold;">
			ACORDO  <?php echo $numAcordoB ?> - <?php echo $produtoB ?></div>

<!-- - - - - - - - - - - - - - - - - - - - - - - 
 -	     Firmado em $dataAcordoB   -
 -- - - - - - - - - - - - - - - - - - - - - -- -->
<div style="top: 18px; 
			bottom: 0px;
			left: 105px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 14px;">
			Firmado em <?php echo $dataAcordoB ?></div>
    

<!-- - - - - - - - - - - - - - -
 -	 "Titular: " . $nomeCliente   -
 -- - - - - - - - - - - - - - -->
<div style="top: 56px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
			
			font-weight: bold;">
			<?php echo "Titular: " . $nomeClienteTratado ?></div>
    
<!-- - - - - - - - - - - - - - -
 -	 $enderecoB . " - " . $bairroB   -
 -- - - - - - - - - - - - - - -->
<div style="top: 72px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
			<!-- < ?php echo $enderecoB . " - " . $bairroB ?> --></div>
    
<!-- - - - - - - - 
 -	 $cidadeB   -
 -- - - - - - - - -->
<div style="top: 88px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
			<?php echo $cidadeB ?></div>
    
<!-- - - - - - - - 
 -	 cep: $cepB   -
 -- - - - - - - - -->
<div style="top: 104px; 
			bottom: 0px;
			left: 11px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
			<!-- < ?php echo "CEP " . $cepB ?> --></div>


    
<!-- - - - - - - - - - - - - - - - - - - - - - 
 -	 DEMONSTRATIVO DOS VALORES DO CONTRATO   -
 -- - - - - - - - - - - - - - - - - - - -- --->
<div style="top: 190px; 
			bottom: 0px;
			left: 25px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
            font-weight: bold;">
			DEMONSTRATIVO DOS VALORES DO CONTRATO</div>
<!-- - - - - - - - - - - - -
 -	 ORIGINAL EM ABERTO   -
 -- - - - - - - - - - - - --->
<div style="top: 205px; 
			bottom: 0px;
			left: 108px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
            font-weight: bold;">
            ORIGINAL EM ABERTO</div>
    
    
    
<!-- - - - - - - - - - - - - - - - - - -
 -	DEMONSTRATIVO DAS PARCELAS DO ACORDO  -
 -- - - - - - - - - - - - - - - - - - --->
<div style="top: 190px; 
			bottom: 0px;
			left: 390px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
            font-weight: bold;">
			DEMONSTRATIVO DAS PARCELAS DO ACORDO</div>
<!-- - - - - - - - - - - - - - -
 -	 FIRMADO EM $dataAcordoB   -
 -- - - - - - - - - - - - -  --->
<div style="top: 205px; 
			bottom: 0px;
			left: 466px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;
            font-weight: bold;">
            FIRMADO EM <?php echo $dataAcordoB ?></div>
    
<!-- - - - - - - - 
 -	 CONTRATO   -
 -- - - - - - - - --->
<div style="top: 132px; 
			bottom: 0px;
			left: 18px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            CONTRATO </div>    
<!-- - - - - - - - 
 -	 CREDOR   -
 -- - - - - - - - --->
<div style="top: 153px; 
			bottom: 0px;
			left: 18px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            CREDOR </div>  
    
<!-- - - - - - - - 
 -	 $contratoB   -
 -- - - - - - - - --->
<div style="top: 132px; 
			bottom: 0px;
			left: 194px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
           <?php echo $contratoB ?> </div>    
<!-- - - - - - - - 
 -	    -
 -- - - - - - - - --->
<div style="top: 153px; 
			bottom: 0px;
			left: 194px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            abc </div>  
    
<!-- - - - - - - - 
 -	 CPF   -
 -- - - - - - - - --->
<div style="top: 132px; 
			bottom: 0px;
			left: 370px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            CPF </div>    
<!-- - - - - - - - 
 -	 PRODUTO   -
 -- - - - - - - - --->
<div style="top: 153px; 
			bottom: 0px;
			left: 370px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            PRODUTO </div>  
<!-- - - - - - - - 
 -	 $cpfClienteB   -
 -- - - - - - - - --->
<div style="top: 132px; 
			bottom: 0px;
			left: 546px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo $cpfClienteB ?> </div>    
<!-- - - - - - - - 
 -	 PRODUTO   -
 -- - - - - - - - --->
<div style="top: 153px; 
			bottom: 0px;
			left: 546px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo $produtoB ?> </div>
    
<!-- - - - - - - - 
 -	 Parcela   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 25px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Parcela </div>
    
<!-- - - - - - - - 
 -	 Vencimento orig   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 145px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Vencimento </div>
    
<!-- - - - - - - - 
 -	 $venctoOriginalB   -
 -- - - - - - - - --->
<div style="top: 247px; 
			bottom: 0px;
			left: 145px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo $venctoOriginalB ?> </div>
    
 <!-- - - - - - - - 
 -	 Valor Original   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 245px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Valor Original </div>   
    
 <!-- - - - - - - - 
 -	 $valorOrgnlB   -
 -- - - - - - - - --->
<div style="top: 247px; 
			bottom: 0px;
			left: 240px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo "R$: " . $valorOrgnlB ?> </div>    
    
 <!-- - - - - - - - 
 -	 total $valorOrgnlB   -
 -- - - - - - - - --->
<div style="top: 268px; 
			bottom: 0px;
			left: 240px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo "R$: " . $valorOrgnlB ?> </div>        
    
<!-- - - - - - - - 
 -	 Valor Original   -
 -- - - - - - - - --->
<div style="top: 268px; 
			bottom: 0px;
			left: 25px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            TOTAL </div>    
    
    
 <!-- - - - - - - - 
 -	 Nro   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 384px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Nro </div>   
    
 <!-- - - - - - - - 
 -	 $nroB   -
 -- - - - - - - - --->
<div style="top: 247px; 
			bottom: 0px;
			left: 384px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo $nroB ?> </div>  
    
 <!-- - - - - - - - 
 -	 Vencimento   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 454px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Vencimento </div>   
    
 <!-- - - - - - - - 
 -	 $vencimentoB   -
 -- - - - - - - - --->
<div style="top: 247px; 
			bottom: 0px;
			left: 455px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo $vencimentoB ?> </div>       
     
 <!-- - - - - - - - 
 -	 Valor   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 555px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Valor</div>   
    
 <!-- - - - - - - - 
 -	 $valorB   -
 -- - - - - - - - --->
<div style="top: 247px; 
			bottom: 0px;
			left: 535px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo "R$: " . $valorB ?> </div>   
<!-- - - - - - - - 
 -	 total $valorB   -
 -- - - - - - - - --->
<div style="top: 267px; 
			bottom: 0px;
			left: 535px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo "R$: " . $valorB ?> </div>   
    
 <!-- - - - - - - - 
 -	 Situação   -
 -- - - - - - - - --->
<div style="top: 227px; 
			bottom: 0px;
			left: 616px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Situação </div>   
    
 <!-- - - - - - - - 
 -	 $situacaoB   -
 -- - - - - - - - --->
<div style="top: 247px; 
			bottom: 0px;
			left: 616px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            <?php echo $situacaoB ?> </div>        
    
<!-- - - - - - - - 
 -	 TOTAL   -
 -- - - - - - - - --->
<div style="top: 267px; 
			bottom: 0px;
			left: 384px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            TOTAL </div>     
    
<!-- - - - - - - - 
 -	 Pague suas parcelas...   -
 -- - - - - - - - --->
<div style="top: 310px; 
			bottom: 0px;
			left: 60px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            Pague sua(s) parcela(s) em dia e em caso de dúvida entre em contato conosco através dos telefones </div>     
    
 <!-- - - - - - - - 
 -	 telefones... que teremos a maior satisfaçao...   -
 -- - - - - - - - --->
<div style="top: 326px; 
			bottom: 0px;
			left: 110px; 
			right: 0px; 
			
			position: fixed;
			
			font-size: 13px;">
            3003 0222 ou 0800 772 0222, que teremos a maior satisfação em atende-lo.</div>    
    
    
    
    
    
    
    
<!-----------------------
 --	  	  IMAGENS	   --
 ------------------------>
	
	
<!-- - - - - - - - - - - - - - - - - - - -
 -		 	Logo do Boleto   		 -
 -- - - - - - - - - - - - - - - - - - - -->
<div style="top: 6px; 
			bottom: 0px;
			left: 13px; 
			right: 0px; 
			width: 91px;
			position: fixed;">   
	
			<img src="img/logo.png"></div>
	
<div style="top: 2px; 
			bottom: 0px;
			left: 675px; 
			right: 0px; 
			position: fixed;">  
	
			<img src="img/logo.png"></div></div>
<?php

}


?>