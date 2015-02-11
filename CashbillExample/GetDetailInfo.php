<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 5.X Example.</title>
	</head>
<?php 
	include 'common.php';	

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, "-"제외 10자리
	$mgtKey = '20150211-01';		# 문서관리번호

	try {
		$result = $CashbillService->GetDetailInfo($testCorpNum, $mgtKey);
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
				<legend>현금영수증 상세정보 확인</legend>
				<ul>
						<?
						if(isset($code)) { 
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
					?>
								<li>mgtKey : <? echo $result->mgtKey?> </li>
								<li>tradeDate : <? echo $result->tradeDate?> </li>
								<li>tradeUsage : <? echo $result->tradeUsage?> </li>
								<li>tradeType : <? echo $result->tradeType ?> </li>
								<li>taxationType : <? echo $result->taxationType ?> </li>
								<li>supplyCost : <? echo $result->supplyCost ?> </li>
								<li>tax : <? echo $result->tax ?> </li>
								<li>serviceFee : <? echo $result->serviceFee ?> </li>
								<li>totalAmount : <? echo $result->totalAmount ?> </li>
								<li>franchiseCorpNum : <? echo $result->franchiseCorpNum ?> </li>
								<li>franchiseCorpName : <? echo $result->franchiseCorpName ?> </li>
								<li>franchiseCEOName : <? echo $result->franchiseCEOName ?> </li>
								<li>franchiseAddr : <? echo $result->franchiseAddr ?> </li>
								<li>franchiseTEL : <? echo $result->franchiseTEL ?> </li>
								<li>identityNum : <? echo $result->identityNum ?> </li>
								<li>customerName : <? echo $result->customerName ?> </li>
								<li>itemName : <? echo $result->itemName ?> </li>
								<li>orderNumber : <? echo $result->orderNumber ?> </li>
								<li>email : <? echo $result->email ?> </li>
								<li>hp : <? echo $result->hp ?> </li>
								<li>fax : <? echo $result->fax ?> </li>
								<li>smssendYN : <? echo $result->smssendYN ?> </li>
								<li>faxsendYN : <? echo $result->faxsendYN ?> </li>
								<li>orgConfirmNum : <? echo $result->orgConfirmNum ?> </li>

					<?
						}
					?>			
		

				</ul>
			</fieldset>
		 </div>
	</body>
</html>