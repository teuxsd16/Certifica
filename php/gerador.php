<?php
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
require('../php/fpdf/alphapdf.php');
require('../php/PHPMailer/class.phpmailer.php');
require '../php/conexao.inc';

$consulta1="select *from lista where id=3";
$conn1=mysqli_query($link,$consulta1);

while ($dado1=$conn1->fetch_array()){
    $email= $dado1['email'];
    $nome= $dado1['nome'];
}

$opcao    = substr($_POST['tipo'], 0, 1);

$consulta="select *from evento where id='$opcao'";
$conn=mysqli_query($link,$consulta);

while ($dado=$conn->fetch_array()){
    $empresa= $dado['orgao'];
    $modelo= $dado['tipo'];
    $curso= $dado['nome'];
    $carga_h=$dado['cargaHoraria'];
}


$texto1 = utf8_decode($empresa);
if($modelo=="Palestra"){
  $texto2 = utf8_decode("pela participação na ".$modelo." de ".$curso." com carga horária total de ".$carga_h." horas.");
}
else{
  $texto2 = utf8_decode("pela participação no ".$modelo." de ".$curso." com carga horária total de ".$carga_h." horas.");
}
$texto3 = utf8_decode("Bahia, ".utf8_encode(strftime( '%d de %B de %Y', strtotime( date( 'Y-m-d' ) ) )));


$pdf = new AlphaPDF();

$pdf->AddPage('L');


$pdf->SetLineWidth(1.5);


$pdf->Image('../img/certificado.jpeg',0,0,295);


$pdf->SetAlpha(1);


$pdf->SetFont('Arial', '', 15);

$pdf->SetXY(109,46);

$pdf->MultiCell(265, 10, $texto1, '', 'L', 0); // Tamanho width e height e posição
//
// // Mostrar o nome

$pdf->SetFont('Arial', '', 30); // Tipo de fonte e tamanho

$pdf->SetXY(20,86); //Parte chata onde tem que ficar ajustando a posição X e Y

$pdf->MultiCell(265, 10, $nome, '', 'C', 0); // Tamanho width e height e posição
//
// // Mostrar o corpo

$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho

$pdf->SetXY(20,110); //Parte chata onde tem que ficar ajustando a posição X e Y

$pdf->MultiCell(265, 10, $texto2, '', 'C', 0); // Tamanho width e height e posição
//
// // Mostrar a data no final

$pdf->SetFont('Arial', '', 15);

$pdf->SetXY(32,172); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(165, 10, $texto3, '', 'L', 0); 
//

$pdfdoc = $pdf->Output('', 'S');

// Enviar pelo email
$subject = 'Seu Certificado do Workshop';

$messageBody = "Olá $nome<br><br>É com grande prazer que entregamos o seu certificado.<br>Ele está em anexo nesse e-mail.<br><br>Atenciosamente,<br>UpCertifica</a>";


$mail = new PHPMailer();

$mail->SetFrom("matheus_carvalho192@outlook.com", "Certificado Pronto");

$mail->Subject    = $subject;

$mail->MsgHTML(utf8_decode($messageBody));

$mail->AddAddress($email);

$mail->addStringAttachment($pdfdoc, 'certificado.pdf');

$mail->Send();
//
$certificado="../certificados/$nome-$modelo.pdf";
$pdf->Output($certificado,'F'); //Salva o certificado no servidor (verifique se a pasta "arquivos" tem a permissão necessária)

$pdf->Output();
mysqli_close($link);

?>
