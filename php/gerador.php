<?php

require('../php/fpdf/alphapdf.php');
require('../php/PHPMailer/class.phpmailer.php');
require '../php/conexao.inc';

$pessoa    = substr($_POST['pessoa'], 0, 1);


$consulta1="select *from lista where id='$pessoa'";
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

$pdf->MultiCell(265, 10, $texto1, '', 'L', 0);

$pdf->SetFont('Arial', '', 30);

$pdf->SetXY(20,86);

$pdf->MultiCell(265, 10, $nome, '', 'C', 0);


$pdf->SetFont('Arial', '', 15);
$pdf->SetXY(20,110);

$pdf->MultiCell(265, 10, $texto2, '', 'C', 0);
//
// // Mostrar a data no final

$pdf->SetFont('Arial', '', 15);

$pdf->SetXY(32,172);
$pdf->MultiCell(165, 10, $texto3, '', 'L', 0);
//

$pdfdoc = $pdf->Output('', 'S');

// Enviar pelo email
$subject = 'Seu Certificado do Workshop';

$messageBody = "Olá $nome<br><br>É com grande prazer que entregamos o seu certificado.<br>Ele está em anexo nesse e-mail.<br><br>Atenciosamente,<br>UpCertifica</a>";


$mail = new PHPMailer();

$mail->SetFrom("vitojgp@gmail.com", "Certificado Pronto");

$mail->Subject = $subject;

$mail->MsgHTML(utf8_decode($messageBody));

$mail->AddAddress($email);

$mail->addStringAttachment($pdfdoc, 'certificado.pdf');

$mail->Send();

$certificado="../certificados/$nome-$modelo.pdf";



$pdf->Output($certificado,'F');

$pdf->Output();

mysqli_close($link);

?>
