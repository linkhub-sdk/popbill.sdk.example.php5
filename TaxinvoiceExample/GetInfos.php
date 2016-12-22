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
								<li>itemKey : <?= $result[$i]->itemKey ?></li>
								<li>stateCode : <?= $result[$i]->stateCode ?></li>
								<li>taxType : <?= $result[$i]->taxType ?></li>
								<li>purposeType : <?= $result[$i]->purposeType ?></li>
								<li>modifyCode : <?= $result[$i]->modifyCode ?></li>
								<li>issueType : <?= $result[$i]->issueType ?></li>
								<li>lateIssueYN : <?= $result[$i]->lateIssueYN ?></li>
								<li>writeDate : <?= $result[$i]->writeDate ?></li>
								<li>invoicerCorpName : <?= $result[$i]->invoicerCorpName ?></li>
								<li>invoicerCorpNum : <?= $result[$i]->invoicerCorpNum ?></li>
								<li>invoicerMgtKey : <?= $result[$i]->invoicerMgtKey ?></li>
								<li>invoicerPrintYN : <?= $result[$i]->invoicerMgtKey ?></li>
								<li>invoiceeCorpName : <?= $result[$i]->invoiceeCorpName ?></li>
								<li>invoiceeCorpNum : <?= $result[$i]->invoiceeCorpNum ?></li>
								<li>invoiceeMgtKey : <?= $result[$i]->invoiceeMgtKey ?></li>
								<li>invoiceePrintYN : <?= $result[$i]->invoiceeMgtKey ?></li>
                <li>closeDownState : <?= $result[$i]->closeDownState ?></li>
                <li>closeDownStateDate : <?= $result[$i]->closeDownStateDate ?></li>

								<li>trusteeCorpName : <?= $result[$i]->trusteeCorpName ?></li>
								<li>trusteeCorpNum : <?= $result[$i]->trusteeCorpNum ?></li>
								<li>trusteeMgtKey : <?= $result[$i]->trusteeMgtKey ?></li>
								<li>trusteePrintYN : <?= $result[$i]->trusteePrintYN ?></li>
								<li>supplyCostTotal : <?= $result[$i]->supplyCostTotal ?></li>
								<li>taxTotal : <?= $result[$i]->taxTotal ?></li>
								<li>issueDT : <?= $result[$i]->issueDT ?></li>
								<li>preIssueDT : <?= $result[$i]->preIssueDT ?></li>
								<li>stateDT : <?= $result[$i]->stateDT ?></li>
								<li>openYN : <?= $result[$i]->openYN ?></li>
								<li>openDT : <?= $result[$i]->openDT ?></li>
								<li>ntsresult : <?= $result[$i]->ntsresult ?></li>
								<li>ntsconfirmNum : <?= $result[$i]->ntsconfirmNum ?></li>
								<li>ntssendDT : <?= $result[$i]->ntssendDT ?></li>
								<li>ntsresultDT : <?= $result[$i]->ntsresultDT ?></li>
								<li>ntssendErrCode : <?= $result[$i]->ntssendErrCode ?></li>
								<li>stateMemo : <?= $result[$i]->stateMemo ?></li>
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
