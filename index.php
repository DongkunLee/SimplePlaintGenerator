<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
?>

<html lang="ko">
<head>
    <meta name="viewport" content="width=500, initial-scale=1.0">
    <meta content-type = "text/html; charset=utf-8" >
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="public">
    <link rel="stylesheet" href="css/ecfsformstyle.css" />


    <title>간이고소장(폭행 등) </title>
</head>

<body>
<script src = "js/goso-assault.js"  ></script>
<h1>
        <strong>간이고소장(폭행 등)</strong>
</h1>


<section class="ecfsSection">

<form action="/ecfs/goso_assault.php" method="post" enctype="multipart/form-data">

<!-- 고소인 인적사항 -->
<h2> 1. 고소인  인적사항  </h2>
<div class="board-write-box">
    <div class="row">
        <label for="name"  class="label" >이름</label>
        <input type="text" name="name" id="name" value="" placeholder="이름을 입력하세요" class="inputbox" autocomplete="given-name" />
    </div>
    <div class="row">
        <label for="phone" class="label">전화번호</label>
        <input type="text" name="phone" id="phone" value="" placeholder="010-1111-2222" class="inputbox" autocomplete="tel"  />
    </div>
    <div class="row"> 
        <label for="jumin" class="label">주민등록번호</label>
        <input type="text" name="jumin" id="jumin" value="" placeholder="910101-1234567" class="inputbox" />       
    </div> 
    <div class="row"> 
        <label for="gosoin_postcode" class="label">주소</label>
        <div class="addrRow" >
            <div class="Itemrow">
                <input type="text" id="gosoin_postcode" name="gosoin_postcode" placeholder="우편번호" class="addrInputBox" value="">
                <input type="button" onclick="gosoin_execDaumPostcode()" value="우편번호 찾기">
            </div>
            <input type="text" id="gosoin_address" name="gosoin_address" placeholder="주소" class="addrInputBox" value="">
            <div class="Itemrow">
                <input type="text" id="gosoin_detailAddress" name="gosoin_detailAddress" placeholder="상세주소" class="addrInputBox" value="">
                <input type="text" id="gosoin_extraAddress" name="gosoin_extraAddress" placeholder="참고항목" class="addrInputBox" value="">
            </div>

        </div>
        <!-- <input type="text" name="addr" id="addr" value="" class="inputbox" autocomplete="street-address">          -->
    </div> 
    <br />
    <div class="row">
        <label for="bydelegate" class="label">대리인에 의한 고소</label>
        <input type="checkbox" name="bydelegate" id="bydelegate" value="bydelegate" class="checkbox" />
    </div> 
</div>  <!-- 고소인 인적사항 끝 -->

<div class="panel" id="delegatePanel">
    <div> <h3> 대리인에 의한 고소 </h3> </div>
    <div class="row">
        <label for="delegateName" class="label">대리인 성명</label>
        <input type="text" name="delegateName" id="delegateName" value="" placeholder="법무법인 김장김치" class="inputbox">       
    </div> 
    <div class="row">    
        <label for="delegateRelationship" class="label">고소인과의 관계</label>
        <input type="text" name="delegateRelationship" id="delegateRelationship" value="" placeholder="변호사 선임관계" class="inputbox">
    </div>
    <div class="row">
        <label for="delegateCellPhone" class="label">대리인 휴대전화</label>
        <input type="text" name="delegateCellPhone" id="delegateCellPhone" value="" placeholder="010-2222-3333" class="inputbox">       
    </div>
    <div class="row"> 
        <label for="delegateOfficePhone" class="label">대리인 사무실 전화</label>
        <input type="text" name="delegateOfficePhone" id="delegateOfficePhone" value="" placeholder="02-3333-4444" class="inputbox">
    </div>
    <div class="row"> 
        <label for="delegate_postcode" class="label">대리인 주소</label>
        <div class="addrRow" >
            <div class="Itemrow">
                <input type="text" id="delegate_postcode" name="delegate_postcode" placeholder="우편번호" class="addrInputBox">
                <input type="button" onclick="delegate_execDaumPostcode()" value="우편번호 찾기">
            </div>
            <input type="text" id="delegate_address" name="delegate_address" placeholder="주소" class="addrInputBox">
            <div class="Itemrow">
                <input type="text" id="delegate_detailAddress" name="delegate_detailAddress" placeholder="상세주소" class="addrInputBox">
                <input type="text" id="delegate_extraAddress" name="delegate_extraAddress" placeholder="참고항목" class="addrInputBox">
            </div>

        </div>  
    </div> 
