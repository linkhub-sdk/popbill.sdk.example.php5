<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 1건의 세금계산서 상태/요약 정보를 확인합니다.
  * - 세금계산서 상태정보(GetInfo API) 응답항목에 대한 자세한 정보는
  *   "[전자세금계산서 API 연동매뉴얼] > 4.2. (세금)계산서 상태정보 구성" 을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, ENumMgtKeyType::SELL:매출, ENumMgtKeyType::BUY:매입, ENumMgtKeyType::TRUSTEE:위수탁
  $mgtKeyType = ENumMgtKeyType::SELL;

  // 조회할 세금계산서 문서관리번호
	$mgtKey = '20170302-04';

	try {
		$result = $TaxinvoiceService->GetInfo($testCorpNum, $mgtKeyType, $mgtKey);
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
				<legend>세금계산서 상태 및 요약 정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
					?>
							<li>itemKey : <?= $result->itemKey ?></li>
							<li>stateCode : <?= $result->stateCode ?></li>
							<li>taxType : <?= $result->taxType ?></li>
							<li>purposeType : <?= $result->purposeType ?></li>
							<li>modifyCode : <?= $result->modifyCode ?></li>
							<li>issueType : <?= $result->issueType ?></li>
							<li>lateIssueYN : <?= $result->lateIssueYN ?></li>
							<li>writeDate : <?= $result->writeDate ?></li>
							<li>invoicerCorpName : <?= $result->invoicerCorpName ?></li>
							<li>invoicerCorpNum : <?= $result->invoicerCorpNum ?></li>
							<li>invoicerMgtKey : <?= $result->invoicerMgtKey ?></li>
							<li>invoicerPrintYN : <?= $result->invoicerPrintYN ?></li>
							<li>invoiceeCorpName : <?= $result->invoiceeCorpName ?></li>
							<li>invoiceeCorpNum : <?= $result->invoiceeCorpNum ?></li>
							<li>invoiceeMgtKey : <?= $result->invoiceeMgtKey ?></li>
							<li>invoiceePrintYN : <?= $result->invoiceePrintYN ?></li>
              <li>closeDownState : <?= $result->closeDownState ?></li>
              <li>closeDownStateDate : <?= $result->closeDownStateDate ?></li>
              <li>invoiceePrintYN : <?= $result->invoiceePrintYN ?></li>
              <li>supplyCostTotal : <?= $result->supplyCostTotal ?></li>
							<li>taxTotal : <?= $result->taxTotal ?></li>
							<li>issueDT : <?= $result->issueDT ?></li>
							<li>preIssueDT : <?= $result->preIssueDT ?></li>
							<li>stateDT : <?= $result->stateDT ?></li>
							<li>openYN : <?= $result->openYN ?></li>
							<li>openDT : <?= $result->openDT ?></li>
							<li>ntsresult : <?= $result->ntsresult ?></li>
							<li>ntsconfirmNum : <?= $result->ntsconfirmNum ?></li>
							<li>ntssendDT : <?= $result->ntssendDT ?></li>
							<li>ntsresultDT : <?= $result->ntsresultDT ?></li>
							<li>ntssendErrCode : <?= $result->ntssendErrCode ?></li>
							<li>stateMemo : <?= $result->stateMemo ?></li>
					<?
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
