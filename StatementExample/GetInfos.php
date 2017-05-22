<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 다수건의 전자명세서 상태/요약 정보를 확인합니다.
  * - 응답항목에 대한 자세한 정보는 "[전자명세서 API 연동매뉴얼] > 3.3.2.
  *   GetInfos (상태 대량 확인)"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 조회할 전자명세서 문서관리번호 배열, 최대 1000건
	$MgtKeyList = array(
			'20170302-04',
			'20161107-02',
      '20161107-03'
	);

	try {
		$result = $StatementService->GetInfos($testCorpNum, $itemCode, $MgtKeyList);
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
				<legend>전자명세서 상태/요약정보 확인 - 대량</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
							for ($i = 0; $i < Count($result); $i++) {
					?>
							<fieldset class="fieldset2">
								<legend> 전자명세서 상태/요약정보[<?php echo $i+1?>]</legend>
								<ul>
									<li> itemKey : <?php echo $result[$i]->itemKey ?></li>
									<li> stateCode : <?php echo $result[$i]->stateCode ?></li>
									<li> taxType : <?php echo $result[$i]->taxType ?></li>
									<li> purposeType : <?php echo $result[$i]->purposeType ?></li>
									<li> writeDate : <?php echo $result[$i]->writeDate ?></li>
									<li> senderCorpName : <?php echo $result[$i]->senderCorpName ?></li>
									<li> senderCorpNum : <?php echo $result[$i]->senderCorpNum ?></li>
									<li> senderPrintYN : <?php echo $result[$i]->senderPrintYN ?></li>
									<li> receiverCorpName : <?php echo $result[$i]->receiverCorpName ?></li>
									<li> receiverCorpNum : <?php echo $result[$i]->receiverCorpNum ?></li>
									<li> receiverPrintYN : <?php echo $result[$i]->receiverPrintYN ?></li>
									<li> supplyCostTotal : <?php echo $result[$i]->supplyCostTotal ?></li>
									<li> taxTotal : <?php echo $result[$i]->taxTotal ?></li>
									<li> issueDT : <?php echo $result[$i]->issueDT ?></li>
									<li> stateDT : <?php echo $result[$i]->stateDT ?></li>
									<li> openYN : <?php echo $result[$i]->openYN ?></li>
									<li> openDT : <?php echo $result[$i]->openDT ?></li>
									<li> stateMemo : <?php echo $result[$i]->stateMemo ?></li>
									<li> regDT : <?php echo $result[$i]->regDT ?></li>
								</ul>
							</fieldset>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