</div>


<!-- 피고소인 인적사항 -->
<h2> 2. 피고소인  인적사항  </h2>
<div class="board-write-box">
    <div class="row">
        <label for="Dname"  class="label" >이름</label>
        <input type="text" name="Dname" id="Dname" value="" placeholder="이름을 입력하세요" class="inputbox" />
    </div>
    <div class="row">
        <label for="Dphone" class="label">전화번호</label>
        <input type="text" name="Dphone" id="Dphone" value="" placeholder="010-1111-2222" class="inputbox" />
    </div>
    <div class="row"> 
        <label for="Djumin" class="label">주민등록번호</label>
        <input type="text" name="Djumin" id="Djumin" value="" placeholder="910101-1234567" class="inputbox" />       
    </div> 
    <div class="row"> 
        <label for="defender_postcoder" class="label">주소</label>
        <div class="addrRow" >
            <div class="Itemrow">
                <input type="text" id="defender_postcode" name="defender_postcode" placeholder="우편번호" class="addrInputBox">
                <input type="button" onclick="defender_execDaumPostcode()" value="우편번호 찾기">
            </div>
            <input type="text" id="defender_address" name="defender_address" placeholder="주소" class="addrInputBox">
            <div class="Itemrow">
                <input type="text" id="defender_detailAddress" name="defender_detailAddress" placeholder="상세주소" class="addrInputBox">
                <input type="text" id="defender_extraAddress" name="defender_extraAddress" placeholder="참고항목" class="addrInputBox">
            </div>

        </div>      
    </div> 
</div>

<!-- 피고소인 인적사항 끝-->

<!-- 고소요지 -->
<h2> 3. 고소요지 <span> 피해 사실이 여러번인 경우 별지를 활용해 주세요 </span>  </h2>
<div class="board-content">
    <div class="row">
        <label for="assaultKind"  class="label" >폭행 종류</label>
        <fieldset>
            <legend>폭행 종류  </legend>
            <input type="checkbox" id="chkFamily" name="chkFamily" value="가정폭력" />
            <label for="chkFamily">가정폭력</label>
            <input type="checkbox" id="chkDate" name="chkDate" value="교제폭력(데이트폭력)" />
            <label for="chkDate">교제폭력(데이트폭력)</label>
            <input type="checkbox" id="chkYoung" name="chkYoung" value="아동폭행" />
            <label for="chkYoung">아동폭행</label>
            <input type="checkbox" id="chkSchool" name="chkSchool" value="학교폭력" />
            <label for="chkSchool">학교폭력</label>
            <input type="checkbox" id="chkOld" name="chkOld" value="노인폭행" />
            <label for="chkOld">노인폭행</label>
            <input type="checkbox" id="chkMedical" name="chkMedical" value="의료인폭행" />
            <label for="chkMedical">의료인폭행</label>
            <input type="checkbox" id="chkAirplane" name="chkAirplane" value="항공기 내 폭행" />
            <label for="chkAirplane">항공기 내 폭행</label>
            <input type="checkbox" id="chkDriver" name="chkDriver" value="운전자 폭행" />
            <label for="chkDriver">운전자 폭행</label>
            <input type="checkbox" id="chkAssault" name="chkAssault" value="일반 폭행" />
            <label for="chkAssault">일반 폭행</label>
        </fieldset>
    </div>
    <div class="row">
        <label for="DRelationship" class="label">피고소인과의 관계</label>
        <input type="text" name="DRelationship" id="DRelationship" value="" placeholder="배우자" class="inputbox" />
    </div>
    <div class="row"> 
        <label for="AccidentDate" class="label">피해를 당한 날짜</label>
        <input type="text" name="AccidentDate" id="AccidentDate" value="" placeholder="2024년 8월 9일" class="inputbox" />       
    </div> 
</div>
<!-- 고소요지 끝-->

<button type="submit" >계약서 만들기</button>


    </form>


</section>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</body>





</html>



