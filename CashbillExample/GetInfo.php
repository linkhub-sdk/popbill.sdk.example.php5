<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호
	$mgtKey = '20150211-01';		# 문서관리번호

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
				<legend>현금영수증 요약정보 및 상태정보 확인</legend>
				<ul>
					<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							{
					?>
								<li> itemKey : <? echo $result->itemKey ?></li>
								<li> mgtKey : <? echo $result->mgtKey ?></li>
								<li> tradeDate : <? echo $result->tradeDate ?></li>
								<li> issueDT : <? echo $result->issueDT ?></li>
								<li> customerName : <? echo $result->customerName ?></li>
								<li> itemName : <? echo $result->itemName ?></li>
								<li> identityNum : <? echo $result->identityNum ?></li>
								<li> taxationType : <? echo $result->taxationType ?></li>
								<li> totalAmount : <? echo $result->totalAmount ?></li>
								<li> tradeUsage : <? echo $result->tradeUsage ?></li>
								<li> tradeType : <? echo $result->tradeType ?></li>
								<li> stateCode : <? echo $result->stateCode ?></li>
								<li> stateDT : <? echo $result->stateDT ?></li>
								<li> printYN : <? echo $result->printYN ?></li>
								<li> confirmNum : <? echo $result->confirmNum ?></li>
								<li> orgTradeDate : <? echo $result->orgTradeDate ?></li>
								<li> orgConfirmNum : <? echo $result->orgConfirmNum ?></li>
								<li> ntssendDT : <? echo $result->ntssendDT ?></li>
								<li> ntsresult : <? echo $result->ntsresult ?></li>
								<li> ntsresultDT : <? echo $result->ntsresultDT ?></li>
								<li> ntsresultCode : <? echo $result->ntsresultCode ?></li>
								<li> ntsresultMessage : <? echo $result->ntsresultMessage ?></li>
								<li> regDT : <? echo $result->regDT ?></li>
					<?
							}
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>