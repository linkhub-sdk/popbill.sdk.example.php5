<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';		# 팝빌회원 아이디
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150211-01';		# 문서관리번호


	try {
		$result = $StatementService->GetInfo($testCorpNum, $itemCode, $mgtKey, $testUserID);
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
				<legend>전자명세서 요약정보 및 상태정보 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {

					?>
							<li> itemKey : <? echo $result->itemKey ?></li>
							<li> stateCode : <? echo $result->stateCode ?></li>
							<li> taxType : <? echo $result->taxType ?></li>
							<li> purposeType : <? echo $result->purposeType ?></li>
							<li> writeDate : <? echo $result->writeDate ?></li>
							<li> senderCorpName : <? echo $result->senderCorpName ?></li>
							<li> senderCorpNum : <? echo $result->senderCorpNum ?></li>
							<li> senderPrintYN : <? echo $result->senderPrintYN ?></li>
							<li> receiverCorpName : <? echo $result->receiverCorpName ?></li>
							<li> receiverCorpNum : <? echo $result->receiverCorpNum ?></li>
							<li> receiverPrintYN : <? echo $result->receiverPrintYN ?></li>
							<li> supplyCostTotal : <? echo $result->supplyCostTotal ?></li>
							<li> taxTotal : <? echo $result->taxTotal ?></li>
							<li> issueDT : <? echo $result->issueDT ?></li>
							<li> stateDT : <? echo $result->stateDT ?></li>
							<li> openYN : <? echo $result->openYN ?></li>
							<li> openDT : <? echo $result->openDT ?></li>
							<li> stateMemo : <? echo $result->stateMemo ?></li>
							<li> regDT : <? echo $result->regDT ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
