<?php
/**
 *  PDF 만들기
*/

require '_common.php'; 

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


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('간이고소장(폭행)');
$pdf->SetSubject('폭행l');
$pdf->SetKeywords('고소장, 폭행, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('nanumbarungothicyethangul', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = '<h1 align="center"> 간이고소장 (폭행) </h1> 
<h3 class="sub-title">  1. 고소인의 표시    <small>     고소인에 대한 인적사항입니다. </small> </h3> </div>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// 테이블 
$html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
   <tbody>
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>이름</strong> </th>
            <td align="center">'.$name.'</td>
            <td bgcolor="#D9EDF7" align="center"><strong>주민등록번호</strong> </td>
            <td align="center">'.$jumin .'</td>
        </tr>
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>연락처</strong></th>
            <td  colspan="3" align="center">'.$phone.'</td>
        </tr>
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>주소</strong></th>
            <td colspan="3" align="center">'.$addr.'</td>
        </tr>';

     if(isset($_POST['bydelegate'])) {

        $html = $html.'
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>대리인에 의한 고소</strong></th>
            <td colspan="3" style="lineheight: 2em;">대리인 성명 : '.$delegateName.' <br />연락처(휴대전화) : '.$delegateCellPhone.'<br />주소 :'.$delegateAddr.'</td>
        </tr>';
     }

    $html = $html. '    
    </tbody>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Set some content to print 
// 피고소인 
$html = '<br /> 
<h3 class="sub-title">  2. 피고소인    <small>   여러명인 경우 별지를 활용하세요.  </small> </h3> </div>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, ''); 

// 테이블 
$html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
   <tbody>
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>이름</strong> </th>
            <td align="center">'.$Dname.'</td>
            <td bgcolor="#D9EDF7" align="center"><strong>주민등록번호</strong> </td>
            <td align="center">'.$Djumin.'</td>
        </tr>
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>연락처</strong></th>
            <td  colspan="3" align="center">'.$Dphone.'</td>
        </tr>
        <tr>
            <th bgcolor="#D9EDF7" align="center"><strong>주소</strong></th>
            <td colspan="3" align="center">'.$Daddr.'</td>
        </tr>
    </tbody>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, ''); 

// 피고소인 
$html = '<br /> 
<h3 class="sub-title">  3. 고소요지    <small>   피해사실이 여러 번인 경우 별지를 활용하세요.  </small> </h3> </div>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, ''); 

// 테이블 
$html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
   <tbody>
        <tr>
            <th bgcolor="#D9EDF7" align="center" width="25%"><strong>① 폭행종류</strong></th>
            <td width="75%" style="lineheight: 2em;">';

        // 폭행 종류 추가하기     
        if (isset($_POST['chkFamily'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 가정폭력  '; 

        if (isset($_POST['chkDate'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 교제(데이트)폭력  '; 

        if (isset($_POST['chkYoung'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 아동폭행  '; 

        if (isset($_POST['chkSchool'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 학교폭력  '; 

        if (isset($_POST['chkOld'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 노인폭행  <br /> '; 

        if (isset($_POST['chkMedical'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 의료인 폭행  '; 

        if (isset($_POST['chkAirplane'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 항공기 내 폭행  '; 

        if (isset($_POST['chkDriver'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 운전자 폭행  '; 

        if (isset($_POST['chkAssault'])) { $html  = $html .'<img src="checkbox-check.png" alt="checked" style="width:13px;height:12px;" />'; }else { $html  = $html .' □ ';}

        $html  = $html .' 일반 폭행  '; 

$html = $html . ' </td>
        </tr>
        <tr>
            <th bgcolor="#D9EDF7" align="center" width="25%"><strong>② 피고소인과의 관계</strong></th>
            <td width="75%" align="center" style="lineheight: 2em;">'.$_POST['DRelationship'].'</td>
        </tr>
        <tr>
            <th bgcolor="#D9EDF7" align="center" width="25%"><strong>③ 피해를 당한 날짜</strong></th>
            <td width="75%"align="center"  style="lineheight: 2em;">'.$_POST['AccidentDate'].'</td>
        </tr>
    </tbody>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, ''); 

// ---------------------------------------------------------





// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('간이고소장_폭행_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


