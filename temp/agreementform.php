<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/common.php');
require '../vendor/autoload.php'; 

// 고소인 인적사항 
$name =  $_POST['name'];
$phone =  $_POST['phone'];
$jumin =  $_POST['jumin'];
$addr =  $_POST['gosoin_postcode'].' '.$_POST['gosoin_address'].' '.$_POST['gosoin_detailAddress'].' '.$_POST['gosoin_extraAddress'];
$delegateName =  $_POST['delegateName'];
$delegateCellPhone = $_POST['delegateCellPhone'];
$delegateAddr = $_POST['delegate_postcode'].' '.$_POST['delegate_address'].' '.$_POST['delegate_detailAddress'].' '.$_POST['delegate_extraAddress'];

// 피고소인 인적사항
$Dname =  $_POST['Dname'];
$Dphone =  $_POST['Dphone'];
$Djumin =  $_POST['Djumin'];
$Daddr =  $_POST['defender_postcode'].' '.$_POST['defender_address'].' '.$_POST['defender_detailAddress'].' '.$_POST['defender_extraAddress'];


// 고소요지 
$chkFamily = isset($_POST['chkFamily']); 
$chkDate = isset($_POST['chkDate']);


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('agreementform.docx');

$templateProcessor->setValue('name', $name);
$templateProcessor->setValue('sagunbunho', $phone);

$templateProcessor->setValue('oppoName', $Dname);

$templateProcessor->setValue('signDate', $delegateName  );
$templateProcessor->setValue('phone', $phone );
$templateProcessor->setValue('address', $addr);
$templateProcessor->setValue('socialNum', $jumin );

// Add HTTP headers to force user's browser save document
// instead of opening it like an HTML page
$file = '위임계약서.docx';
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file . '"');

$filepath = $templateProcessor->saveas('php://output');
