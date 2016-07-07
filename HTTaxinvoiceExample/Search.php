<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
  $testCorpNum = '4108600477';

  // 팝빌회원 아이디
  $testUserID = 'innoposttest';

  // 수집 요청(RequestJob) 호출시 반환받은 작업아이디
  $JobID = '016070715000000001';

  // 문서형태 배열, N-일반세금계산서, M-수정세금계산서
  $Type = array (
    'N',
    'M'
  );

  // 과세형태 배열, T-과세, N-면세, Z-영세
  $TaxType = array (
    'T',
    'N',
    'Z'
  );

  // 영수/청구 배열, R-영수, C-청구, N-없음
  $PurposeType = array (
    'R',
    'C',
    'N'
  );

  // 종사업장 유무, 공백-전체조회, 0-종사업장 없는 건만 조회, 1-종사업장번호 조건에 따라 조회
  $TaxRegIDYN = "";

  // 종사업장번호 유형, 공백-전체, S-공급자, B-공급받는자, T-수탁자
  $TaxRegIDType = "";

  // 종사업장번호, 콤마(",")로 구분하여 구성 ex) "1234,0001";
  $TaxRegID = "";

  // 페이지 번호
  $Page = 1;

  // 페이지당 목록개수
  $PerPage = 10;

  // 정렬방향, D-내림차순, A-오름차순
  $Order = "D";

	try {
		$response = $HTTaxinvoiceService->Search ( $testCorpNum, $JobID, $Type, $TaxType, $PurposeType, $TaxRegIDYN, $TaxRegIDType, $TaxRegID, $Page, $PerPage, $Order, $testUserID );
	}
	catch(PopbillException $pe) {
    $code = $pe->getCode();
		$message = $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>수집 결과 조회</legend>
				<ul>
					<?
						if ( isset ( $code ) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
						  <li>code (응답코드) : <?= $response->code ?></li>
              <li>message (응답메시지) : <?= $response->message ?></li>
              <li>total (총 검색결고 건수) : <?= $response->total ?></li>
              <li>perPage (페이지당 검색개수) : <?= $response->perPage ?></li>
              <li>pageNum (페이지 번호) : <?= $response->pageNum ?></li>
              <li>pageCount (페이지 개수) : <?= $response->pageCount ?></li>

          <?
              for ( $i = 0; $i < Count ( $response->list ); $i++ )
              {
          ?>
            <fieldset class="fieldset2">
              <legend> 전자(세금)계산서 정보 [<? echo $i+1?>]</legend>
              <ul>
                <li>ntsconfirmNum (국세청승인번호) : <?= $response->list[$i]->ntsconfirmNum ; ?></li>
                <li>writeDate (작성일자) : <?= $response->list[$i]->writeDate ; ?></li>
                <li>issueDate (발행일자) : <?= $response->list[$i]->issueDate ; ?></li>
                <li>sendDate (전송일자) : <?= $response->list[$i]->sendDate ; ?></li>
                <li>taxType (과세형태) : <?= $response->list[$i]->taxType ; ?></li>
                <li>purposeType (영수/청구) : <?= $response->list[$i]->purposeType ; ?></li>
                <li>supplyCostTotal (공급가액 합계) : <?= $response->list[$i]->supplyCostTotal ; ?></li>
                <li>taxTotal (세액 합계) : <?= $response->list[$i]->taxTotal ; ?></li>
                <li>totalAmount (합계금액) : <?= $response->list[$i]->totalAmount ; ?></li>
                <li>remark1 (비고) : <?= $response->list[$i]->remark1 ; ?></li>

                <li>invoicerCorpNum (공급자 사업자번호) : <?= $response->list[$i]->invoicerCorpNum ; ?></li>
                <li>invoicerTaxRegID (공급자 종사업장번호) : <?= $response->list[$i]->invoicerTaxRegID ; ?></li>
                <li>invoicerCorpName (공급자 상호) : <?= $response->list[$i]->invoicerCorpName ; ?></li>
                <li>invoicerCEOName (공급자 대표자성명) : <?= $response->list[$i]->invoicerCEOName ; ?></li>
                <li>invoicerEmail (공급자 담당자 이메일) : <?= $response->list[$i]->invoicerEmail ; ?></li>

                <li>invoiceeCorpNum (공급받는자 사업자번호) : <?= $response->list[$i]->invoiceeCorpNum ; ?></li>
                <li>invoiceeType (공급받는자 구분) : <?= $response->list[$i]->invoiceeType ; ?></li>
                <li>invoiceeTaxRegID (공급받는자 종사업장번호) : <?= $response->list[$i]->invoiceeTaxRegID ; ?></li>
                <li>invoiceeCorpName (공급받는자 상호) : <?= $response->list[$i]->invoiceeCorpName ; ?></li>
                <li>invoiceeCEOName (공급받는자 대표자 성명) : <?= $response->list[$i]->invoiceeCEOName ; ?></li>
                <li>invoiceeEmail1 (공급받는자 담당자 이메일) : <?= $response->list[$i]->invoiceeEmail1 ; ?></li>
                <li>invoiceeEmail2 (공급받는자 ASP 연계사업자 이메일) : <?= $response->list[$i]->invoiceeEmail2 ; ?></li>

                <li>trusteeCorpNum (수탁자 사업자번호) : <?= $response->list[$i]->trusteeCorpNum ; ?></li>
                <li>tursteeTaxRegID (수탁자 종사업장번호) : <?= $response->list[$i]->trusteeTaxRegID ; ?></li>
                <li>tursteeCorpName (수탁자 상호) : <?= $response->list[$i]->trusteeCorpName ; ?></li>
                <li>trusteeCEOName (수탁자 대표자 성명) : <?= $response->list[$i]->trusteeCEOName ; ?></li>
                <li>trusteeEmail (수탁자 담당자 이메일) : <?= $response->list[$i]->trusteeEmail ; ?></li>

                <li>purchaseDate (거래일자) : <?= $response->list[$i]->purchaseDate ?></li>
                <li>itemName (품명) : <?= $response->list[$i]->itemName ?></li>
                <li>spec (규격) : <?= $response->list[$i]->spec ?></li>
                <li>qty (수량) : <?= $response->list[$i]->qty ?></li>
                <li>unitCost (단가) : <?= $response->list[$i]->unitCost ; ?></li>
                <li>supplyCost (공급가액) : <?= $response->list[$i]->supplyCost ; ?></li>
                <li>tax (세액) : <?= $response->list[$i]->tax ; ?></li>
                <li>remark (비고) : <?= $response->list[$i]->remark ; ?></li>

                <li>modifyYN (수정 전자세금계산서 여부) : <?= $response->list[$i]->modifyYN  ? 'true' : 'false' ?></li>
                <li>orgNTSConfirmNum (원본 전자세금계산서 국세청승인번호) : <?= $response->list[$i]->orgNTSConfirmNum ; ?></li>

              </ul>
            </fieldset>
					<?
              }
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
