<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 1건의 현금영수증 상태/요약 정보를 확인합니다.
  * - 응답항목에 대한 자세한 정보는 "[현금영수증 API 연동매뉴얼] > 4.2.
  *   현금영수증 상태정보 구성"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호
	$testCorpNum = '1234567890';

  // 문서관리번호
	$mgtKey = '20161107-02';

	try {
		$result = $CashbillService->GetInfo($testCorpNum, $mgtKey);
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
				<legend>현금영수증 요약/상태정보 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
							{
					?>
								<li> itemKey : <?= $result->itemKey ?></li>
								<li> mgtKey : <?= $result->mgtKey ?></li>
								<li> tradeDate : <?= $result->tradeDate ?></li>
								<li> issueDT : <?= $result->issueDT ?></li>
								<li> customerName : <?= $result->customerName ?></li>
								<li> itemName : <?= $result->itemName ?></li>
								<li> identityNum : <?= $result->identityNum ?></li>
								<li> taxationType : <?= $result->taxationType ?></li>
								<li> totalAmount : <?= $result->totalAmount ?></li>
								<li> tradeUsage : <?= $result->tradeUsage ?></li>
								<li> tradeType : <?= $result->tradeType ?></li>
								<li> stateCode : <?= $result->stateCode ?></li>
								<li> stateDT : <?= $result->stateDT ?></li>
								<li> printYN : <?= $result->printYN ?></li>
								<li> confirmNum : <?= $result->confirmNum ?></li>
								<li> orgTradeDate : <?= $result->orgTradeDate ?></li>
								<li> orgConfirmNum : <?= $result->orgConfirmNum ?></li>
								<li> ntssendDT : <?= $result->ntssendDT ?></li>
								<li> ntsresult : <?= $result->ntsresult ?></li>
								<li> ntsresultDT : <?= $result->ntsresultDT ?></li>
								<li> ntsresultCode : <?= $result->ntsresultCode ?></li>
								<li> ntsresultMessage : <?= $result->ntsresultMessage ?></li>
								<li> regDT : <?= $result->regDT ?></li>
					<?
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
