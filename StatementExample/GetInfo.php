<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php
  /**
  * 1건의 전자명세서 상태/요약 정보를 확인합니다.
  * - 응답항목에 대한 자세한 정보는 "[전자명세서 API 연동매뉴얼] > 3.3.1.
  *   GetInfo (상태 확인)"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$itemCode = '121';

  // 문서관리번호
	$mgtKey = '20170302-04';

	try {
		$result = $StatementService->GetInfo($testCorpNum, $itemCode, $mgtKey);
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
				<legend>전자명세서 요약 및 상태정보 확인</legend>
				<ul>
					<?php
						if ( isset($code) ) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {
					?>
							<li> itemKey : <?php echo $result->itemKey ?></li>
							<li> stateCode : <?php echo $result->stateCode ?></li>
							<li> taxType : <?php echo $result->taxType ?></li>
							<li> purposeType : <?php echo $result->purposeType ?></li>
							<li> writeDate : <?php echo $result->writeDate ?></li>
							<li> senderCorpName : <?php echo $result->senderCorpName ?></li>
							<li> senderCorpNum : <?php echo $result->senderCorpNum ?></li>
							<li> senderPrintYN : <?php echo $result->senderPrintYN ?></li>
							<li> receiverCorpName : <?php echo $result->receiverCorpName ?></li>
							<li> receiverCorpNum : <?php echo $result->receiverCorpNum ?></li>
							<li> receiverPrintYN : <?php echo $result->receiverPrintYN ?></li>
							<li> supplyCostTotal : <?php echo $result->supplyCostTotal ?></li>
							<li> taxTotal : <?php echo $result->taxTotal ?></li>
							<li> issueDT : <?php echo $result->issueDT ?></li>
							<li> stateDT : <?php echo $result->stateDT ?></li>
							<li> openYN : <?php echo $result->openYN ?></li>
							<li> openDT : <?php echo $result->openDT ?></li>
							<li> stateMemo : <?php echo $result->stateMemo ?></li>
							<li> regDT : <?php echo $result->regDT ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
