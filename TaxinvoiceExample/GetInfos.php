<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 대량의 세금계산서 상태/요약 정보를 확인합니다. (최대 1000건)
  * - 세금계산서 상태정보(GetInfos API) 응답항목에 대한 자세한 정보는 "[전자세금계산서 API 연동매뉴얼]
  * > 4.2. (세금)계산서 상태정보 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 세금계산서 문서관리번호 배열, 최대 1000건
	$MgtKeyList = array();
  array_push($MgtKeyList, "20161221-03");
  array_push($MgtKeyList, '20161102-03');
  array_push($MgtKeyList, '20161102-04');

	try {
		$result = $TaxinvoiceService->GetInfos($testCorpNum, $mgtKeyType, $MgtKeyList);
	}
	catch(PopbillException $pe) {
		$code= $pe->getCode();
		$message= $pe->getMessage();
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 요약정보 대량 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
						<li>Response.code : <?= $code ?> </li>
						<li>Response.message : <?= $message ?></li>
					<?
						} else {
							for ( $i = 0; $i < Count($result) ; $i++ ) {
					?>
							<fieldset class="fieldset2">
							<legend> 세금계산서 요약정보[<?= $i+1?>]</legend>
							<ul>
                <li>itemKey (팝빌 관리번호) : <?= $result[$i]->itemKey ?></li>
                <li>stateCode (상태코드) : <?= $result[$i]->stateCode ?></li>
                <li>taxType (과세형태) : <?= $result[$i]->taxType ?></li>
                <li>purposeType (영수/청구) : <?= $result[$i]->purposeType ?></li>
                <li>modifyCode (수정 사유코드) : <?= $result[$i]->modifyCode ?></li>
                <li>issueType (발행형태) : <?= $result[$i]->issueType ?></li>
                <li>lateIssueYN (지연발행 여부) : <?= $result[$i]->lateIssueYN ? 'true' : 'false' ?></li>
                <li>interOPYN (연동문서 여부) : <?= $result[$i]->interOPYN ? 'true' : 'false' ?></li>
                <li>writeDate (작성일자) : <?= $result[$i]->writeDate ?></li>

                <li>invoicerCorpName (공급자 상호) : <?= $result[$i]->invoicerCorpName ?></li>
                <li>invoicerCorpNum (공급자 사업자번호) : <?= $result[$i]->invoicerCorpNum ?></li>
                <li>invoicerMgtKey (공급자 문서관리번호) : <?= $result[$i]->invoicerMgtKey ?></li>
                <li>invoicerPrintYN (공급자 인쇄여부) : <?= $result[$i]->invoicerPrintYN ? 'true' : 'false' ?></li>

                <li>invoiceeCorpName (공급받는자 상호) : <?= $result[$i]->invoiceeCorpName ?></li>
                <li>invoiceeCorpNum (공급받는자 사업자번호) : <?= $result[$i]->invoiceeCorpNum ?></li>
                <li>invoiceeMgtKey (공급받는자 관리번호) : <?= $result[$i]->invoiceeMgtKey ?></li>
                <li>invoiceePrintYN (공급받는자 인쇄여부) : <?= $result[$i]->invoiceePrintYN ? 'true' : 'false' ?></li>
                <li>closeDownState (공급받는자 휴폐업상태) : <?= $result[$i]->closeDownState ?></li>
                <li>closeDownStateDate (공급받는자 휴폐업일자) : <?= $result[$i]->closeDownStateDate ?></li>

                <li>supplyCostTotal (공급가액 합계): <?= $result[$i]->supplyCostTotal ?></li>
                <li>taxTotal (세액 합계) : <?= $result[$i]->taxTotal ?></li>
                <li>issueDT (발행일시) : <?= $result[$i]->issueDT ?></li>
                <li>preIssueDT (발행예정일시) : <?= $result[$i]->preIssueDT ?></li>
                <li>stateDT (상태변경일시) : <?= $result[$i]->stateDT ?></li>
                <li>openYN (개봉 여부) : <?= $result[$i]->openYN ? 'true' : 'false' ?></li>
                <li>openDT (개봉 일시) : <?= $result[$i]->openDT ?></li>
                <li>ntsresult (국세청 전송결과) : <?= $result[$i]->ntsresult ?></li>
                <li>ntsconfirmNum (국세청승인번호) : <?= $result[$i]->ntsconfirmNum ?></li>
                <li>ntssendDT (국세청 전송일시) : <?= $result[$i]->ntssendDT ?></li>
                <li>ntsresultDT (국세청 결과 수신일시) : <?= $result[$i]->ntsresultDT ?></li>
                <li>ntssendErrCode (전송실패 사유코드) : <?= $result[$i]->ntssendErrCode ?></li>
                <li>stateMemo (상태메모) : <?= $result[$i]->stateMemo ?></li>
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
