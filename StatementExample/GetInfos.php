<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?
  /**
  * 다수건의 전자명세서 상태/요약 정보를 확인합니다.
  * - 응답항목에 대한 자세한 정보는 "[전자명세서 API 연동매뉴얼] > 3.3.2.
  *   GetInfos (상태 대량 확인)"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 조회할 전자명세서 문서관리번호 배열, 최대 1000건
	$MgtKeyList = array(
			'20161107-01',
			'20161107-02',
      '20161107-03'
	);

	try {
		$result = $StatementService->GetInfos($testCorpNum, $itemCode, $MgtKeyList, $testUserID);
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
				<legend>전자명세서 요약정보 확인 - 대량</legend>
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
								<legend> 전자명세서 요약정보[<?= $i+1?>]</legend>
								<ul>
									<li> itemKey : <?= $result[$i]->itemKey ?></li>
									<li> stateCode : <?= $result[$i]->stateCode ?></li>
									<li> taxType : <?= $result[$i]->taxType ?></li>
									<li> purposeType : <?= $result[$i]->purposeType ?></li>
									<li> writeDate : <?= $result[$i]->writeDate ?></li>
									<li> senderCorpName : <?= $result[$i]->senderCorpName ?></li>
									<li> senderCorpNum : <?= $result[$i]->senderCorpNum ?></li>
									<li> senderPrintYN : <?= $result[$i]->senderPrintYN ?></li>
									<li> receiverCorpName : <?= $result[$i]->receiverCorpName ?></li>
									<li> receiverCorpNum : <?= $result[$i]->receiverCorpNum ?></li>
									<li> receiverPrintYN : <?= $result[$i]->receiverPrintYN ?></li>
									<li> supplyCostTotal : <?= $result[$i]->supplyCostTotal ?></li>
									<li> taxTotal : <?= $result[$i]->taxTotal ?></li>
									<li> issueDT : <?= $result[$i]->issueDT ?></li>
									<li> stateDT : <?= $result[$i]->stateDT ?></li>
									<li> openYN : <?= $result[$i]->openYN ?></li>
									<li> openDT : <?= $result[$i]->openDT ?></li>
									<li> stateMemo : <?= $result[$i]->stateMemo ?></li>
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
