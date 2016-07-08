<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
	include 'common.php';

  # 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  #국세청 승인번호
  $NTSConfirmNum = '201607074100002900000604';

  # 팝빌회원 아이디
	$testUserID = 'testkorea';

	try {
		$result = $HTTaxinvoiceService->GetTaxinvoice ( $testCorpNum, $NTSConfirmNum, $testUserID ) ;
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
				<legend>상세정보 확인</legend>
				<ul>
					<?
						if(isset($code)) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
            <li>ntsconfirmNum (국세청승인번호) : <?= $result->ntsconfirmNum ?></li>
						<li>writeDate (작성일자) : <?= $result->writeDate ?></li>
            <li>issueDT (발행일시) : <?= $result->issueDT ?></li>
            <li>invoiceType (전자세금계산서 종류) : <?= $result->invoiceType ?></li>
            <li>taxType (과세형태) : <?= $result->taxType ?></li>
            <li>taxTotal (세액 합계) : <?= $result->taxTotal ?></li>
            <li>supplyCostTotal (공급가액 합계) : <?= $result->supplyCostTotal ?></li>
            <li>totalAmount (합계금액) : <?= $result->totalAmount ?></li>
            <li>purposeType (영수/청구) : <?= $result->purposeType ?></li>
            <li>serialNum (일련번호) : <?= $result->serialNum ?></li>
            <li>cash (현금) : <?= $result->cash ?></li>
            <li>chkBill (수표) : <?= $result->chkBill ?></li>
            <li>credit (외상) : <?= $result->credit ?></li>
            <li>note (어음) : <?= $result->note ?></li>
            <li>remark1 (비고1) : <?= $result->remark1 ?></li>
            <li>remark2 (비고2) : <?= $result->remark2 ?></li>
            <li>remark3 (비고3) : <?= $result->remark3 ?></li>
            <li>modifyCode (수정 사유코드) : <?= $result->modifyCode ?></li>
            <li>orgNTSConfirmNum (원본 전자세금계산서 국세청 승인번호) : <?= $result->orgNTSConfirmNum ?></li>
            <li>invoicerCorpNum (공급자 사업자번호) : <?= $result->invoicerCorpNum ?></li>
            <li>invoicerTaxRegID (공급자 종사업장번호) : <?= $result->invoicerTaxRegID ?></li>
            <li>invoicerCorpName (공급자 상호) : <?= $result->invoicerCorpName ?></li>
            <li>invoicerCEOName (공급자 대표자성명) : <?= $result->invoicerCEOName ?></li>
            <li>invoicerAddr (공급자 주소) : <?= $result->invoicerAddr ?></li>
            <li>invoicerBizType (공급자 업태) : <?= $result->invoicerBizType ?></li>
            <li>invoicerBizClass (공급자 종목) : <?= $result->invoicerBizClass ?></li>
            <li>invoicerContactName (공급자 담당자 성명) : <?= $result->invoicerContactName ?></li>
            <li>invoicerTEL (공급자 담당자 연락처) : <?= $result->invoicerTEL ?></li>
            <li>invoicerEmail (공급자 담당자 이메일) : <?= $result->invoicerEmail ?></li>
            <li>invoiceeCorpNum (공급받는자 사업자번호) : <?= $result->invoiceeCorpNum ?></li>
            <li>invoiceeType (공급받는자 구분) : <?= $result->invoiceeCorpNum ?></li>
            <li>invoiceeTaxRegID (공급받는자 종사업장번호) : <?= $result->invoiceeCorpNum ?></li>
            <li>invoiceeCorpName (공급바든ㄴ자 상호) : <?= $result->invoiceeCorpNum ?></li>
            <li>invoiceeCEOName (공급받는자 대표자 성명) : <?= $result->invoiceeCEOName ?></li>
            <li>invoiceeAddr (공급받는자 주소) : <?= $result->invoiceeAddr ?></li>
            <li>invoiceeBizType (공급받는자 업태) : <?= $result->invoiceeBizType ?></li>
            <li>invoiceeBizClass (공급받는자 종목) : <?= $result->invoiceeBizClass ?></li>
            <li>invoiceeContactName1 (공급받는자 담당자 성명) : <?= $result->invoiceeContactName1 ?></li>
            <li>invoiceeTEL1 (공급받는자 담당자 연락처) : <?= $result->invoiceeTEL1 ?></li>
            <li>invoiceeEmail1 (공급받는자 담당자 이메일) : <?= $result->invoiceeEmail1 ?></li>
            <li>trusteeCorpNum (수탁자 사업자번호) : <?= $result->trusteeCorpNum ?></li>
            <li>trusteeTaxRegID (수탁자 종사업장번호) : <?= $result->trusteeTaxRegID ?></li>
            <li>trusteeCorpName (수탁자 상호) : <?= $result->trusteeCorpName ?></li>
            <li>trusteeCEOName (수탁자 대표자성명) : <?= $result->trusteeCEOName ?></li>
            <li>trusteeAddr (수탁자 주소) : <?= $result->trusteeAddr ?></li>
            <li>trusteeBizType (수탁자 업태) : <?= $result->trusteeBizType ?></li>
            <li>trusteeBizClass (수탁자 종목) : <?= $result->trusteeBizClass ?></li>
            <li>trusteeContactName (수탁자 담당자 성명) : <?= $result->trusteeContactName ?></li>
            <li>trusteeTEL (수탁자 담당자 연락처) : <?= $result->trusteeTEL ?></li>
            <li>trusteeEmail (수탁자 담당자 이메일) : <?= $result->trusteeEmail ?></li>
          <?
            for ( $i = 0; $i < Count($result->detailList); $i++ ){
          ?>
          <fieldset class="fieldset2">
            <legend> detailList[<?= $i+1 ?>] </legend>
            <ul>
              <li> serialNum (일련번호) : <?= $result->detailList[$i]->serialNum ?> </li>
              <li> purchaseDT (거래일자) : <?= $result->detailList[$i]->purchaseDT ?> </li>
              <li> itemName (품명) : <?= $result->detailList[$i]->itemName ?> </li>
              <li> spec (규격) : <?= $result->detailList[$i]->spec ?> </li>
              <li> qty (수량) : <?= $result->detailList[$i]->qty ?> </li>
              <li> unitCost (단가) : <?= $result->detailList[$i]->unitCost ?> </li>
              <li> supplyCost (공급가액) : <?= $result->detailList[$i]->supplyCost ?> </li>
              <li> tax (세액) : <?= $result->detailList[$i]->tax ?> </li>
              <li> remark (비고) : <?= $result->detailList[$i]->remark ?> </li>
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
