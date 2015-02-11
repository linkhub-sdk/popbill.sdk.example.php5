<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, '-'제외 10자리
	$testUserID = 'testkorea';		# 팝빌회원 아이디
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	
	$MgtKeyList = array(			# 문서관리번호 배열, 최대 1000건
			'20150211-01',
			'20150211-02',
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
				<legend>전자명세서 요약정보 대량 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($result); $i++) { 
					?>
							<fieldset class="fieldset2">
								<legend> 전자명세서 요약정보[<? echo $i+1?>]</legend>
								<ul>
									<li> itemKey : <? echo $result[$i]->itemKey ?></li>
									<li> stateCode : <? echo $result[$i]->stateCode ?></li>
									<li> taxType : <? echo $result[$i]->taxType ?></li>
									<li> purposeType : <? echo $result[$i]->purposeType ?></li>
									<li> writeDate : <? echo $result[$i]->writeDate ?></li>
									<li> senderCorpName : <? echo $result[$i]->senderCorpName ?></li>
									<li> senderCorpNum : <? echo $result[$i]->senderCorpNum ?></li>
									<li> receiverCorpName : <? echo $result[$i]->receiverCorpName ?></li>
									<li> receiverCorpNum : <? echo $result[$i]->receiverCorpNum ?></li>
									<li> supplyCostTotal : <? echo $result[$i]->supplyCostTotal ?></li>
									<li> taxTotal : <? echo $result[$i]->taxTotal ?></li>
									<li> issueDT : <? echo $result[$i]->issueDT ?></li>
									<li> stateDT : <? echo $result[$i]->stateDT ?></li>
									<li> openYN : <? echo $result[$i]->openYN ?></li>
									<li> openDT : <? echo $result[$i]->openDT ?></li>
									<li> stateMemo : <? echo $result[$i]->stateMemo ?></li>
									<li> regDT : <? echo $result[$i]->regDT ?></li>
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