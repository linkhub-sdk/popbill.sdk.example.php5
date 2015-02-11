<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호
		
	$MgtKeyList = array(			# 문서관리번호 배열, 최대 1000건
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
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($result); $i++) { 
					?>
								<fieldset class="fieldset2">
									<legend> 현금영수증 요약정보[<? echo $i+1?>]</legend>
									<ul>
										<li> itemKey : <? echo $result[$i]->itemKey ?></li>
										<li> mgtKey : <? echo $result[$i]->mgtKey ?></li>
										<li> tradeDate : <? echo $result[$i]->tradeDate ?></li>
										<li> issueDT : <? echo $result[$i]->issueDT ?></li>
										<li> customerName : <? echo $result[$i]->customerName ?></li>
										<li> itemName : <? echo $result[$i]->itemName ?></li>
										<li> identityNum : <? echo $result[$i]->identityNum ?></li>
										<li> taxationType : <? echo $result[$i]->taxationType ?></li>
										<li> totalAmount : <? echo $result[$i]->totalAmount ?></li>
										<li> tradeUsage : <? echo $result[$i]->tradeUsage ?></li>
										<li> tradeType : <? echo $result[$i]->tradeType ?></li>
										<li> stateCode : <? echo $result[$i]->stateCode ?></li>
										<li> stateDT : <? echo $result[$i]->stateDT ?></li>
										<li> printYN : <? echo $result[$i]->printYN ?></li>
										<li> confirmNum : <? echo $result[$i]->confirmNum ?></li>
										<li> orgTradeDate : <? echo $result[$i]->orgTradeDate ?></li>
										<li> orgConfirmNum : <? echo $result[$i]->orgConfirmNum ?></li>
										<li> ntssendDT : <? echo $result[$i]->ntssendDT ?></li>
										<li> ntsresult : <? echo $result[$i]->ntsresult ?></li>
										<li> ntsresultDT : <? echo $result[$i]->ntsresultDT ?></li>
										<li> ntsresultCode : <? echo $result[$i]->ntsresultCode ?></li>
										<li> ntsresultMessage : <? echo $result[$i]->ntsresultMessage ?></li>
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