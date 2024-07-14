<?php
/**
 *  PDF 만들기
*/

    include_once('_common.php');  

   $name =  $_POST['name'];
   $houseAddr =  $_POST['houseAddr'];
   $housePrice = $_POST['housePrice'];
   $houseSize = $_POST['houseSize'];
   $houseDaeji = $_POST['houseDaeji'];
   $seller = $_POST['seller'];
   $buyer = $_POST['buyer']; 
   $contractDate = $_POST['contractDate'];
   $supposedDate = $_POST['supposedDate'];
   $bigo = $_POST['bigo'];
   $regNum = $_POST['regNum'];
   $offlinePrice = $_POST['offlinePrice'];
   $irosPrice = $_POST['irosPrice'];
   $teukyak = $_POST['teukyak'];
   $irosContractDate = $_POST['irosContractDate'];
   $buyerAddr = $_POST['buyerAddr'];
   $buyerPhone = $_POST['buyerPhone'];
   $buyerSocialNumber = $_POST['buyerSocialNumber'];
   $suimJuso = $_POST['suimJuso'];
   $suimBizNum = $_POST['suimBizNum'];
   $suimBizPhone = $_POST['suimBizPhone'];
   $suimName = $_POST['suimName'];
   $nongeochon = $_POST['nongeochon'];
   $totalAcquire = $_POST['totalAcquire'];
   $acquireTax = $_POST['acquireTax'];
   $regionTax = $_POST['regionTax'];
   $suipinji = $_POST['suipinji'];
   $suipjeunjii = $_POST['suipjeungji'];
   $gonggwageum = $_POST['gonggwageum'];


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('WooamLaw : Dongkun Lee');
    $pdf->SetTitle('Registration Contract');
    $pdf->SetSubject('부동산 전자등기 계약');
    $pdf->SetKeywords('전자등기, 등기예약, LH분양'); 

    // set header and footer fonts
    $pdf->setHeaderFont(Array('nanumbarungothicyethangul', '', 10));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default header data
    $pdf->SetHeaderData("", '',  "법무법인 우암", "031-863-3388  양주시 평화로 1395 나라빌딩 9층(덕계동)");



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

    // Set font
    $pdf->SetFont('nanumbarungothicyethangul', '', 12, '', true);


    // Add a page
    $pdf->AddPage();

    // Set some content to print
    $html = '<h1 align="center"> 부동산 전자등기 위임계약 </h1> 
    <h3 class="sub-title">  1. 부동산의 표시    <small>     다음 부동산에 대하여 부동산 전자등기 위임 계약을 체결합니다.  </small> </h3> </div>';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

   // 테이블 
    $html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
       <tbody>
            <tr>
                <th bgcolor="#D9EDF7" align="center"><strong>주택의 표시(주소)</strong> </th>
                <td colspan="4" align="center">'.$houseAddr.'</td>
            </tr>
            <tr>
                <th bgcolor="#D9EDF7" align="center"><strong>주택의 가격(원)</strong></th>
                <td colspan="4" align="center">'. number_format($housePrice). '원</td>

            </tr>
            <tr>
                <th bgcolor="#D9EDF7" align="center"><strong>주택면적</strong></th>
                <td bgcolor="#DAF7A6" align="center"><strong>계약면적(㎡)</strong></td>
                <td align="center">'.$houseSize.'</td>
                <td bgcolor="#DAF7A6" align="center"><strong>대지지분(㎡)</strong> </td>
                <td align="center">'.$houseDaeji .'</td>
            </tr>
            <tr>
                <th bgcolor="#D9EDF7" align="center"><strong>매도인(분양자)</strong></th>
                <td align="center" colspan="2">'.$seller.'</td>
                <td bgcolor="#D9EDF7" align="center"><strong>매수인</strong> </td>
                <td align="center">'.$buyer .'</td>
            </tr>
            <tr>
                <th bgcolor="#D9EDF7" align="center"><strong>계약일</strong></th>
                <td align="center" colspan="2">'. $contractDate .'</td>
                <td bgcolor="#D9EDF7" align="center"><strong>입주예정일</strong> </td>
                <td align="center">'.$supposedDate .'</td>
            </tr>
            <tr>
                <th bgcolor="#D9EDF7" align="center" valign="middle"><strong>비고</strong></th>
                <td align="center" valign="middle" colspan="2">'.$bigo.'</td>
                <td bgcolor="#D9EDF7" align="center" valign="middle"><strong>전자계약번호</strong> </td>
                <td align="center" valign="middle">'.$regNum .'</td>
            </tr>
        </tbody>
    </table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // 계약내용
    $html = '<h3>  2. 계약내용   </h3>
    <p> <strong>  제 1 조 【목적】 </strong> 위 부동산의 소유권 이전 등기 전자등기 업무에 관하여 위임인과 수임인은 위임계약을 체결한다.  </p>
    <p> <strong>  제 2 조 【보수】  </strong> 위임계약의 보수는 다음과 같다.   </p>';

    $pdf->writeHTML($html, true, false, true, false, '');


    // 위임계약의 보수 
    $html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
       <tbody>
            <tr width="100%">
                <th bgcolor="#D9EDF7" align="center" width="20%"><strong>오프라인 법무대리인금액</strong> </th>
                <td  align="center" color="red" width="20%"><strong><del>'. number_format($offlinePrice).'원</strong></del></td>
                <td width="60%">  (부가세 포함) </td>
            </tr>
            <tr width="100%">
                <th bgcolor="#D9EDF7" align="center"width="20%"><strong>전자등기 법무대리인금액</strong></th>
                <td  align="center" width="20%"><strong>'. number_format($irosPrice). '원</strong></td>
                <td width="60%">  (부가세 포함) </td>
            </tr>
            <tr width="100%">
            <th bgcolor="#D9EDF7" align="center" width="20%"><strong>기타비용</strong></th>
            <td  colspan="2" width="80%">
                가. 수임인에게 책임 없는 사유로 출장 혹은 초과 업무를 해야 할 경우에는 일당 및 교통비로 50,000원이 청구될 수 있다. 
                <p> 나. 위 금액은 순수 등기를 위한 법무대리인 비용이며, 부동산 매수인이 지급해야 하는 취득세 등 각종 제세금, 주택채권매입금액, 수입증지 등 관청에 제출해야 하는 등기 행정수수료는 위임인이 부담해야 한다.   </p>
                <p> 다. 담보권의 추가설정 등 가산비용이 발생할 경우에는 법무사 보수표에 의한다.  </p>
            </td>
        </tr>
        </tbody>
    </table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // 나머지 계약조항 
    $html = '<p> <strong>  제 3 조 【수권범위】 </strong> 위임인은 수임인에게 따로 작성하여 교부하는 위임장 또는 선임서에 적은 자격과 권한을 수여한다.  </p>
    <p> <strong>  제 4 조 【계약의 해제】  </strong> 위임인이 잔금을 지급하기 전까지는 수임인은 등기위임계약금액을 상환하고, 위임인은 등기위임금액을 포기하고 본 등기예약계약을 해제할 수 있다.   </p>
    <p> <strong>  제 5 조 【수임인의 의무】  </strong> 수임인은 변호사로서 법령에 정한 권리와 의무에 입각하여, 위임의 내용에 따라 선량한 관리자의 주의를 다하여 위임사무를 처리한다.    </p>
    <p> <strong>  제 6 조 【자료제공 등】  </strong> 수임인이 위임사무를 처리하는데 필요하다고 인정하여 요구한 자료 또는 조회한 사항에 대하여 위임인은 지체 없이 이에 응하여야 한다.     </p>
    <p> <strong>  제 7 조 【환불】  </strong> 수임인이 잔금을 받은 후 위임사무 처리를 위하여 연구, 조사, 서면작성을 하는 등 위임사무에 착수한 경우 위임인은 그 반환을 청구하지 못한다.      </p>
    <p> <strong>  제 8 조 【비용부담】  </strong> 수임인이 위임사무를 처리하는데 필요한 행정수수료 등 실비는 그 전액을 위임인이 부담한다.     </p>
    <p> <strong>  제 9 조 【인장조각】 </strong> 이 위임계약의 수행상 필요한 경우, 수임인은 당사자의 인장을 조각하여 사용할 수 있다. 단, 수임인은 사후에 인장조작 및 사용사실을 통지하여야 한다.    </p>
    <p> <strong> '. $teukyak. ' </strong> </p>
    <p align="center"> <strong>   [지급계좌 : 국민은행 289301-04-199560  법무법인 우암]   </strong>  </p>
    <h3 align="center"> '. $irosContractDate. ' </h3><br />';

    $pdf->writeHTML($html, true, false, true, false, '');


    // 계약당사자
    $html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
        <tbody>
             <tr width="100%">
                 <td bgcolor="#D9EDF7" align="center" rowspan="2" width="8%"><strong>위임인</strong> </td>
                 <td bgcolor="#DAF7A6" align="center" width="12%">계약자 주소</td>
                 <td colspan="5" width="65%">'.$buyerAddr .'</td>
                 <td rowspan="2" width="15%">  (인) </td>
             </tr>
             <tr width="100%">
                 <td bgcolor="#DAF7A6" align="center" width="12%"><strong>주민등록번호</strong></td>
                 <td  align="center" width="25%">'. $buyerSocialNumber. '</td>
                 <td bgcolor="#DAF7A6" align="center" width="8%"><strong>전화</strong></td>
                 <td  align="center" width="12%">'. $buyerPhone. '</td>
                 <td bgcolor="#DAF7A6" align="center" width="8%"><strong>이름</strong></td>
                 <td  align="center" width="12%">'. $name. '</td>
             </tr>
             <tr width="100%">
                 <td bgcolor="#D9EDF7" align="center" rowspan="2" width="8%"><strong>수임인</strong> </td>
                 <td  bgcolor="#DAF7A6" align="center" width="12%">주소</td>
                 <td colspan="5" width="65%">'.$suimJuso .'</td>
                 <td rowspan="2" width="15%">  <img src="../image/wooamstamp.png" alt="우암" width="60" height="60" />  </td>
             </tr>
             <tr width="100%">
                 <td bgcolor="#DAF7A6" align="center" width="12%"><strong>사업자등록번호</strong></td>
                 <td  align="center" width="25%">'. $suimBizNum. '</td>
                 <td bgcolor="#DAF7A6" align="center" width="8%"><strong>전화</strong></td>
                 <td  align="center" width="12%">'. $suimBizPhone. '</td>
                 <td bgcolor="#DAF7A6" align="center" width="8%"><strong>이름</strong></td>
                 <td  align="center" width="12%">'. $suimName. '</td>
             </tr>
         </tbody>
     </table>';
 
     $pdf->writeHTML($html, true, false, true, false, '');

     // 기타비용 
    $html = '<h3>  ※ 기타비용   </h3>
    <p> <strong>  예상 취득세, 공과금을 서비스 차원에서 정보제공한 것입니다. 실제와 다를 수 있습니다.</strong>  </p>';

    $pdf->writeHTML($html, true, false, true, false, '');

    $html = '<table border="1" cellspacing="1" cellpadding="1" style="border-collapse:collapse; border:1px gray solid;">
    <tbody>
         <tr width="100%">
             <td bgcolor="#D9EDF7" align="center" rowspan="2" width="18%"><strong>취득세</strong> </td>
             <td bgcolor="#DAF7A6" align="center" width="12%">취득세 합계</td>
             <td colspan="5" width="70%" align="center">'.number_format($totalAcquire, 0).'원</td>
         </tr>
         <tr width="100%">
             <td bgcolor="#DAF7A6" align="center" width="12%"><strong>취득세</strong></td>
             <td  align="center" width="25%">'.number_format($acquireTax, 0). '원</td>
             <td bgcolor="#DAF7A6" align="center" width="8%"><strong>지방교육세</strong></td>
             <td  align="center" width="12%">'.number_format($regionTax, 0). '원</td>
             <td bgcolor="#DAF7A6" align="center" width="8%"><strong>농어촌특별세</strong></td>
             <td  align="center" width="17%">'.number_format($nongeochon, 0). '원</td>
         </tr>
         <tr width="100%">
             <td bgcolor="#D9EDF7" align="center" rowspan="2" width="18%"><strong>공과금</strong> </td>
             <td  bgcolor="#DAF7A6" align="center" width="12%">공과금합계</td>
             <td colspan="5" width="70%" align="center">'.number_format($gonggwageum, 0).'원</td>
         </tr>
         <tr width="100%">
             <td bgcolor="#DAF7A6" align="center" width="12%"><strong>수입증지</strong></td>
             <td  align="center" width="25%">'.number_format($suipjeunjii, 0). '원</td>
             <td bgcolor="#DAF7A6" align="center" width="8%"><strong>수입인지</strong></td>
             <td  align="center" width="12%">'.number_format($suipinji, 0). '원</td>
             <td bgcolor="#DAF7A6" align="center" width="8%"><strong>기타</strong></td>
             <td  align="center" width="17%">  - </td>
         </tr>
         <tr width="100%">
         <td bgcolor="#D9EDF7" align="center" rowspan="2" width="18%"><strong>기타 법무대리인 소요비용</strong> </td>
         <td  bgcolor="#DAF7A6" align="center" width="12%">기타비용 합계</td>
         <td colspan="5" width="70%" align="center"> 약 7만원</td>
     </tr>
     <tr width="100%">
         <td bgcolor="#DAF7A6" align="center" width="12%"><strong>제증명비용</strong></td>
         <td  align="center" width="25%"> 2만원</td>
         <td bgcolor="#DAF7A6" align="center" width="8%"><strong>일당 및 교통비</strong></td>
         <td  align="center" width="12%"> 1일당 5만원</td>
         <td bgcolor="#DAF7A6" align="center" width="8%"><strong>유의사항</strong></td>
         <td  align="center" width="17%">  실제와 다를 수 있습니다. </td>
     </tr>
        </tbody>
    </table>';

 $pdf->writeHTML($html, true, false, true, false, '');
    
// Close and output PDF document
//$pdf->Output(getcwd().'/001.pdf', 'F'); // 실제 파일 생성됨
$pdf->Output('전자등기계약서_'.$name.'.pdf', 'I'); // 화면으로 보여줌

