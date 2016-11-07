<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 대량의 현금영수증 상태/요약 정보를 확인합니다. (최대 1000건)
  * - 응답항목에 대한 자세한 정보는 "[현금영수증 API 연동매뉴얼] > 4.2.
  *   현금영수증 상태정보 구성"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호
	$testCorpNum = '1234567890';

  // 문서관리번호 배열, 최대 1000건
	$MgtKeyList = array(
			'20150211-01',
			'20150211-02',
	);

	try {
		$result = $CashbillService->GetInfos($testCorpNum, $MgtKeyList);
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
				<legend>현금영수증 요약정보 대량 확인</legend>
				<ul>
					<?
						if ( isset($code) ) {
					?>
							<li>Response.code : <?= $code ?> </li>
							<li>Response.message : <?= $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($result); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 현금영수증 요약정보[<?= $i+1?>]</legend>
									<ul>
										<li> itemKey : <?= $result[$i]->itemKey ?></li>
										<li> mgtKey : <?= $result[$i]->mgtKey ?></li>
										<li> tradeDate : <?= $result[$i]->tradeDate ?></li>
										<li> issueDT : <?= $result[$i]->issueDT ?></li>
										<li> customerName : <?= $result[$i]->customerName ?></li>
										<li> itemName : <?= $result[$i]->itemName ?></li>
										<li> identityNum : <?= $result[$i]->identityNum ?></li>
										<li> taxationType : <?= $result[$i]->taxationType ?></li>
										<li> totalAmount : <?= $result[$i]->totalAmount ?></li>
										<li> tradeUsage : <?= $result[$i]->tradeUsage ?></li>
										<li> tradeType : <?= $result[$i]->tradeType ?></li>
										<li> stateCode : <?= $result[$i]->stateCode ?></li>
										<li> stateDT : <?= $result[$i]->stateDT ?></li>
										<li> printYN : <?// $result[$i]->printYN ?></li>
										<li> confirmNum : <?= $result[$i]->confirmNum ?></li>
										<li> orgTradeDate : <?= $result[$i]->orgTradeDate ?></li>
										<li> orgConfirmNum : <?= $result[$i]->orgConfirmNum ?></li>
										<li> ntssendDT : <?= $result[$i]->ntssendDT ?></li>
										<li> ntsresult : <?= $result[$i]->ntsresult ?></li>
										<li> ntsresultDT : <?= $result[$i]->ntsresultDT ?></li>
										<li> ntsresultCode : <?= $result[$i]->ntsresultCode ?></li>
										<li> ntsresultMessage : <?= $result[$i]->ntsresultMessage ?></li>
										<li> regDT : <?= $result[$i]->regDT ?></li>
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
