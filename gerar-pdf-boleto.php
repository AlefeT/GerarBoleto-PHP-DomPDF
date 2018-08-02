<?php
ob_start();
//include 'functions.php';


/*****************************
 **	 Puxar variaveis do BD	**
 *****************************/

$cpfCliente = $cpfcliente; //$cpfcliente

$dadosDevdor = getDadosdevedor($cpfCliente);
$nomecliente =  $dadosDevdor[0]; //nome do devedor
$codCliente = $dadosDevdor[1]; //código do devedor
$contrato = $dadosDevdor[2]; //contrato é a mesma coisa que número do título
$numAcordo = $dadosDevdor[2];


//TRATA VALOR PRA TER 2 CASAS APOS VIRGULA
$valor1 = $valor2; //$valor2

$findme   = ',';
$pos = strpos($valor1, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) 
{
    //The string '$findme' was NOT found in the string 'valor1'
    
    $valor3 = $valor1 . ',00';
} 
else 
{
    //The string '$findme' was found in the string 'valor1'
    //and exists at position $pos
        
    $valor0 = explode(",", $valor1);
    //valor0[0] é esquerda da virgula
    //valor0[1] é direita da virgula
        
    $valorlength = strlen($valor0[1]);
    
    if ($valorlength == 1)
    {
        $valor3 = $valor1 . '0';
    }
    else if ($valorlength == 2)
    {
        $valor3 = $valor1;
    }
    
}
$valor = $valor3;
//TERMINA TRATAMENTO DO VALOR 


$vencimento = $datadevencimento; 
$prorrogacao = $datadevencimento; //
$linhaDigitavel = $linhadigitavel; //"84640000000 2  00960296201 2  80316404004 7  92950839777 5";

//puxa do N5
//var_dump($dadosdivida2); 


//TRATA VALOR ORIGINAL PRA TER 2 CASAS APOS VIRGULA

$valorOrgnl1 = $dadosdivida2[0]; //number_format($dadosdivida2[0],2,",",".");

$findme   = ',';
$pos = strpos($valorOrgnl1, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) 
{
    //The string '$findme' was NOT found in the string 'valor1'
    
    $valorOrgnl3 = $valorOrgnl1 . ',00';
} 
else 
{
    //The string '$findme' was found in the string 'valor1'
    //and exists at position $pos
        
    $valorOrgnl0 = explode(",", $valorOrgnl1);
    //valor0[0] é esquerda da virgula
    //valor0[1] é direita da virgula
        
    $valorOrglength = strlen($valorOrgnl0[1]);
    
    if ($valorOrglength == 1)
    {
        $valorOrgnl3 = $valorOrgnl1 . '0';
    }
    else if ($valorOrglength == 2)
    {
        $valorOrgnl3 = $valorOrgnl1;
    }
    
}
$valorOrgnl = $valorOrgnl3;
//TERMINA TRATAMENTO DO VALOR ORIGINAL


$venctoOriginal = $dadosdivida2[1]; //"19/05/217"; 




/*****************************
 ** 	 Variaveis Fixas	**
 *****************************/

$situacao = "EM ABERTO";
$porcentDesconto = "0";
$nro = "1";
$dataAcordo = date('d/m/Y');



// INTERSIC NÃO RETORNA

//$logradouro = " ";
//$numresidencia = " ";
//$endereco = $logradouro . " " . $numresidencia;
//$bairro = " ";
//$cidade = " ";
//$cep = " ";




/*****************************
 **     Chamar a Funcao 	**
 *****************************/
include 'function-geraTopoBoleto.php';
echo geraTopoBoleto($codCliente, $nomecliente, $valor, $vencimento, $cpfCliente, $contrato, $numAcordo, $produto, $dataAcordo, $venctoOriginal, $valorOrgnl, $nro, $situacao);


include 'function-geraBoleto.php';
echo geraBoleto($codCliente, $nomecliente, $porcentDesconto, $valor, $vencimento, $prorrogacao, $linhaDigitavel);




/*****************************
 **    	  Gerar o PDF 	    **
 *****************************/

require_once 'dompdf/autoload.inc.php';


$random= rand();


use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf -> loadhtml(ob_get_clean());
$dompdf -> render();



file_put_contents('boletospdf/'.$cpfCliente.'.pdf', $dompdf->output());

//mostra o pdf na tela
//$dompdf -> stream ("boletocliente.pdf", array ("Attachment" => 0));

?>